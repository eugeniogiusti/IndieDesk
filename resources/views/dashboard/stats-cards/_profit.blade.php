{{-- Profit This Month --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-transform duration-200 hover:scale-105">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                {{ __('dashboard.profit_this_month') }}
            </p>
            <p class="mt-2 text-3xl font-bold {{ $stats['profit_this_month']['amount'] >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                {{ number_format($stats['profit_this_month']['amount'], 2) }} {{ $currencySymbol }}
            </p>
            <div class="mt-2 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400 flex-wrap">
                <span class="text-emerald-600">{{ __('statistics.gross') }}: +{{ number_format($stats['profit_this_month']['payments'], 2) }}</span>
                <span class="text-red-500">{{ __('statistics.costs') }}: -{{ number_format($stats['profit_this_month']['costs'], 2) }}</span>
                @if($stats['profit_this_month']['estimated_tax'] !== null)
                    <span class="text-amber-500">{{ __('statistics.estimated_tax') }}: -{{ number_format($stats['profit_this_month']['estimated_tax'], 2) }}</span>
                @endif
            </div>
        </div>
        <div class="p-3 rounded-full {{ $stats['profit_this_month']['amount'] >= 0 ? 'bg-emerald-100 dark:bg-emerald-900/30' : 'bg-red-100 dark:bg-red-900/30' }}">
            <svg class="w-6 h-6 {{ $stats['profit_this_month']['amount'] >= 0 ? 'text-emerald-600' : 'text-red-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>
