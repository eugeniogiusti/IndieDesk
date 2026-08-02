{{-- Type Filter --}}
<div>
    <select name="type"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <option value="">{{ __('taxes.all_types') }}</option>
        <option value="F24" {{ request('type') === 'F24' ? 'selected' : '' }}>
            F24
        </option>
        <option value="dichiarazione_redditi" {{ request('type') === 'dichiarazione_redditi' ? 'selected' : '' }}>
            {{ __('taxes.type_dichiarazione_redditi') }}
        </option>
    </select>
</div>
