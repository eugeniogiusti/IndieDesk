<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-3">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ $project->type === 'saas' ? __('projects.clients') : __('projects.client') }}
        </h3>
    </div>

    @if($project->type === 'saas')
        @if($project->clients->isNotEmpty())
            <ul class="space-y-1.5 max-h-64 overflow-y-auto">
                @foreach($project->clients as $client)
                    <li>
                        <a href="{{ route('clients.show', $client) }}"
                           class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 hover:underline">
                            {{ $client->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                {{ __('projects.no_clients_linked') }}
            </span>
        @endif
    @elseif($project->client)
        <x-client-summary :client="$project->client" />
    @else
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300">
            🏢 {{ __('projects.internal_project') }}
        </span>
    @endif
</div>