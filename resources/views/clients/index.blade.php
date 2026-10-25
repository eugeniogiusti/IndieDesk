<x-app-layout>
    <div class="space-y-6">
        
        @include('clients.index._header')

        @include('clients.index._stats-cards')

        @include('clients.index._filters')

        @if($clients->count() > 0)
            @include('clients.index._table')
        @else
            @include('clients.index._empty-state')
        @endif

        {{-- Modal --}}
        @include('clients.modals._client-form')

    </div>
</x-app-layout>