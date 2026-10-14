{{-- Due Date Range Filter --}}
<div class="md:col-span-2 flex items-center gap-2">
    <input
        type="date"
        name="date_from"
        value="{{ request('date_from') }}"
        title="{{ __('tasks.filter_due_from') }}"
        class="min-w-0 flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
    <span class="shrink-0 text-gray-400">&ndash;</span>
    <input
        type="date"
        name="date_to"
        value="{{ request('date_to') }}"
        title="{{ __('tasks.filter_due_to') }}"
        class="min-w-0 flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
</div>
