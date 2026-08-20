<?php

namespace App\Http\Controllers\Meetings;

use App\Models\Project;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Meetings\StoreMeetingRequest;
use App\Http\Requests\Meetings\UpdateMeetingRequest;
use App\Queries\Meetings\MeetingIndexQuery;
use App\Queries\Meetings\MeetingStatsQuery;
use App\Services\Calendar\GoogleCalendarSync;

class MeetingController extends Controller
{
    public function __construct(
        private GoogleCalendarSync $calendarSync
    ) {}

    /**
     * Display a listing of meetings (global index with filters)
     */
    public function index(MeetingIndexQuery $indexQuery, MeetingStatsQuery $statsQuery)
    {
        $meetings = $indexQuery->handle();
        $stats = $statsQuery->handle();

        return view('meetings.index', compact('meetings', 'stats'));
    }

    /**
     * Store a new meeting (from project show page)
     */
    public function store(StoreMeetingRequest $request, Project $project)
    {
        $meeting = $project->meetings()->create($request->validated());

        $this->calendarSync->sync($meeting);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'meetings'])
            ->with('success', __('meetings.created_successfully'));
    }

    /**
     * Update meeting (from project show page)
     */
    public function update(UpdateMeetingRequest $request, Project $project, Meeting $meeting)
    {
        $meeting->update($request->validated());

        $this->calendarSync->sync($meeting);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'meetings'])
            ->with('success', __('meetings.updated_successfully'));
    }

    /**
     * Delete meeting (from project show page)
     */
    public function destroy(Project $project, Meeting $meeting)
    {
        $this->calendarSync->delete($meeting);

        $meeting->delete();

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'meetings'])
            ->with('success', __('meetings.deleted_successfully'));
    }

    /**
     * Mark meeting as completed
     */
    public function markCompleted(Project $project, Meeting $meeting)
    {
        $meeting->update(['status' => 'completed']);

        $this->calendarSync->sync($meeting);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'meetings'])
            ->with('success', __('meetings.marked_completed'));
    }

    /**
     * Mark meeting as cancelled
     */
    public function markCancelled(Project $project, Meeting $meeting)
    {
        $meeting->update(['status' => 'cancelled']);

        $this->calendarSync->sync($meeting);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'meetings'])
            ->with('success', __('meetings.marked_cancelled'));
    }
}
