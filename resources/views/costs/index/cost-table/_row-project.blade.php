{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$cost->project, 'tab' => 'costs']) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
        {{ $cost->project->name }}
    </a>
    @if(! $cost->project->isSaas() && $cost->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $cost->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$cost->project->type" />
    </div>
</td>
