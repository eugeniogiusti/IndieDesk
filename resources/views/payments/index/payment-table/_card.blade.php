{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="flex items-start justify-between gap-2">
        <a href="{{ route('projects.show', [$payment->project, 'tab' => 'payments']) }}"
           class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
            {{ $payment->project->name }}
        </a>
        <div class="text-lg font-bold text-gray-900 dark:text-white shrink-0">
            {{ $payment->getFormattedAmount() }}
        </div>
    </div>

    @if($payment->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $payment->project->client->name }}</div>
    @endif

    <div class="flex flex-wrap items-center gap-1.5">
        <x-projects.type-badge :type="$payment->project->type" />
        <x-payments.method-badge :method="$payment->method" />
        @include('payments.partials.payment-table._row-tax-estimate', ['payment' => $payment, 'taxEstimate' => $taxEstimate ?? null, 'showBreakdown' => false])
    </div>

    <div class="flex items-center justify-between">
        <div>
            @if($payment->isPaid())
                <div class="text-sm text-gray-900 dark:text-white">{{ $payment->paid_at->format('d/m/Y') }}</div>
            @else
                <div class="text-sm text-amber-600 dark:text-amber-400 font-medium">{{ __('payments.pending') }}</div>
            @endif
            @if($payment->due_date)
                <div class="text-xs {{ $payment->isOverdue() ? 'text-red-600 dark:text-red-400 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                    {{ __('payments.due') }}: {{ $payment->due_date->format('d/m/Y') }}
                    @if($payment->isOverdue())
                        <span class="ml-1">({{ __('payments.overdue') }})</span>
                    @endif
                </div>
            @endif
        </div>

        @if($payment->hasInvoice())
            <div class="flex items-center gap-2">
                <a href="{{ route('invoices.preview', $payment) }}" target="_blank"
                   class="text-blue-600 hover:text-blue-800 dark:text-blue-400" title="{{ __('invoices.preview') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>
                <a href="{{ route('invoices.download', $payment) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400" title="{{ __('invoices.download') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>
        @endif
    </div>

    @if($payment->reference)
        <div class="text-sm text-gray-900 dark:text-white font-mono">{{ $payment->reference }}</div>
    @endif

    <div class="pt-1">
        <a href="{{ route('projects.show', [$payment->project, '#payments']) }}"
           class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition">
            {{ __('payments.view_project') }}
        </a>
    </div>
</div>
