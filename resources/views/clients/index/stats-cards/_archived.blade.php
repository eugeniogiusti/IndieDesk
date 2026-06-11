{{-- Archived Clients Card --}}
<div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-700/50 rounded-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📦</span>
        <div class="text-right">
            <p class="text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                {{ __('clients.stats.archived') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['archived'] }}
            </p>
        </div>
    </div>
</div>