<?php

namespace App\Services\Calendar;

use App\Models\GoogleCalendarSettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Thin REST client for the Google Calendar API (primary calendar only).
 * Handles access token refresh transparently using the stored refresh token.
 */
class GoogleCalendarClient
{
    private const EVENTS_URL = 'https://www.googleapis.com/calendar/v3/calendars/primary/events';

    private const TOKEN_URL = 'https://oauth2.googleapis.com/token';

    public function isConnected(): bool
    {
        return GoogleCalendarSettings::current()->isConnected();
    }

    /**
     * Create an event on the primary calendar. Returns the Google event id, or null on failure.
     */
    public function createEvent(CalendarEvent $event): ?string
    {
        $token = $this->getValidAccessToken();

        if (!$token) {
            return null;
        }

        $response = Http::withToken($token)->post(self::EVENTS_URL, $this->buildPayload($event));

        if ($response->failed()) {
            Log::warning('Google Calendar: failed to create event', ['response' => $response->json()]);

            return null;
        }

        return $response->json('id');
    }

    /**
     * Look for a pre-existing event on the given day whose title contains
     * the given text (e.g. a follow-up added manually before auto-sync
     * existed). Returns its id if found, to avoid creating a duplicate.
     */
    public function findEventIdOnDate(Carbon $date, string $titleContains): ?string
    {
        $token = $this->getValidAccessToken();

        if (!$token) {
            return null;
        }

        $response = Http::withToken($token)->get(self::EVENTS_URL, [
            'timeMin' => $date->copy()->startOfDay()->toRfc3339String(),
            'timeMax' => $date->copy()->endOfDay()->toRfc3339String(),
            'q' => $titleContains,
            'singleEvents' => 'true',
        ]);

        if ($response->failed()) {
            return null;
        }

        foreach ($response->json('items', []) as $item) {
            if (str_contains($item['summary'] ?? '', $titleContains)) {
                return $item['id'];
            }
        }

        return null;
    }

    /**
     * Update an existing event. Returns false on failure.
     */
    public function updateEvent(string $eventId, CalendarEvent $event): bool
    {
        $token = $this->getValidAccessToken();

        if (!$token) {
            return false;
        }

        $response = Http::withToken($token)->put(self::EVENTS_URL . "/{$eventId}", $this->buildPayload($event));

        if ($response->failed()) {
            Log::warning('Google Calendar: failed to update event', ['event_id' => $eventId, 'response' => $response->json()]);

            return false;
        }

        return true;
    }

    /**
     * Delete an event. A 404/410 (already gone) is treated as success.
     */
    public function deleteEvent(string $eventId): bool
    {
        $token = $this->getValidAccessToken();

        if (!$token) {
            return false;
        }

        $response = Http::withToken($token)->delete(self::EVENTS_URL . "/{$eventId}");

        if ($response->failed() && !in_array($response->status(), [404, 410], true)) {
            Log::warning('Google Calendar: failed to delete event', ['event_id' => $eventId, 'response' => $response->json()]);

            return false;
        }

        return true;
    }

    private function buildPayload(CalendarEvent $event): array
    {
        $payload = [
            'summary' => $event->title,
            'description' => $event->description,
        ];

        if ($event->isAllDay) {
            $payload['start'] = ['date' => $event->startDate->format('Y-m-d')];
            $payload['end'] = ['date' => ($event->endDate ?? $event->startDate)->copy()->addDay()->format('Y-m-d')];
        } else {
            $timeZone = $event->startDate->getTimezone()->getName();
            $endDate = $event->endDate ?? $event->startDate->copy()->addHour();

            $payload['start'] = ['dateTime' => $event->startDate->toRfc3339String(), 'timeZone' => $timeZone];
            $payload['end'] = ['dateTime' => $endDate->toRfc3339String(), 'timeZone' => $timeZone];
        }

        if ($event->location) {
            $payload['location'] = $event->location;
        }

        return $payload;
    }

    /**
     * Return a valid access token, refreshing it via the stored refresh token if expired.
     */
    private function getValidAccessToken(): ?string
    {
        $settings = GoogleCalendarSettings::current();

        if (!$settings->isConnected()) {
            return null;
        }

        if ($settings->access_token && $settings->expires_at?->isFuture()) {
            return $settings->access_token;
        }

        return $this->refreshAccessToken($settings);
    }

    private function refreshAccessToken(GoogleCalendarSettings $settings): ?string
    {
        $response = Http::asForm()->post(self::TOKEN_URL, [
            'client_id' => config('services.google.client_id'),
            'client_secret' => config('services.google.client_secret'),
            'refresh_token' => $settings->refresh_token,
            'grant_type' => 'refresh_token',
        ]);

        if ($response->failed()) {
            Log::warning('Google Calendar: failed to refresh access token', ['response' => $response->json()]);

            return null;
        }

        $data = $response->json();

        $settings->update([
            'access_token' => $data['access_token'],
            'expires_at' => now()->addSeconds($data['expires_in'] - 60),
        ]);

        return $data['access_token'];
    }
}
