{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('clients.index.client-table._row-name')
    @include('clients.index.client-table._row-email')
    @include('clients.index.client-table._row-phone')
    @include('clients.index.client-table._row-status')
    @include('clients.index.client-table._row-acquisition-source')
    @include('clients.index.client-table._row-created-at')
    @include('clients.index.client-table._row-actions')
</tr>