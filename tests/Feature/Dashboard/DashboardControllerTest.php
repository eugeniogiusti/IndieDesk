<?php

use App\Models\Payment;
use App\Models\User;

beforeEach(function () {
    resetBusinessSettingsCache();
    $this->user = User::factory()->create();
});

test('dashboard loads with gross profit when fiscal rates are not configured', function () {
    // default_currency has a DB-level default ('EUR') that a freshly-created
    // BusinessSettings singleton doesn't pick up in memory, so it must be
    // set explicitly here even though this test isn't configuring rates.
    \App\Models\BusinessSettings::current()->update(['default_currency' => 'EUR']);
    Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => now()]);

    $response = $this->actingAs($this->user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertViewHas('stats', function ($stats) {
        return $stats['profit_this_month']['estimated_tax'] === null
            && $stats['profit_this_month']['amount'] === $stats['profit_this_month']['gross_amount'];
    });
});

test('dashboard nets the estimated tax out of profit this month when configured', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => now()]);

    $response = $this->actingAs($this->user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertViewHas('stats', function ($stats) {
        return $stats['profit_this_month']['estimated_tax'] > 0
            && $stats['profit_this_month']['amount'] < $stats['profit_this_month']['gross_amount'];
    });
});

test('recent payments list carries a tax estimate per payment when configured', function () {
    configureTaxSettings();

    $payment = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => now()]);

    $response = $this->actingAs($this->user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertViewHas('lists', function ($lists) use ($payment) {
        $estimate = $lists['recent_payments_tax_estimates']->get($payment->id);

        return $estimate !== null && $estimate->setAsideAmount() > 0;
    });
});
