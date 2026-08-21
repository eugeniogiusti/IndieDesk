{{-- Acquisition Source Filter --}}
<div class="sm:col-span-2 lg:col-span-4">
    <label for="acquisition_source" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
        {{ __('clients.acquisition_source') }}
    </label>
    <select id="acquisition_source" name="acquisition_source"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg
                   bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                   focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                   transition duration-150">
        <option value="">{{ __('clients.all_acquisition_sources') }}</option>

        <optgroup label="{{ __('clients.acquisition_sources.categories.direct_search') }}">
            @foreach(['search_linkedin', 'search_google', 'search_instagram', 'search_x', 'search_facebook', 'search_thread', 'search_bluesky'] as $source)
                <option value="{{ $source }}" {{ request('acquisition_source') === $source ? 'selected' : '' }}>
                    {{ __('clients.acquisition_sources.options.' . $source) }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="{{ __('clients.acquisition_sources.categories.organic') }}">
            @foreach(['organic_website', 'organic_blog', 'organic_facebook', 'organic_instagram', 'organic_reddit', 'organic_x', 'organic_thread', 'organic_bluesky'] as $source)
                <option value="{{ $source }}" {{ request('acquisition_source') === $source ? 'selected' : '' }}>
                    {{ __('clients.acquisition_sources.options.' . $source) }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="{{ __('clients.acquisition_sources.categories.ads') }}">
            @foreach(['ads_google', 'ads_facebook', 'ads_instagram', 'ads_reddit'] as $source)
                <option value="{{ $source }}" {{ request('acquisition_source') === $source ? 'selected' : '' }}>
                    {{ __('clients.acquisition_sources.options.' . $source) }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="{{ __('clients.acquisition_sources.categories.sponsorship') }}">
            @foreach(['sponsorship_influencer'] as $source)
                <option value="{{ $source }}" {{ request('acquisition_source') === $source ? 'selected' : '' }}>
                    {{ __('clients.acquisition_sources.options.' . $source) }}
                </option>
            @endforeach
        </optgroup>

        <optgroup label="{{ __('clients.acquisition_sources.categories.other') }}">
            @foreach(['other_word_of_mouth', 'other_cold_contact'] as $source)
                <option value="{{ $source }}" {{ request('acquisition_source') === $source ? 'selected' : '' }}>
                    {{ __('clients.acquisition_sources.options.' . $source) }}
                </option>
            @endforeach
        </optgroup>
    </select>
</div>
