{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('clients.index.client-table._row-name')
    @include('clients.index.client-table._row-phone')
    @include('clients.index.client-table._row-status')
    @include('clients.index.client-table._row-followups-count')
    @include('clients.index.client-table._row-acquisition-source')
    @include('clients.index.client-table._row-actions')
</tr>