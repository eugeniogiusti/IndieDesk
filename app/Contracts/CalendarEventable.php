<?php

namespace App\Contracts;

use App\Services\Calendar\CalendarEvent;

interface CalendarEventable
{
    public function toCalendarEvent(): CalendarEvent;

    public function hasCalendarDate(): bool;

    /**
     * Stable part of the event title (no state-based prefix/emoji), used to
     * match this record against a pre-existing calendar event that was
     * created manually before auto-sync existed, avoiding duplicates.
     */
    public function calendarTitleBody(): string;
}
