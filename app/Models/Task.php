<?php

namespace App\Models;

use App\Contracts\CalendarEventable;
use App\Services\Calendar\CalendarEvent;
use App\Services\Calendar\GoogleCalendarLinkBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model implements CalendarEventable
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'type',
        'status',
        'priority',
        'due_date',
        'order',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS (single source of truth)
     |-----------------------------------------------------------------*/

    public const TYPES = [
        'feature',
        'improvement',
        'bug',
        'infra',
        'refactor',
        'research',
        'administrative',
        'marketing',
        'hardware',
        'documentation',
        'maintenance',
    ];

    public const STATUSES = [
        'todo',
        'in_progress',
        'blocked',
        'done',
    ];

    public const PRIORITIES = [
        'low',
        'medium',
        'high',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function taskDocuments()
    {
        return $this->hasMany(TaskDocument::class)->latest('uploaded_at');
    }

    /* -----------------------------------------------------------------
     |  SCOPES (filters for queries)
     |-----------------------------------------------------------------*/

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopePriority($query, string $priority)
    {
        return $query->where('priority', $priority);
    }

    public function scopeOverdue($query)
    {
        return $query->whereNotNull('due_date')
                     ->where('due_date', '<', now())
                     ->where('status', '!=', 'done');
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status', ['todo', 'in_progress', 'blocked']);
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function isDone(): bool
    {
        return $this->status === 'done';
    }

    public function isBlocked(): bool
    {
        return $this->status === 'blocked';
    }

    public function isOverdue(): bool
    {
        return $this->due_date !== null
            && $this->due_date->isPast()
            && $this->status !== 'done';
    }

    /* -----------------------------------------------------------------
     |  CALENDAR
     |-----------------------------------------------------------------*/

    public function hasCalendarDate(): bool
    {
        return $this->due_date !== null;
    }

    public function toCalendarEvent(): CalendarEvent
    {
        return new CalendarEvent(
            title: $this->buildCalendarTitle(),
            description: $this->buildCalendarDescription(),
            startDate: $this->due_date,
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
        return "📋 {$this->calendarTitleBody()}";
    }

    public function calendarTitleBody(): string
    {
        return "Task: [{$this->project->name}] {$this->title}";
    }

    private function buildCalendarDescription(): string
    {
        $sections = [];

        // Project section
        $sections[] = $this->buildProjectSection();

        // Details section
        $sections[] = $this->buildDetailsSection();

        // Description section (if exists)
        if ($this->description) {
            $sections[] = $this->buildDescriptionSection();
        }

        return implode("\n\n", $sections);
    }

    private function buildProjectSection(): string
    {
        $project = $this->project;
        $lines = [];

        $lines[] = '📁 ' . mb_strtoupper(__('tasks.project'));
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
        $lines[] = __('tasks.type') . ': ' . __('tasks.type_' . $this->type);
        $lines[] = __('tasks.status') . ': ' . __('tasks.status_' . $this->status);

        if ($this->priority) {
            $lines[] = __('tasks.priority') . ': ' . __('tasks.priority_' . $this->priority);
        }

        return implode("\n", $lines);
    }

    private function buildDescriptionSection(): string
    {
        $lines = [];

        $lines[] = '📄 ' . mb_strtoupper(__('tasks.description'));
        $lines[] = '────────────────';
        $lines[] = $this->description;

        return implode("\n", $lines);
    }

    /* -----------------------------------------------------------------
     |  FORM PAYLOAD
     |-----------------------------------------------------------------*/

    public function toFormPayload(array $extra = []): array
    {
        $documents = $this->relationLoaded('taskDocuments')
            ? $this->taskDocuments->map(fn($doc) => [
                'id'           => $doc->id,
                'name'         => $doc->name,
                'extension'    => $doc->file_extension,
                'download_url' => $doc->getDownloadUrl(),
                'delete_url'   => $doc->getDeleteUrl(),
            ])->toArray()
            : [];

        return array_merge(
            $this->only(array_merge(['id'], $this->fillable)),
            [
                'due_date'  => $this->due_date?->format('Y-m-d') ?? '',
                'documents' => $documents,
            ],
            $extra
        );
    }
}
