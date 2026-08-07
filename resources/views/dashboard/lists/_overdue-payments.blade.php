{{-- Overdue payments --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-transform duration-200 hover:scale-[1.02]">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('dashboard.overdue_payments') }}</h3>
        </div>
        <a href="{{ route('payments.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($lists['overdue_payments']->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lists['overdue_payments'] as $payment)
                <li>
                    <a href="{{ route('projects.show', [$payment->project, 'tab' => 'payments']) }}" class="flex items-center justify-between gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ number_format($payment->amount, 2) }} {{ $payment->currency }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $payment->project->name }}
                                @if($payment->getClientLabel())
                                    <span class="text-gray-400 dark:text-gray-500">· {{ $payment->getClientLabel() }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="text-xs font-medium {{ $payment->due_date->isToday() ? 'text-amber-500' : 'text-red-500' }}">
                                @if($payment->due_date->isToday())
                                    {{ __('dashboard.due_today') }}
                                @else
                                    {{ __('dashboard.overdue_by') }} {{ (int) $payment->due_date->diffInDays(now()) }}g
                                @endif
                            </p>
                            <p class="text-xs text-gray-400">{{ $payment->due_date->format('d/m/Y') }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-emerald-600 dark:text-emerald-400 text-center">
            {{ __('dashboard.no_overdue_payments') }}
        </p>
    @endif
</div>
