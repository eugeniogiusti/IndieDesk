<?php

use App\Models\Payment;
use App\Models\User;

beforeEach(function () {
    resetBusinessSettingsCache();
    $this->user = User::factory()->create();
});

test('statistics page loads with gross profit when fiscal rates are not configured', function () {
    // default_currency has a DB-level default ('EUR') that a freshly-created
    // BusinessSettings singleton doesn't pick up in memory, so it must be
    // set explicitly here even though this test isn't configuring rates.
    \App\Models\BusinessSettings::current()->update(['default_currency' => 'EUR']);
    Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => now()]);

    $response = $this->actingAs($this->user)->get(route('statistics.index'));

    $response->assertOk();
    $response->assertViewHas('stats', function ($stats) {
        return $stats['summary']['net_profit'] === null;
    });
});

test('statistics page nets the estimated tax out of profit when configured', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => now()]);

    $response = $this->actingAs($this->user)->get(route('statistics.index', ['year' => now()->year]));

    $response->assertOk();
    $response->assertViewHas('stats', function ($stats) {
        return $stats['summary']['net_profit'] !== null
            && $stats['summary']['net_profit'] < $stats['summary']['profit'];
    });
});

test('guests cannot access statistics', function () {
    $this->get(route('statistics.index'))->assertRedirect(route('login'));
});
