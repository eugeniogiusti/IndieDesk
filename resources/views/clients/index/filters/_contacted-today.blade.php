{{-- Contacted Today Filter --}}
<div>
    <x-form-select
        name="contacted_today"
        :value="request('contacted_today')"
        :options="[
            '' => __('clients.followup.filter.all'),
            '1' => __('clients.followup.filter.today'),
        ]"
    />
</div>
