<?php

namespace App\Services\Calendar;

use App\Models\ClientFollowup;

/**
 * Keeps a ClientFollowup's Google Calendar event in sync with the record.
 * No-ops silently when Google Calendar isn't connected.
 */
class GoogleCalendarFollowupSync
{
    public function __construct(private GoogleCalendarClient $client) {}

    /**
     * Create or update the calendar event for this follow-up.
     */
    public function sync(ClientFollowup $followup): void
    {
        if (!$this->client->isConnected() || !$followup->hasCalendarDate()) {
            return;
        }

        $event = $followup->toCalendarEvent();

        if ($followup->google_event_id && $this->client->updateEvent($followup->google_event_id, $event)) {
            return;
        }

        // No linked event yet (or the update failed because it no longer exists on
        // Google's side) — look for one that was added manually before auto-sync
        // existed, to avoid creating a duplicate, before falling back to creating one.
        $eventId = $this->client->findEventIdOnDate($followup->contacted_at, $followup->calendarTitleBody())
            ?? $this->client->createEvent($event);

        if ($eventId) {
            $followup->forceFill(['google_event_id' => $eventId])->saveQuietly();
            $this->client->updateEvent($eventId, $event);
        }
    }

    /**
     * Remove the calendar event linked to this follow-up, if any.
     */
    public function delete(ClientFollowup $followup): void
    {
        if (!$this->client->isConnected() || !$followup->google_event_id) {
            return;
        }

        $this->client->deleteEvent($followup->google_event_id);
    }
}
