{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('clients.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-8 gap-4">
            @include('clients.index.filters._search')
            @include('clients.index.filters._status')
            @include('clients.index.filters._followup-status')
            @include('clients.index.filters._contacted-today')
            @include('clients.index.filters._followup-date')
            @include('clients.index.filters._acquisition-source')
            @include('clients.index.filters._actions')
        </div>
    </form>
</div>