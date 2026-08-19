{{-- Trashed Projects Table --}}
<div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-3">
        {{ __('projects.title') }}
    </h2>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">

        {{-- Card list (mobile) --}}
        <div class="md:hidden divide-y divide-gray-100 dark:divide-gray-700">
            @foreach($projects as $project)
                <div class="p-4 space-y-2.5">
                    <div class="flex items-start justify-between gap-2">
                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $project->name }}</span>
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $project->client?->name ?? '—' }}</div>
                    <div class="text-xs text-gray-400 dark:text-gray-500">{{ __('trash.deleted_at') }}: {{ $project->deleted_at->format('d/m/Y H:i') }}</div>
                    <div class="flex items-center gap-1.5 pt-1">
                        <form method="POST" action="{{ route('projects.restore', $project->id) }}"
                              data-confirm="{{ __('projects.confirm_restore') }}">
                            @csrf
                            <x-action-button type="submit" variant="primary" :title="__('projects.restore')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                            </x-action-button>
                        </form>
                        <form method="POST" action="{{ route('projects.force-delete', $project->id) }}"
                              data-confirm="{{ __('projects.confirm_force_delete') }}">
                            @csrf
                            @method('DELETE')
                            <x-action-button type="submit" variant="danger" :title="__('projects.force_delete')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </x-action-button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Table (desktop) --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('projects.name') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('clients.client') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('trash.deleted_at') }}
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('clients.table.actions') }}
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($projects as $project)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $project->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $project->client?->name ?? '—' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $project->deleted_at->format('d/m/Y H:i') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex flex-col items-end gap-2">
                                    {{-- Restore --}}
                                    <form method="POST" action="{{ route('projects.restore', $project->id) }}"
                                          data-confirm="{{ __('projects.confirm_restore') }}">
                                        @csrf

                                        <x-action-button type="submit" variant="primary" :title="__('projects.restore')">
                                            <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                            </svg>
                                            <span class="text-xs font-medium">{{ __('projects.restore') }}</span>
                                        </x-action-button>
                                    </form>

                                    {{-- Force Delete --}}
                                    <form method="POST" action="{{ route('projects.force-delete', $project->id) }}"
                                          data-confirm="{{ __('projects.confirm_force_delete') }}">
                                        @csrf
                                        @method('DELETE')

                                        <x-action-button type="submit" variant="danger" :title="__('projects.force_delete')">
                                            <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span class="text-xs font-medium">{{ __('projects.force_delete') }}</span>
                                        </x-action-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($projects->hasPages())
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
