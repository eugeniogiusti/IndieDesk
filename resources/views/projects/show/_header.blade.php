{{-- resources/views/projects/show/_header.blade.php --}}

<div class="sticky top-0 z-10 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 -mx-4 sm:-mx-6 px-4 sm:px-6 py-4 mb-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between sm:gap-6">

        {{-- LEFT: Back + Title + Meta --}}
        <div class="flex items-start gap-3 sm:gap-4 min-w-0">

            {{-- Back --}}
            <a href="{{ route('projects.index') }}"
               class="mt-1 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition shrink-0"
               aria-label="{{ __('projects.back_to_list') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            {{-- Title + meta --}}
            <div class="min-w-0">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white break-words sm:truncate">
                    {{ $project->name }}
                </h1>

                {{-- META ROW (one line, spaced, wrap only if needed) --}}
                <div class="mt-2 grid grid-cols-1 gap-2 sm:flex sm:flex-wrap sm:items-center sm:gap-x-6 sm:gap-y-2">

                    {{-- Project type --}}
                    <div class="flex min-w-0 items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('projects.type') }}:
                        </span>
                        <x-projects.type-badge :type="$project->type" />
                    </div>

                    {{-- State --}}
                    <div class="flex min-w-0 items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('projects.status') }}:
                        </span>
                        <x-projects.status-badge :status="$project->status" />
                    </div>

                    {{-- Priority --}}
                    <div class="flex min-w-0 items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('projects.priority') }}:
                        </span>
                        <x-projects.priority-badge :priority="$project->priority" />
                    </div>

                    {{-- Due Date (only if exists) --}}
                    @if($project->due_date)
                        <div class="flex min-w-0 items-center gap-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                {{ __('projects.due_date') }}:
                            </span>
                            <x-projects.due-date :date="$project->due_date" />
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- RIGHT: Actions --}}
<div class="flex items-center gap-2 sm:shrink-0">
    <button
        type="button"
        data-action="edit-project"
        data-payload="{{ json_encode(array_merge($project->toFormPayload(['client_name' => $project->client?->name, 'clients' => $project->clients->map(fn($c) => ['id' => $c->id, 'name' => $c->name])->values()->toArray()]), ['_back' => 'show']), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
        class="inline-flex w-full sm:w-auto items-center justify-center gap-2 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        <span class="text-sm font-semibold">{{ __('projects.edit') }}</span>
    </button>
</div>

    </div>
</div>
