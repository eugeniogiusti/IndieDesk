{{-- Inline tax estimate snippet, meant to be included inside the Importo cell (not its own column) --}}
@if($taxEstimate)
    <div class="text-xs text-amber-600 dark:text-amber-500 mt-1">
        {{ __('payments.set_aside') }}: {{ $payment->formatCurrency($taxEstimate->setAsideAmount()) }}
        @if($showBreakdown ?? true)
            <span class="text-gray-400 dark:text-gray-500">
                (INPS {{ $payment->formatCurrency($taxEstimate->inpsAmount) }} &middot; {{ __('payments.tax') }} {{ $payment->formatCurrency($taxEstimate->taxAmount) }})
            </span>
        @endif
    </div>
@endif
