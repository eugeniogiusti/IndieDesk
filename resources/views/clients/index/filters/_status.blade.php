{{-- Status Filter --}}
<div class="lg:col-span-3">
    <x-form-select
        name="status"
        :label="__('clients.status')"
        :value="request('status')"
        :options="[
            '' => __('clients.all_statuses'),
            'active' => __('clients.status_active'),
            'archived' => __('clients.status_archived'),
        ]"
    />
</div>
