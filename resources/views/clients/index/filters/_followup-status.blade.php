{{-- Follow-up Status Filter --}}
<div>
    <x-form-select
        name="followup_status"
        :value="request('followup_status')"
        :options="[
            '' => __('clients.followup.filter.all'),
            'never' => __('clients.followup.filter.never'),
            'first_contact' => __('clients.followup.filter.first_contact'),
            'second_contact' => __('clients.followup.filter.second_contact'),
            'exhausted' => __('clients.followup.filter.exhausted'),
        ]"
    />
</div>
