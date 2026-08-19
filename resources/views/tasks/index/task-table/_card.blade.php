{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5 {{ $task->isDone() ? 'opacity-60' : '' }}">
    <div class="flex items-start justify-between gap-2">
        <div class="font-medium text-gray-900 dark:text-white {{ $task->isDone() ? 'line-through' : '' }}">
            {{ $task->title }}
        </div>
        <x-tasks.status-badge :status="$task->status" />
    </div>

    @if($task->description)
        <div class="text-sm text-gray-500 dark:text-gray-400 {{ $task->isDone() ? 'line-through' : '' }}">
            {{ Str::limit($task->description, 80) }}
        </div>
    @endif

    <div class="text-sm">
        <a href="{{ route('projects.show', [$task->project, 'tab' => 'tasks']) }}"
           class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
            {{ $task->project->name }}
        </a>
        @if($task->project->client)
            <span class="text-xs text-gray-500 dark:text-gray-400">— {{ $task->project->client->name }}</span>
        @endif
    </div>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-tasks.type-badge :type="$task->type" />
        <x-projects.type-badge :type="$task->project->type" />
        <x-tasks.priority-badge :priority="$task->priority" />
        <x-tasks.due-date :date="$task->due_date" />
    </div>

    <div class="flex items-center justify-between pt-1">
        <div class="flex items-center gap-2">
            @if($task->taskDocuments->isNotEmpty())
                <span class="relative inline-flex text-gray-400" title="{{ $task->taskDocuments->count() }} {{ __('task_documents.document_list') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-emerald-500 text-white text-xs rounded-full w-3.5 h-3.5 flex items-center justify-center leading-none">
                        {{ $task->taskDocuments->count() }}
                    </span>
                </span>
            @endif
        </div>

        <a href="{{ route('projects.show', [$task->project, '#tasks']) }}"
           class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition">
            {{ __('tasks.view_project') }}
        </a>
    </div>
</div>
