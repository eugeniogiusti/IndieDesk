{{-- Filters --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('taxes.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @include('taxes.index.filters._search')
            @include('taxes.index.filters._reference-year')
            @include('taxes.index.filters._type')
            @include('taxes.index.filters._paid')
            @include('taxes.index.filters._actions')
        </div>
    </form>
</div>
