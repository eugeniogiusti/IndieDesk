{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="flex items-start justify-between gap-2">
        <x-client-name-cell :client="$client" />
        <x-client-status-badge :status="$client->status" />
    </div>

    <div class="text-sm text-gray-600 dark:text-gray-400">{{ $client->email }}</div>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-client-phone :client="$client" />
        @if($client->acquisition_source)
            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $client->getAcquisitionSourceBadgeClass() }}">
                {{ $client->getAcquisitionSourcePlatform() }}
            </span>
        @endif
        @if($client->needsFollowup())
            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400">
                {{ __('clients.followup.last_contact') }}: {{ \Carbon\Carbon::parse($client->followups_max_contacted_at)->format('d/m/Y') }}
            </span>
        @endif
    </div>

    <div class="flex items-center justify-between pt-1">
        <span class="text-xs text-gray-400 dark:text-gray-500">
            {{ __('clients.table.created_at') }}: {{ $client->created_at->format('d/m/Y') }}
        </span>

        <div class="flex items-center gap-1.5">
            <a href="{{ route('clients.show', $client) }}">
                <x-action-button type="button" variant="info" :title="__('clients.view_profile')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </x-action-button>
            </a>

            <x-action-button
                type="button"
                variant="primary"
                :title="__('clients.edit')"
                data-action="edit-client"
                data-payload="{{ json_encode($client->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </x-action-button>

            <form method="POST" action="{{ route('clients.destroy', $client) }}" data-confirm="{{ __('clients.confirm_delete') }}">
                @csrf
                @method('DELETE')
                <x-action-button type="submit" variant="danger" :title="__('clients.delete')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </x-action-button>
            </form>
        </div>
    </div>
</div>
