{{-- Follow-ups Count Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    @if($client->needsFollowup())
        <div class="flex flex-col gap-1">
            @if($client->followups_count > 0)
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400 w-fit">
                    {{ $client->followups_count }}
                </span>
                <span class="text-xs text-gray-500 dark:text-gray-400">
                    {{ __('clients.followup.last_contact') }}: {{ \Carbon\Carbon::parse($client->followups_max_contacted_at)->format('d/m/Y') }}
                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 w-fit">
                    0
                </span>
            @endif
        </div>
    @else
        <span class="text-xs text-gray-400 dark:text-gray-500">—</span>
    @endif
</td>
