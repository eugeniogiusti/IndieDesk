{{-- Status Filter --}}
<div class="lg:col-span-3">
    <x-form-select
        name="status"
        :label="__('clients.status')"
        :value="request('status')"
        :options="[
            '' => __('clients.all_statuses'),
            'lead' => __('clients.status_lead'),
            'prospect' => __('clients.status_prospect'),
            'active' => __('clients.status_active'),
            'archived' => __('clients.status_archived'),
        ]"
    />
</div>
