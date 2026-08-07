{{-- Ultimate payments received --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-transform duration-200 hover:scale-[1.02]">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('dashboard.recent_payments') }}</h3>
        </div>
        <a href="{{ route('payments.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($lists['recent_payments']->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lists['recent_payments'] as $payment)
                <li class="flex items-center justify-between gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <a href="{{ route('projects.show', [$payment->project, 'tab' => 'payments']) }}" class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-emerald-600">
                            +{{ number_format($payment->amount, 2) }} {{ $payment->currency }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $payment->project->name }}
                            @if($payment->getClientLabel())
                                <span class="text-gray-400 dark:text-gray-500">· {{ $payment->getClientLabel() }}</span>
                            @endif
                        </p>
                        <div class="mt-1"><x-payments.method-badge :method="$payment->method" /></div>
                    </a>
                    <span class="text-xs text-gray-500 shrink-0">
                        {{ $payment->paid_at->format('d/m/Y') }}
                    </span>
                    @if($payment->hasInvoice())
                        <div class="flex items-center gap-1 shrink-0">
                            <x-action-button :href="$payment->getInvoicePreviewUrl()" variant="info" target="_blank" title="{{ __('documents.preview') }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </x-action-button>
                            <x-action-button :href="$payment->getInvoiceDownloadUrl()" variant="primary" title="{{ __('documents.download') }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </x-action-button>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic text-center">
            {{ __('dashboard.no_recent_payments') }}
        </p>
    @endif
</div>
