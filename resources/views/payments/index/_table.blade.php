{{-- Tabella principale per index payments --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            @include('payments.index.payment-table._header')
            
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($payments as $payment)
                    @include('payments.index.payment-table._row', [
                        'payment' => $payment,
                        'taxEstimate' => $paymentTaxEstimates->get($payment->id),
                    ])
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($payments->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $payments->links() }}
        </div>
    @endif
</div>