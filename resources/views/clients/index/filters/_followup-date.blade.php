{{-- Follow-up Date Filter --}}
<div>
    <input
        type="date"
        name="followup_date"
        value="{{ request('followup_date') }}"
        title="{{ __('clients.followup.filter.date') }}"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
</div>
