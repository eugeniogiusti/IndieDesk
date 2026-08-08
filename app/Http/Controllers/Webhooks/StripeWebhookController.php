<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Services\Stripe\StripeWebhookHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function __invoke(Request $request, StripeWebhookHandler $handler): Response
    {
        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                $request->header('Stripe-Signature', ''),
                config('services.stripe.webhook_secret')
            );
        } catch (SignatureVerificationException|\UnexpectedValueException $e) {
            report($e);

            return response('Invalid signature', 400);
        }

        $handler->handle($event);

        return response('OK', 200);
    }
}
