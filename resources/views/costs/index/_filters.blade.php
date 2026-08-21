{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('costs.index') }}" class="space-y-4">
        {{-- Filter fields --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4">
            @include('costs.index.filters._search')
            @include('costs.index.filters._type')
            @include('costs.index.filters._date-range')
        </div>

        {{-- Actions --}}
        @include('costs.index.filters._actions')
    </form>
</div>
