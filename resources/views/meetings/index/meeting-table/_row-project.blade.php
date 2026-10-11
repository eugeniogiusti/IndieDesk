{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$meeting->project, 'tab' => 'meetings']) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
        {{ $meeting->project->name }}
    </a>
    @if(! $meeting->project->isSaas() && $meeting->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $meeting->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$meeting->project->type" />
    </div>
</td>