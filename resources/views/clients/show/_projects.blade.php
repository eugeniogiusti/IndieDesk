{{-- Progetti Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('clients.recent_projects') }}</h3>
        </div>
        <a href="{{ route('projects.index', ['client_id' => $client->id]) }}" class="text-sm text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($projects->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($projects as $project)
                <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <a href="{{ route('projects.show', $project) }}" class="flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <p class="font-medium text-gray-900 dark:text-white truncate">{{ $project->name }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <x-projects.status-badge :status="$project->status" />
                                @if($project->priority)
                                    <x-projects.priority-badge :priority="$project->priority" />
                                @endif
                                @if($project->type === 'saas')
                                    <x-projects.type-badge :type="$project->type" />
                                @endif
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('projects.no_projects') }}</p>
    @endif
</div>
