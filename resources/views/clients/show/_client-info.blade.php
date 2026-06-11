{{-- resources/views/clients/show/_client-info.blade.php --}}

{{-- Contact Info --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('clients.contact_info') }}
        </h3>
    </div>

    @if($client->email || $client->phone || $client->pec)
        <div class="space-y-3">
            {{-- Email --}}
            @if($client->email)
                <x-email-link :email="$client->email" />
            @endif

            {{-- Phone / WhatsApp --}}
            @if($client->phone)
                <x-whatsapp-link :href="$client->whatsappUrl()">{{ $client->phone_prefix }} {{ $client->phone }}</x-whatsapp-link>
            @endif

            {{-- PEC --}}
            @if($client->pec)
                <div class="flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <a href="mailto:{{ $client->pec }}" class="text-gray-700 dark:text-gray-300 hover:text-emerald-600">
                        {{ $client->pec }}
                    </a>
                </div>
            @endif
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_contact_info') }}
        </p>
    @endif
</div>

{{-- Acquisition Source --}}
@if($client->acquisition_source)
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('clients.acquisition_source') }}
        </h3>
    </div>

    <div class="space-y-3">
        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full {{ $client->getAcquisitionSourceBadgeClass() }} w-fit">
            {{ __('clients.acquisition_sources.categories.' . $client->acquisition_source->category()) }}
        </span>
        <div class="text-sm text-gray-700 dark:text-gray-300">
            {{ __('clients.acquisition_sources.options.' . $client->acquisition_source->value) }}
        </div>
    </div>
</div>
@endif

{{-- Billing Info --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('clients.billing_info') }}
        </h3>
    </div>

    @if($client->vat_number || $client->billing_address || $client->billing_recipient_code)
        <div class="space-y-3 text-sm">
            {{-- VAT --}}
            @if($client->vat_number)
                <x-vat-display :vat="$client->vat_number" />
            @endif

            {{-- Address --}}
            @if($client->billing_address)
                <div class="text-gray-700 dark:text-gray-300">
                    <p>{{ $client->billing_address }}</p>
                    @if($client->billing_zip || $client->billing_city || $client->billing_province)
                        <p>
                            {{ $client->billing_zip }} {{ $client->billing_city }}
                            @if($client->billing_province)({{ $client->billing_province }})@endif
                        </p>
                    @endif
                    @if($client->billing_country)
                        <p>{{ $client->billing_country }}</p>
                    @endif
                </div>
            @endif

            {{-- Recipient Code (SDI) --}}
            @if($client->billing_recipient_code)
                <div class="flex items-center gap-2">
                    <span class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">SDI:</span>
                    <span class="text-gray-700 dark:text-gray-300 font-mono">{{ $client->billing_recipient_code }}</span>
                </div>
            @endif
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_billing_info') }}
        </p>
    @endif
</div>

{{-- Web & Social --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('clients.web_social') }}
        </h3>
    </div>

    @if($client->website || $client->linkedin)
        <div class="space-y-3">
            {{-- Website --}}
            @if($client->website)
                <a href="{{ $client->website }}" target="_blank" rel="noopener"
                   class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 hover:text-emerald-600">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    {{ parse_url($client->website, PHP_URL_HOST) }}
                </a>
            @endif

            {{-- LinkedIn --}}
            @if($client->linkedin)
                <a href="{{ $client->linkedin }}" target="_blank" rel="noopener"
                   class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 hover:text-emerald-600">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                    LinkedIn
                </a>
            @endif
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_web_social') }}
        </p>
    @endif
</div>

{{-- Notes --}}
@if($client->notes)
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('clients.notes') }}
        </h3>
    </div>
    <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $client->notes }}</p>
</div>
@endif
