{{-- Type Filter --}}
<div class="lg:col-span-3">
    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
        {{ __('costs.type') }}
    </label>
    <select
        id="type"
        name="type"
        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-150"
    >
        <option value="">{{ __('costs.all_types') }}</option>
        @foreach(\App\Models\Cost::TYPES as $type)
            <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                {{ __('costs.type_' . $type) }}
            </option>
        @endforeach
    </select>
</div>
