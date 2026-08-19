{{-- First Contact Done Card --}}
<div class="bg-gradient-to-br from-sky-50 to-sky-100 dark:from-sky-900/20 dark:to-sky-800/20 rounded-lg p-6 border border-sky-200 dark:border-sky-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📞</span>
        <div class="text-right">
            <p class="text-xs font-medium text-sky-700 dark:text-sky-300 uppercase tracking-wide">
                {{ __('clients.followup.filter.first_contact') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $followupStats['first_contact'] }}
            </p>
        </div>
    </div>
</div>
