<?php

namespace App\Models;

use App\Contracts\CalendarEventable;
use App\Services\Calendar\CalendarEvent;
use App\Services\Calendar\GoogleCalendarLinkBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model implements CalendarEventable
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'scheduled_at',
        'duration_minutes',
        'location',
        'meeting_url',
        'status',
        'notes',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'duration_minutes' => 'integer',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS (single source of truth)
     |-----------------------------------------------------------------*/

    public const STATUSES = [
        'scheduled',
        'completed',
        'cancelled',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES (filters for queries)
     |-----------------------------------------------------------------*/

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'scheduled')
                     ->where('scheduled_at', '>', now())
                     ->orderBy('scheduled_at', 'asc');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('scheduled_at', today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('scheduled_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    public function scopePast($query)
    {
        return $query->where('scheduled_at', '<', now());
    }

    public function scopeForProject($query, int $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function isUpcoming(): bool
    {
        return $this->status === 'scheduled' && $this->scheduled_at->isFuture();
    }

    public function isPast(): bool
    {
        return $this->scheduled_at->isPast();
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function getEndTime(): \Carbon\Carbon
    {
        return $this->scheduled_at->copy()->addMinutes($this->duration_minutes);
    }

    /* -----------------------------------------------------------------
     |  CALENDAR
     |-----------------------------------------------------------------*/

    public function hasCalendarDate(): bool
    {
        return $this->scheduled_at !== null;
    }

    public function toCalendarEvent(): CalendarEvent
    {
        return new CalendarEvent(
            title: $this->buildCalendarTitle(),
            description: $this->buildCalendarDescription(),
            startDate: $this->scheduled_at,
            endDate: $this->getEndTime(),
            location: $this->meeting_url ?? $this->location,
            isAllDay: false,
        );
    }

    public function googleCalendarUrl(): ?string
    {
        if (!$this->hasCalendarDate()) {
            return null;
        }

        return GoogleCalendarLinkBuilder::fromModel($this)->build();
    }

    private function buildCalendarTitle(): string
    {
        return "🗓️ {$this->calendarTitleBody()}";
    }

    public function calendarTitleBody(): string
    {
        return "Meeting: [{$this->project->name}] {$this->title}";
    }

    private function buildCalendarDescription(): string
    {
        $sections = [];

        $sections[] = $this->buildProjectSection();
        $sections[] = $this->buildDetailsSection();

        if ($this->description || $this->notes) {
            $sections[] = $this->buildNotesSection();
        }

        return implode("\n\n", $sections);
    }

    private function buildProjectSection(): string
    {
        $project = $this->project;
        $lines = [];

        $lines[] = '📁 ' . mb_strtoupper(__('meetings.project'));
        $lines[] = '────────────────';
        $lines[] = __('projects.name') . ': ' . $project->name;

        if ($project->client) {
            $lines[] = __('clients.client') . ': ' . $project->client->name;
        }

        $lines[] = 'Link: ' . route('projects.show', $project);

        return implode("\n", $lines);
    }

    private function buildDetailsSection(): string
    {
        $lines = [];

        $lines[] = '📝 ' . mb_strtoupper(__('projects.details'));
        $lines[] = '────────────────';
        $lines[] = __('meetings.scheduled_at') . ': ' . $this->scheduled_at->format('d/m/Y H:i');
        $lines[] = __('meetings.duration') . ': ' . $this->duration_minutes . ' min';
        $lines[] = __('meetings.status') . ': ' . __('meetings.status_' . $this->status);

        if ($this->location) {
            $lines[] = __('meetings.location') . ': ' . $this->location;
        }

        if ($this->meeting_url) {
            $lines[] = __('meetings.meeting_url') . ': ' . $this->meeting_url;
        }

        return implode("\n", $lines);
    }

    private function buildNotesSection(): string
    {
        $lines = [];

        $lines[] = '📄 ' . mb_strtoupper(__('meetings.notes'));
        $lines[] = '────────────────';

        if ($this->description) {
            $lines[] = $this->description;
        }

        if ($this->notes) {
            if ($this->description) {
                $lines[] = '';
            }
            $lines[] = $this->notes;
        }

        return implode("\n", $lines);
    }

    /**
     * Get payload for edit form (only editable fields + id).
     */
    public function toFormPayload(array $extra = []): array
    {
        return array_merge(
            $this->only(array_merge(['id'], $this->fillable)),
            $extra
        );
    }
}
