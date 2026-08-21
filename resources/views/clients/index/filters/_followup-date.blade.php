{{-- Follow-up Date Filter --}}
<div class="lg:col-span-4">
    <label for="followup_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
        {{ __('clients.followup.filter.label_date') }}
    </label>
    <input
        type="date"
        id="followup_date"
        name="followup_date"
        value="{{ request('followup_date') }}"
        title="{{ __('clients.followup.filter.date') }}"
        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg
               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
               focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
               transition duration-150"
    >
</div>
