<div class="header">
    <div class="header-row">
        <div class="logo-col">
            @if($business->logoAbsolutePath())
                <img src="{{ $business->logoAbsolutePath() }}" alt="Logo">
            @endif
            @if($business->business_name)
                <div style="margin-top: 3px; font-size: 9pt; color: #666;">
                    {{ $business->business_name }}
                </div>
            @endif
        </div>
        <div class="invoice-col">
            {{-- <div class="invoice-number">{{ __('invoices.invoice') }} #{{ $invoice_number }}</div> --}}
            <div class="invoice-date">{{ $invoice_date }}</div>
        </div>
    </div>
</div>