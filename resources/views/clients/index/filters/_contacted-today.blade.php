{{-- Contacted Today Filter --}}
<div class="lg:col-span-3">
    <x-form-select
        name="contacted_today"
        :label="__('clients.followup.filter.label_contacted')"
        :value="request('contacted_today')"
        :options="[
            '' => __('clients.followup.filter.all'),
            '1' => __('clients.followup.filter.today'),
        ]"
    />
</div>
