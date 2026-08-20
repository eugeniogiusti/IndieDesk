{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition {{ $task->isDone() ? 'opacity-60' : '' }}">
    @include('tasks.index.task-table._row-project')
    @include('tasks.index.task-table._row-title')
    @include('tasks.index.task-table._row-priority')
    @include('tasks.index.task-table._row-due-date')
    @include('tasks.index.task-table._row-actions')
</tr>
