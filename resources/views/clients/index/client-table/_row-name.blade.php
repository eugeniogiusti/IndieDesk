{{-- Name + VAT Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <x-client-name-cell :client="$client" />
    <div class="mt-1 text-xs text-gray-400 dark:text-gray-500">
        {{ __('clients.table.created_at') }}: {{ $client->created_at->format('d/m/Y') }}
    </div>
</td>