<?php

use App\Models\Payment;
use App\Services\Taxes\PaymentTaxCalculator;

beforeEach(function () {
    resetBusinessSettingsCache();
});

test('produces no estimate when the fiscal rates are not configured', function () {
    $payment = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR']);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($payment);

    expect($estimate)->toBeNull();
});

test('produces no estimate when only some of the rates are configured', function () {
    configureTaxSettings(['substitute_tax_rate' => null]);
    $payment = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR']);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($payment);

    expect($estimate)->toBeNull();
});

test('produces no estimate for a pending (not yet cashed) payment', function () {
    configureTaxSettings();
    $payment = Payment::factory()->pending()->create(['currency' => 'EUR']);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($payment);

    expect($estimate)->toBeNull();
});

test('produces no estimate for a payment in a non-default currency', function () {
    configureTaxSettings(); // default_currency is EUR

    $payment = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'USD']);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($payment);

    expect($estimate)->toBeNull();
});

test('calculates imponibile, inps and tax for a single isolated payment', function () {
    configureTaxSettings();

    $payment = Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => '2026-03-10',
    ]);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($payment);

    $taxableIncome = 1000 * 0.67;
    $inpsDue = $taxableIncome * 0.2607;
    $fiscalBase = $taxableIncome - $inpsDue;
    $taxDue = $fiscalBase * 0.15;

    expect($estimate)->not->toBeNull()
        ->and($estimate->taxableIncome)->toBe(round($taxableIncome, 2))
        ->and($estimate->inpsAmount)->toBe(round($inpsDue, 2))
        ->and($estimate->taxAmount)->toBe(round($taxDue, 2))
        ->and($estimate->setAsideAmount())->toBe(round($estimate->inpsAmount + $estimate->taxAmount, 2))
        ->and($estimate->netAmount())->toBe(round(1000 - $estimate->setAsideAmount(), 2));
});

test('two identical payments in the same year get identical marginal quotas when there is no ceiling', function () {
    configureTaxSettings();

    $first = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => '2026-01-10']);
    $second = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => '2026-06-10']);

    $estimates = (new PaymentTaxCalculator())->calculateForPayments(collect([$first, $second]));

    expect($estimates->get($first->id)->inpsAmount)->toBe($estimates->get($second->id)->inpsAmount)
        ->and($estimates->get($first->id)->taxAmount)->toBe($estimates->get($second->id)->taxAmount);
});

test('applies the INPS ceiling to the cumulative taxable base of the year', function () {
    // First payment's imponibile (670) stays under the 700 ceiling.
    // Second payment's cumulative imponibile (1340) goes past it.
    configureTaxSettings(['inps_ceiling' => 700.00]);

    $first = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => '2026-01-10']);
    $second = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => '2026-06-10']);

    $estimates = (new PaymentTaxCalculator())->calculateForPayments(collect([$first, $second]));

    expect($estimates->get($first->id)->inpsAmount)->toBe(round(670 * 0.2607, 2))
        ->and($estimates->get($second->id)->inpsAmount)->toBe(round((700 - 670) * 0.2607, 2));
});

test('fiscal years are isolated from one another', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create(['amount' => 5000, 'currency' => 'EUR', 'paid_at' => '2025-12-20']);
    $thisYear = Payment::factory()->paid()->create(['amount' => 1000, 'currency' => 'EUR', 'paid_at' => '2026-01-05']);

    $estimate = (new PaymentTaxCalculator())->calculateForPayment($thisYear);

    expect($estimate->inpsAmount)->toBe(round(670 * 0.2607, 2));
});
