{{-- Follow-up Stats Cards Orchestrator (lead/prospect only) --}}
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-6">
    @include('clients.index.stats-cards._followup-never')
    @include('clients.index.stats-cards._followup-first-contact')
    @include('clients.index.stats-cards._followup-second-contact')
    @include('clients.index.stats-cards._followup-exhausted')
    @include('clients.index.stats-cards._followup-today')
</div>
