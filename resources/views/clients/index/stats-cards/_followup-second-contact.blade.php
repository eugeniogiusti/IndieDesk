{{-- Second Contact Done Card --}}
<div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-lg p-6 border border-amber-200 dark:border-amber-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📞</span>
        <div class="text-right">
            <p class="text-xs font-medium text-amber-700 dark:text-amber-300 uppercase tracking-wide">
                {{ __('clients.followup.filter.second_contact') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $followupStats['second_contact'] }}
            </p>
        </div>
    </div>
</div>
