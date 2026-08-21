{{-- Date Range Filter --}}
<div class="sm:col-span-2 lg:col-span-4">
    <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
        {{ __('costs.filters.period') }}
    </label>
    <div class="flex items-center gap-2">
        <input
            type="date"
            id="date_from"
            name="date_from"
            value="{{ request('date_from') }}"
            title="{{ __('costs.filters.date_from') }}"
            class="min-w-0 flex-1 px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-150"
        >
        <span class="shrink-0 text-gray-400">&ndash;</span>
        <input
            type="date"
            id="date_to"
            name="date_to"
            value="{{ request('date_to') }}"
            title="{{ __('costs.filters.date_to') }}"
            class="min-w-0 flex-1 px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-150"
        >
    </div>
</div>
