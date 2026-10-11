{{-- Project Cell --}}
<td class="px-4 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$document->project, 'tab' => 'documents']) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
        {{ $document->project->name }}
    </a>
    @if(! $document->project->isSaas() && $document->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $document->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$document->project->type" />
    </div>
</td>
