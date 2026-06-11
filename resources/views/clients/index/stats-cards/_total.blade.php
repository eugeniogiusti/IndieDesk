{{-- Total Clients Card --}}
<div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-lg p-6 border border-indigo-200 dark:border-indigo-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">👥</span>
        <div class="text-right">
            <p class="text-xs font-medium text-indigo-700 dark:text-indigo-300 uppercase tracking-wide">
                {{ __('clients.stats.total') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['total'] }}
            </p>
        </div>
    </div>
</div>