<?php

namespace App\Services\Stripe;

use App\Models\Client;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Stripe\Event;
use Stripe\Invoice;
use Stripe\StripeClient;

/**
 * Turns a Stripe `invoice.paid` webhook event into a Payment, automatically
 * matching (or creating) the Client and resolving which Project it belongs
 * to — no manual entry required for payments coming from your own SaaS
 * products.
 *
 * Project resolution: each Stripe Product involved in the invoice must carry
 * a `indiedesk_project_id` metadata value (set once per product, on Stripe's
 * side). This supports SaaS setups where every pricing tier is its own
 * separate Product, all tagged with the same project id.
 *
 * Client resolution: matched by `stripe_customer_id` first; if unseen,
 * falls back to an exact match on `name` (only when exactly one client
 * matches — email is deliberately not used here, many prospects only have
 * a placeholder email). No match at all creates a new Client.
 */
class StripeWebhookHandler
{
    private StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    public function handle(Event $event): void
    {
        if ($event->type !== 'invoice.paid') {
            return;
        }

        /** @var Invoice $invoice */
        $invoice = $event->data->object;

        if (Payment::where('reference', $invoice->id)->exists()) {
            return; // Stripe retries webhook delivery; already recorded.
        }

        $project = $this->resolveProject($invoice);

        if (!$project) {
            Log::warning('Stripe webhook: no project matched for invoice, skipping', [
                'invoice' => $invoice->id,
            ]);

            return;
        }

        $client = $this->resolveClient($invoice);

        $project->clients()->syncWithoutDetaching([$client->id]);

        Payment::create([
            'project_id' => $project->id,
            'client_id' => $client->id,
            'amount' => $invoice->amount_paid / 100,
            'currency' => strtoupper($invoice->currency),
            'paid_at' => now(),
            'method' => 'stripe',
            'reference' => $invoice->id,
        ]);
    }

    /**
     * Resolve the IndieDesk project from the Stripe Product tied to the
     * invoice's first line item, via its `indiedesk_project_id` metadata.
     */
    private function resolveProject(Invoice $invoice): ?Project
    {
        $line = $invoice->lines->data[0] ?? null;

        // Stripe's newer "flexible" billing mode moved product off line.price
        // and into line.pricing.price_details.product. Support both shapes.
        $productId = $line?->pricing?->price_details?->product
            ?? $line?->price?->product
            ?? null;

        if (!$productId) {
            return null;
        }

        $product = $this->stripe->products->retrieve($productId);
        $projectId = $product->metadata['indiedesk_project_id'] ?? null;

        if (!$projectId) {
            return null;
        }

        return Project::find((int) $projectId);
    }

    private function resolveClient(Invoice $invoice): Client
    {
        $customerId = $invoice->customer;

        $client = Client::where('stripe_customer_id', $customerId)->first();

        if ($client) {
            $client->update(['status' => 'active']);

            return $client;
        }

        $stripeCustomer = $this->stripe->customers->retrieve($customerId);
        $name = trim((string) $stripeCustomer->name);
        $email = trim((string) $stripeCustomer->email);

        // Email is reliable here: by the time someone pays, their tenant
        // already exists in the SaaS app and the email is real — unlike a
        // prospect's email, which may still be a placeholder.
        if ($email !== '') {
            $existing = $this->findSingleMatch('email', $email, $customerId);

            if ($existing) {
                return $existing;
            }
        }

        if ($name !== '') {
            $existing = $this->findSingleMatch('name', $name, $customerId);

            if ($existing) {
                return $existing;
            }
        }

        return $this->createClient($customerId, $name, $stripeCustomer->email);
    }

    /**
     * Find exactly one Client matching the given column/value, attach the
     * Stripe customer id, and activate it. Returns null (no guessing) when
     * zero or more than one client matches.
     */
    private function findSingleMatch(string $column, string $value, string $customerId): ?Client
    {
        $matches = Client::where($column, $value)->get();

        if ($matches->count() !== 1) {
            return null;
        }

        $existing = $matches->first();
        $existing->update([
            'stripe_customer_id' => $customerId,
            'status' => 'active',
        ]);

        return $existing;
    }

    private function createClient(string $customerId, string $name, ?string $email): Client
    {
        $email = $email ?: "stripe-{$customerId}@indiedesk.invalid";

        try {
            return Client::create([
                'name' => $name !== '' ? $name : $email,
                'email' => $email,
                'stripe_customer_id' => $customerId,
                'status' => 'active',
            ]);
        } catch (QueryException $e) {
            // Unique constraint on email — an existing client already has
            // this address. Treat it as the same person instead of failing.
            $existing = Client::where('email', $email)->first();

            if (!$existing) {
                throw $e;
            }

            $existing->update([
                'stripe_customer_id' => $customerId,
                'status' => 'active',
            ]);

            return $existing;
        }
    }
}
