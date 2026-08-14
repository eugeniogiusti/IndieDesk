<div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📊</span>
        <div class="text-right">
            <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                {{ __('payments.stats.this_year') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $currencySymbol }} {{ number_format($stats['total_this_year'], 2, ',', '.') }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        <span class="text-gray-600 dark:text-gray-400">{{ now()->year }}</span>
    </div>
    @if($stats['estimated_tax_this_year'] !== null)
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
            {{ __('payments.stats.estimated_tax') }}: {{ $currencySymbol }} {{ number_format($stats['estimated_tax_this_year'], 2, ',', '.') }}
        </p>
    @endif
</div>