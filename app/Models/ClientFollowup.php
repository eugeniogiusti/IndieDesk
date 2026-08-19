<?php

namespace App\Models;

use App\Contracts\CalendarEventable;
use App\Services\Calendar\CalendarEvent;
use App\Services\Calendar\GoogleCalendarLinkBuilder;
use Illuminate\Database\Eloquent\Model;

class ClientFollowup extends Model implements CalendarEventable
{
    public const TYPES = ['call', 'email', 'whatsapp', 'linkedin'];

    protected $fillable = [
        'type',
        'note',
        'contacted_at',
        'completed',
    ];

    protected $casts = [
        'contacted_at' => 'date',
        'completed'    => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /* -----------------------------------------------------------------
     |  CALENDAR
     |-----------------------------------------------------------------*/

    public function hasCalendarDate(): bool
    {
        return $this->contacted_at !== null;
    }

    public function toCalendarEvent(): CalendarEvent
    {
        $clientName = $this->client?->name ?? '';
        $typeLabel  = __('clients.followup.type_' . $this->type);

        return new CalendarEvent(
            title: "📞 Follow-up: {$clientName} — {$typeLabel}",
            description: $this->buildCalendarDescription(),
            startDate: $this->contacted_at->startOfDay(),
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

    private function buildCalendarDescription(): string
    {
        $lines = [];

        $lines[] = '📞 ' . mb_strtoupper(__('clients.followup.section_title'));
        $lines[] = '────────────────';
        $lines[] = __('clients.followup.type') . ': ' . __('clients.followup.type_' . $this->type);
        $lines[] = __('clients.followup.contacted_at') . ': ' . $this->contacted_at->format('d/m/Y');

        if ($this->note) {
            $lines[] = '';
            $lines[] = '📄 ' . mb_strtoupper(__('clients.followup.note'));
            $lines[] = '────────────────';
            $lines[] = $this->note;
        }

        return implode("\n", $lines);
    }
}
