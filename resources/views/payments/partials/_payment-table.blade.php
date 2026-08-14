{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        @include('payments.partials.payment-table._header')
        
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($payments as $payment)
                @include('payments.partials.payment-table._row', [
                    'payment' => $payment,
                    'taxEstimate' => ($taxEstimates ?? collect())->get($payment->id),
                ])
            @endforeach
        </tbody>
    </table>
</div>
