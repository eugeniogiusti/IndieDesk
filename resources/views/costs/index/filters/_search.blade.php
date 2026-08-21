{{-- Search Filter --}}
<div class="sm:col-span-2 lg:col-span-5">
    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
        {{ __('ui.search') }}
    </label>
    <input
        type="text"
        id="search"
        name="search"
        value="{{ request('search') }}"
        placeholder="{{ __('costs.placeholder.search') }}"
        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-150"
    >
</div>
