{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    @include('clients.index.stats-cards._total')
    @include('clients.index.stats-cards._active')
    @include('clients.index.stats-cards._archived')
</div>