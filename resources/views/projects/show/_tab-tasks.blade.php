<div class="space-y-6">
    
    {{-- Header --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('tasks.task_list') }}
        </h3>
        <button 
            @click="$dispatch('open-task-modal')"
            class="inline-flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('tasks.add_task') }}
        </button>
    </div>

    {{-- Tabella (partial) --}}
    @if($showData['tasksCount'] > 0)
        @include('tasks.partials._task-table', ['tasks' => $showData['tasks'], 'project' => $project])

        {{-- Link Vedi tutti --}}
        @if($showData['tasksCount'] > 50)
            <div class="text-center">
                <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('tasks.view_all') }} ({{ $showData['tasksCount'] }})
                </a>
            </div>
        @endif
    @else
        @include('tasks.index._empty-state')
    @endif

    {{-- Modal Form --}}
    @include('tasks.partials._modal-form', ['project' => $project])

</div>
