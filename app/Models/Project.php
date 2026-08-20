<?php

namespace App\Models;

use App\Contracts\CalendarEventable;
use App\Services\Calendar\CalendarEvent;
use App\Services\Calendar\GoogleCalendarLinkBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model implements CalendarEventable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'name',
        'slug',
        'description',
        'status',
        'type',
        'priority',
        'repo_url',
        'staging_url',
        'production_url',
        'figma_url',
        'docs_url',
        'notes',
        'editor_notes',
        'start_date',
        'due_date',
        'hourly_rate',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
        'deleted_at'  => 'datetime',
        'start_date'  => 'date',
        'due_date'    => 'date',
        'hourly_rate' => 'decimal:2',
    ];

        /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug on create
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->name);
            }
        });
    }

    /**
     * Generate unique slug
     */
    protected static function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;
        
        while (static::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->withTrashed()
            ->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        
        return $slug;
    }

    // ==========================================
    // RELATIONSHIPS
    // ==========================================
    /**
     * Relationship: Project belongs to Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relationship: Project (type=saas) belongs to many Clients (customers)
     */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_project');
    }

    /**
     * Relationship: Project has many Tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order')->orderBy('created_at', 'desc');
    }

     /**
     * Relationship: Project has many Meetings
     */
    public function meetings()
    {
        return $this->hasMany(Meeting::class)->orderBy('scheduled_at', 'desc');
    }

    /**
     * Relationship: Project has many Payments
     */
    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('paid_at', 'desc');
    }

    /**
     * Relationship: Project has many Costs
     */
    public function costs()
    {
        return $this->hasMany(Cost::class)->orderBy('paid_at', 'desc');
    }

    /**
     * Relationship: Project has many Documents
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Relationship: Project has many Timesheets
     */
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class)->orderBy('year', 'desc')->orderBy('month', 'desc');
    }

    // ==========================================
    // CUSTOM METHODS
    // ==========================================

    /**
     * Check if project is internal (no client)
     */
    public function isInternal(): bool
    {
        return $this->client_id === null;
    }

    /**
     * Client name(s) to display for this project: the single client for
     * regular projects, or the comma-joined linked clients for SaaS ones.
     * Null when there's no client at all (internal project).
     */
    public function getClientLabel(): ?string
    {
        if ($this->client) {
            return $this->client->name;
        }

        if ($this->type === 'saas' && $this->clients->isNotEmpty()) {
            return $this->clients->pluck('name')->join(', ');
        }

        return null;
    }

    /**
     * Get available status values
     */
    public static function getStatusValues(): array
    {
        return ['draft', 'in_progress', 'completed', 'archived'];
    }

    /**
     * Get available priority values
     */
    public static function getPriorityValues(): array
    {
        return ['low', 'medium', 'high'];
    }

    // ==========================================
    // SCOPES
    // ==========================================
    /**
     * Scope: Filter by status
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope: Filter by client
     */
    public function scopeForClient($query, $clientId)
    {
        return $query->where(function ($q) use ($clientId) {
            $q->where('client_id', $clientId)
              ->orWhereHas('clients', fn($sub) => $sub->where('clients.id', $clientId));
        });
    }

    /**
     * Scope: Internal projects only
     */
    public function scopeInternal($query)
    {
        return $query->whereNull('client_id');
    }

    /**
     * Scope: Active projects (not archived)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['draft', 'in_progress', 'completed']);
    }

    // ==========================================
    // CALENDAR
    // ==========================================

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
            endDate: null,
            location: null,
            isAllDay: true,
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
        $prefix = $this->isInternal()
            ? __('projects.internal_project')
            : $this->client->name;

        return "{$prefix}: {$this->name} - " . __('projects.due_date');
    }

    private function buildCalendarDescription(): string
    {
        $sections = [];

        $sections[] = $this->buildProjectSection();

        if ($this->client) {
            $sections[] = $this->buildClientSection();
        }

        if ($this->description || $this->notes) {
            $sections[] = $this->buildNotesSection();
        }

        return implode("\n\n", $sections);
    }

    private function buildProjectSection(): string
    {
        $lines = [];

        $lines[] = '📁 ' . mb_strtoupper(__('projects.project'));
        $lines[] = '────────────────';
        $lines[] = __('projects.name') . ': ' . $this->name;
        $lines[] = __('projects.status') . ': ' . __('projects.status_' . $this->status);
        $lines[] = __('projects.type') . ': ' . __('projects.type_' . $this->type);

        if ($this->priority) {
            $lines[] = __('projects.priority') . ': ' . __('projects.priority_' . $this->priority);
        }

        if ($this->start_date) {
            $lines[] = __('projects.start_date') . ': ' . $this->start_date->format('d/m/Y');
        }

        $lines[] = __('projects.due_date') . ': ' . $this->due_date->format('d/m/Y');
        $lines[] = 'Link: ' . route('projects.show', $this);

        return implode("\n", $lines);
    }

    private function buildClientSection(): string
    {
        $lines = [];

        $lines[] = '👤 ' . mb_strtoupper(__('clients.client'));
        $lines[] = '────────────────';
        $lines[] = __('clients.name') . ': ' . $this->client->name;

        if ($this->client->email) {
            $lines[] = __('clients.email') . ': ' . $this->client->email;
        }

        if ($this->client->phone) {
            $lines[] = __('clients.phone') . ': ' . $this->client->phone;
        }

        if ($this->client->notes) {
            $lines[] = __('clients.notes') . ': ' . $this->client->notes;
        }

        return implode("\n", $lines);
    }

    private function buildNotesSection(): string
    {
        $lines = [];

        $lines[] = '📄 ' . mb_strtoupper(__('projects.notes'));
        $lines[] = '────────────────';

        if ($this->description) {
            $lines[] = __('projects.description') . ': ' . $this->description;
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
            [
                'start_date' => $this->start_date?->format('Y-m-d') ?? '',
                'due_date'   => $this->due_date?->format('Y-m-d') ?? '',
            ],
            $extra
        );
    }
}