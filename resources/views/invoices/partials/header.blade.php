<div class="header">
    <div class="header-row">
        <div class="logo-col">
            @if($business->logo_path)
                @php
                    $companyLogoPath = storage_path('app/' . $business->logo_path);
                    if (!file_exists($companyLogoPath)) {
                        $companyLogoPath = storage_path('app/private/' . $business->logo_path);
                    }
                @endphp
                @if(file_exists($companyLogoPath))
                    <img src="{{ $companyLogoPath }}" alt="Logo">
                @endif
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