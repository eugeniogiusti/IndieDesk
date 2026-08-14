<?php

namespace App\Queries\Payments;

use App\Models\Payment;

/**
 * Paginated query for the payments index page.
 *
 * Filters: project_id, method, currency, date_from/date_to, search (reference/notes/project name).
 * Eager loads: project.client.
 * Sorting: created_at desc (registration order) — not paid_at, which is null for
 * pending payments and would sink them to the bottom until marked paid. Pagination: 15 per page.
 */
class PaymentIndexQuery
{
    public function handle()
    {
        return Payment::query()
            ->with(['project.client', 'client'])
            ->when(request('project_id'), fn($q, $projectId) => $q->forProject($projectId))
            ->when(request('status'), function($q, $status) {
                match($status) {
                    'paid'    => $q->paid(),
                    'pending' => $q->pending(),
                    'overdue' => $q->overdue(),
                    default   => null,
                };
            })
            ->when(request('method'), fn($q, $method) => $q->method($method))
            ->when(request('currency'), fn($q, $currency) => $q->currency($currency))
            ->when(request('date_from'), fn($q, $date) => $q->where('paid_at', '>=', $date))
            ->when(request('date_to'), fn($q, $date) => $q->where('paid_at', '<=', $date))
            ->when(request('search'), function($q, $search) {
                $q->where(function($query) use ($search) {
                    $query->where('reference', 'like', "%{$search}%")
                          ->orWhere('notes', 'like', "%{$search}%")
                          ->orWhereHas('project', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }
}