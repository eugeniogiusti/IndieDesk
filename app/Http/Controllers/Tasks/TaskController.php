<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Project;
use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Queries\Tasks\TaskIndexQuery;
use App\Queries\Tasks\TaskStatsQuery;
use App\Services\Tasks\TaskDocumentService;
use App\Services\Calendar\GoogleCalendarSync;

class TaskController extends Controller
{
    public function __construct(
        private TaskDocumentService $taskDocumentService,
        private GoogleCalendarSync $calendarSync
    ) {}


    /**
     * Retrieves paginated Task with applied filters and calculates
     * aggregated statistics for index page cards.
     */
    public function index(TaskIndexQuery $indexQuery, TaskStatsQuery $statsQuery)
    {
        $tasks = $indexQuery->handle();
        $stats = $statsQuery->handle();
        
        return view('tasks.index', compact('tasks', 'stats'));
    }


    /**
     * Store a new task (from project show page)
     */
    public function store(StoreTaskRequest $request, Project $project)
    {
        $task = $project->tasks()->create(
            $request->safe()->except(['file', 'document_name'])
        );

        // Upload document if provided
        if ($request->hasFile('file')) {
            $name = $request->input('document_name') ?: pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $this->taskDocumentService->upload($task, $request->file('file'), ['name' => $name]);
        }

        $this->calendarSync->sync($task);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.created_successfully'));
    }

    /**
     * Update task (from project show page)
     */
    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $task->update($request->safe()->except(['file', 'document_name']));

        // Upload new document if provided
        if ($request->hasFile('file')) {
            $name = $request->input('document_name') ?: pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $this->taskDocumentService->upload($task, $request->file('file'), ['name' => $name]);
        }

        $this->calendarSync->sync($task);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.updated_successfully'));
    }

    /**
     * Toggle task done status (AJAX)
     */
    public function toggleDone(Project $project, Task $task)
    {
        $newStatus = $task->status === 'done' ? 'todo' : 'done';
        $task->update(['status' => $newStatus]);

        $this->calendarSync->sync($task);

        return response()->json([
            'status' => $task->status,
            'isDone' => $task->isDone(),
        ]);
    }

    /**
     * Delete task (from project show page)
     */
    public function destroy(Project $project, Task $task)
    {
        $this->calendarSync->delete($task);

        $task->delete();

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.deleted_successfully'));
    }
}