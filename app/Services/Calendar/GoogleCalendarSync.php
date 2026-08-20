<?php

namespace App\Services\Calendar;

use App\Contracts\CalendarEventable;
use Illuminate\Database\Eloquent\Model;

/**
 * Keeps any CalendarEventable model's Google Calendar event in sync with
 * its record (create/update/delete). No-ops silently when Google Calendar
 * isn't connected. The model must have a nullable `google_event_id` column.
 */
class GoogleCalendarSync
{
    public function __construct(private GoogleCalendarClient $client) {}

    /**
     * Create or update the calendar event for this record.
     *
     * @param Model&CalendarEventable $model
     */
    public function sync(Model&CalendarEventable $model): void
    {
        if (!$this->client->isConnected() || !$model->hasCalendarDate()) {
            return;
        }

        $event = $model->toCalendarEvent();

        if ($model->google_event_id && $this->client->updateEvent($model->google_event_id, $event)) {
            return;
        }

        // No linked event yet (or the update failed because it no longer exists on
        // Google's side) — look for one that was added manually before auto-sync
        // existed, to avoid creating a duplicate, before falling back to creating one.
        $eventId = $this->client->findEventIdOnDate($event->startDate, $model->calendarTitleBody())
            ?? $this->client->createEvent($event);

        if ($eventId) {
            $model->forceFill(['google_event_id' => $eventId])->saveQuietly();
            $this->client->updateEvent($eventId, $event);
        }
    }

    /**
     * Remove the calendar event linked to this record, if any.
     *
     * @param Model&CalendarEventable $model
     */
    public function delete(Model&CalendarEventable $model): void
    {
        if (!$this->client->isConnected() || !$model->google_event_id) {
            return;
        }

        $this->client->deleteEvent($model->google_event_id);
        $model->forceFill(['google_event_id' => null])->saveQuietly();
    }
}
