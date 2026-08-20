<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\GoogleCalendarSettings;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class GoogleCalendarSettingsController extends Controller
{
    /**
     * Redirect to Google's OAuth consent screen, requesting offline access
     * so we get a refresh token back in the callback.
     */
    public function connect(): RedirectResponse
    {
        return Socialite::driver('google')
            ->redirectUrl(route('settings.google-calendar.callback'))
            ->scopes(['https://www.googleapis.com/auth/calendar.events'])
            ->with(['access_type' => 'offline', 'prompt' => 'consent'])
            ->redirect();
    }

    /**
     * Store the tokens returned by Google and mark the integration as connected.
     */
    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')
            ->redirectUrl(route('settings.google-calendar.callback'))
            ->user();

        if (!$googleUser->refreshToken) {
            return redirect()
                ->route('settings.business.edit', ['tab' => 'integrations'])
                ->with('error', __('business_settings.google_calendar_connect_failed'));
        }

        GoogleCalendarSettings::current()->update([
            'access_token' => $googleUser->token,
            'refresh_token' => $googleUser->refreshToken,
            'expires_at' => now()->addSeconds($googleUser->expiresIn ?? 3600),
            'email' => $googleUser->email,
        ]);

        return redirect()
            ->route('settings.business.edit', ['tab' => 'integrations'])
            ->with('success', __('business_settings.google_calendar_connected'));
    }

    /**
     * Forget the stored tokens.
     */
    public function disconnect(): RedirectResponse
    {
        GoogleCalendarSettings::current()->disconnect();

        return redirect()
            ->route('settings.business.edit', ['tab' => 'integrations'])
            ->with('success', __('business_settings.google_calendar_disconnected'));
    }
}
