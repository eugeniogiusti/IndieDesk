<div class="space-y-6">
    
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('payments.payment_list') }}
        </h3>
        <button 
            @click="$dispatch('open-payment-modal')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('payments.add_payment') }}
        </button>
    </div>

    {{-- Table ( partial) --}}
    @if($showData['paymentsCount'] > 0)
        @include('payments.partials._payment-table', [
            'payments' => $showData['payments'],
            'project' => $project,
            'taxEstimates' => $showData['paymentTaxEstimates'],
        ])

        {{-- Link  --}}
        @if($showData['paymentsCount'] > 50)
            <div class="text-center">
                <a href="{{ route('payments.index', ['project_id' => $project->id]) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('payments.view_all') }} ({{ $showData['paymentsCount'] }})
                </a>
            </div>
        @endif
    @else
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('payments.no_payments') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('payments.no_payments_description') }}
                </p>
            </div>
        </div>
    @endif

    {{-- Modal Form --}}
    @include('payments.partials._modal-form', ['project' => $project])

    {{-- Upload Invoice Modal --}}
    @include('payments.partials._upload-invoice-modal')

</div>


