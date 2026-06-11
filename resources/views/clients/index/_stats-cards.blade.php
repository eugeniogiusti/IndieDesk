{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
    @include('clients.index.stats-cards._total')
    @include('clients.index.stats-cards._lead')
    @include('clients.index.stats-cards._prospect')
    @include('clients.index.stats-cards._active')
    @include('clients.index.stats-cards._archived')
</div>