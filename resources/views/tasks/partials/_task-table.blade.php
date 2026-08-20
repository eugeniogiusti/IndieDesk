{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="min-w-[760px] w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('tasks.task_title') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('tasks.status_priority') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('tasks.due_date') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($tasks as $task)
                @include('tasks.partials._table-row', ['task' => $task, 'project' => $project])
            @endforeach
        </tbody>
    </table>
</div>
