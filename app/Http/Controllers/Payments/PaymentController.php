<?php

namespace App\Http\Controllers\Payments;

use App\Models\Project;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StorePaymentRequest;
use App\Http\Requests\Payments\UpdatePaymentRequest;
use App\Queries\Payments\PaymentIndexQuery;
use App\Queries\Payments\PaymentStatsQuery;
use App\Services\Taxes\PaymentTaxCalculator;
use App\Services\Calendar\GoogleCalendarSync;

class PaymentController extends Controller
{
    public function __construct(
        private GoogleCalendarSync $calendarSync
    ) {}

    /**
     * Display a listing of payments (global index with filters)
     */
    public function index(PaymentIndexQuery $indexQuery, PaymentStatsQuery $statsQuery)
    {
        $payments = $indexQuery->handle();
        $stats = $statsQuery->handle();
        $paymentTaxEstimates = (new PaymentTaxCalculator())->calculateForPayments($payments->getCollection());

        return view('payments.index', compact('payments', 'stats', 'paymentTaxEstimates'));
    }

    /**
     * Store a new payment (from project show page)
     */
    public function store(StorePaymentRequest $request, Project $project)
    {
        $payment = $project->payments()->create($request->validated());

        $this->calendarSync->sync($payment);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'payments'])
            ->with('success', __('payments.created_successfully'));
    }

    /**
     * Update payment (from project show page)
     */
    public function update(UpdatePaymentRequest $request, Project $project, Payment $payment)
    {
        $payment->update($request->validated());

        $this->calendarSync->sync($payment);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'payments'])
            ->with('success', __('payments.updated_successfully'));
    }

    /**
     * Delete payment (from project show page)
     */
    public function destroy(Project $project, Payment $payment)
    {
        $this->calendarSync->delete($payment);

        $payment->delete();

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'payments'])
            ->with('success', __('payments.deleted_successfully'));
    }
}
