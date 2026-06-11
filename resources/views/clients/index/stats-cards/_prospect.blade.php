{{-- Prospect Clients Card --}}
<div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">🎯</span>
        <div class="text-right">
            <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                {{ __('clients.stats.prospect') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['prospect'] }}
            </p>
        </div>
    </div>
</div>
