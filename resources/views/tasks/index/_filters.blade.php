{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('tasks.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @include('tasks.index.filters._search')
            @include('tasks.index.filters._status')
            @include('tasks.index.filters._type')
            @include('tasks.index.filters._date-range')
            @include('tasks.index.filters._actions')
        </div>
    </form>
</div>