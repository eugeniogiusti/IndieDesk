{{-- Acquisition Source Filter --}}
<div>
    <x-form-select
        name="acquisition_source_category"
        :value="request('acquisition_source_category')"
        :options="[
            '' => __('clients.all_acquisition_sources'),
            'direct_search' => __('clients.acquisition_sources.categories.direct_search'),
            'organic' => __('clients.acquisition_sources.categories.organic'),
            'ads' => __('clients.acquisition_sources.categories.ads'),
            'sponsorship' => __('clients.acquisition_sources.categories.sponsorship'),
            'other' => __('clients.acquisition_sources.categories.other'),
        ]"
    />
</div>
