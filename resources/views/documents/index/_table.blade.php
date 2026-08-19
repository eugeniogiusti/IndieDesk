{{-- Table Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">

    {{-- Card list (mobile) --}}
    <div class="md:hidden divide-y divide-gray-100 dark:divide-gray-700">
        @foreach($documents as $document)
            @include('documents.index.document-table._card', ['document' => $document])
        @endforeach
    </div>

    {{-- Table (desktop) --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            @include('documents.index.document-table._header')

            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($documents as $document)
                    @include('documents.index.document-table._row', ['document' => $document])
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $documents->links() }}
    </div>
</div>