<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateBusinessSettingsRequest;
use App\Models\AtecoCode;
use App\Models\BusinessDocument;
use App\Models\BusinessSettings;
use App\Models\GoogleCalendarSettings;
use App\Services\Settings\BusinessSettingsService;

class BusinessSettingsController extends Controller
{
    public function __construct(
        private BusinessSettingsService $service
    ) {}

    /**
     * Show business settings form
     */
    public function edit()
    {
        $settings       = BusinessSettings::current();
        $atecoCodes     = AtecoCode::orderBy('is_primary', 'desc')->orderBy('code')->get();
        $businessDocs   = BusinessDocument::latest('uploaded_at')->get();
        $googleCalendar = GoogleCalendarSettings::current();

        return view('settings.business', compact('settings', 'atecoCodes', 'businessDocs', 'googleCalendar'));
    }

    /**
     * Update business settings
     */
    public function update(UpdateBusinessSettingsRequest $request)
    {
        $this->service->update($request->validated());

        // Prendi il tab attivo dal referer (hash) o usa default
        $tab = $request->input('_active_tab', 'personal');

        return redirect()
            ->route('settings.business.edit', ['tab' => $tab])
            ->with('success', __('business_settings.updated_successfully'));
    }

    /**
     * Delete logo
     */
    public function deleteLogo()
    {
        $this->service->deleteLogo();

        return redirect()
            ->route('settings.business.edit', ['tab' => 'business'])
            ->with('success', __('business_settings.logo_deleted'));
    }
}