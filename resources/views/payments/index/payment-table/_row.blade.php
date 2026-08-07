<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('payments.index.payment-table._row-project', ['payment' => $payment])
    @include('payments.index.payment-table._row-amount', ['payment' => $payment])
    @include('payments.index.payment-table._row-paid-at', ['payment' => $payment])
    @include('payments.index.payment-table._row-reference', ['payment' => $payment])
    @include('payments.index.payment-table._row-invoice', ['payment' => $payment])
    @include('payments.index.payment-table._row-actions', ['payment' => $payment])
</tr>