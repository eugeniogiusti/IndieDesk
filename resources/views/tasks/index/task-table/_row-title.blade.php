{{-- Task Title Cell --}}
<td class="px-6 py-4">
    <div class="flex-1 min-w-0">
        <div class="font-medium text-gray-900 dark:text-white {{ $task->isDone() ? 'line-through' : '' }}">
            {{ $task->title }}
        </div>
        @if($task->description)
            <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1 {{ $task->isDone() ? 'line-through' : '' }}">
                {{ Str::limit($task->description, 80) }}
            </div>
        @endif
        <div class="mt-1">
            <x-tasks.type-badge :type="$task->type" />
        </div>
    </div>
</td>
