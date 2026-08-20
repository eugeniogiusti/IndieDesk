{{-- Task table row for project show page --}}
<tr x-data="taskToggle({{ $task->id }}, {{ $project->id }}, '{{ $task->status }}')"
    class="hover:bg-gray-50 dark:hover:bg-gray-700 transition"
    :class="{ 'opacity-60': isDone }">
    {{-- Title & Description --}}
    <td class="px-4 py-3">
        <div class="flex items-start gap-3">
            {{-- Toggle Circle --}}
            <button @click="toggle()"
                    :disabled="loading"
                    class="mt-0.5 flex-shrink-0 w-5 h-5 rounded-full border-2 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                    :class="isDone
                        ? 'bg-emerald-500 border-emerald-500 text-white'
                        : 'border-gray-300 dark:border-gray-500 hover:border-emerald-400'"
                    :title="isDone ? '{{ __('tasks.mark_incomplete') }}' : '{{ __('tasks.mark_complete') }}'">
                <svg x-show="isDone" class="w-full h-full p-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                <svg x-show="loading" class="w-full h-full p-0.5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>

            {{-- Title --}}
            <div class="flex-1 min-w-0">
                <div class="font-medium text-gray-900 dark:text-white"
                     :class="{ 'line-through': isDone }">
                    {{ $task->title }}
                </div>
                @if($task->description)
                    <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-md"
                         :class="{ 'line-through': isDone }">
                        {{ Str::limit($task->description, 100) }}
                    </div>
                @endif
                <div class="mt-1">
                    <x-tasks.type-badge :type="$task->type" />
                </div>
            </div>
        </div>
    </td>

    {{-- Status Badge (reactive to toggle) & Priority Badge --}}
    <td class="px-4 py-3">
        <div class="space-y-1">
            {{-- Show original status when not changed --}}
            <span x-show="currentStatus === '{{ $task->status }}'" x-cloak>
                <x-tasks.status-badge :status="$task->status" />
            </span>

            {{-- Show 'done' badge when toggled to done --}}
            <span x-show="currentStatus === 'done' && '{{ $task->status }}' !== 'done'" x-cloak
                  class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ __('tasks.status_done') }}
            </span>

            {{-- Show 'todo' badge when toggled from done to todo --}}
            <span x-show="currentStatus === 'todo' && '{{ $task->status }}' === 'done'" x-cloak
                  class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                {{ __('tasks.status_todo') }}
            </span>

            <div>
                <x-tasks.priority-badge :priority="$task->priority" />
            </div>
        </div>
    </td>

    {{-- Due Date --}}
    <td class="px-4 py-3">
        <x-tasks.due-date :date="$task->due_date" />
    </td>

    {{-- Actions --}}
    <td class="px-4 py-4 text-right">
        @include('tasks.partials._table-row-actions', ['task' => $task, 'project' => $project])
    </td>
</tr>
