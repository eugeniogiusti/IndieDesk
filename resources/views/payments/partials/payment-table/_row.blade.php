{{-- _row.blade.php --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('payments.partials.payment-table._row-amount', ['payment' => $payment, 'taxEstimate' => $taxEstimate ?? null])
    @include('payments.partials.payment-table._row-paid-at', ['payment' => $payment])
    @include('payments.partials.payment-table._row-reference', ['payment' => $payment])
    @include('payments.partials.payment-table._row-invoice', ['payment' => $payment])
    @include('payments.partials.payment-table._row-actions', ['payment' => $payment])
</tr>