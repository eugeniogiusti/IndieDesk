{{-- Table Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">

    {{-- Card list (mobile) --}}
    <div class="md:hidden divide-y divide-gray-100 dark:divide-gray-700">
        @foreach($clients as $client)
            @include('clients.index.client-table._card')
        @endforeach
    </div>

    {{-- Table (desktop) --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            @include('clients.index.client-table._header')

            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($clients as $client)
                    @include('clients.index.client-table._row')
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700">
        {{ $clients->links() }}
    </div>
</div>