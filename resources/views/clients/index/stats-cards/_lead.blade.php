{{-- Lead Clients Card --}}
<div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">✨</span>
        <div class="text-right">
            <p class="text-xs font-medium text-yellow-700 dark:text-yellow-300 uppercase tracking-wide">
                {{ __('clients.stats.lead') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['lead'] }}
            </p>
        </div>
    </div>
</div>