{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('clients.index') }}" class="space-y-4">
        {{-- Client filters --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4">
            @include('clients.index.filters._search')
            @include('clients.index.filters._status')
            @include('clients.index.filters._acquisition-source')
        </div>

        {{-- Follow-up filters --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4">
            @include('clients.index.filters._followup-status')
            @include('clients.index.filters._contacted-today')
            @include('clients.index.filters._followup-date')
        </div>

        {{-- Actions --}}
        @include('clients.index.filters._actions')
    </form>
</div>
