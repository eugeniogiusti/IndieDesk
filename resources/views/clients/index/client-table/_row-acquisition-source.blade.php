{{-- Acquisition Source Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    @if($client->acquisition_source)
        <div class="flex flex-col gap-1">
            <div class="text-xs text-gray-600 dark:text-gray-400">
                {{ __('clients.acquisition_sources.categories.' . $client->acquisition_source->category()) }}
            </div>
            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $client->getAcquisitionSourceBadgeClass() }} w-fit">
                {{ $client->getAcquisitionSourcePlatform() }}
            </span>
        </div>
    @else
        <span class="text-xs text-gray-400 dark:text-gray-500">—</span>
    @endif
</td>
