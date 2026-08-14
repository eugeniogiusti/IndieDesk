<?php

use App\Models\Payment;
use App\Models\Tax;
use App\Models\TaxFundMovement;
use App\Services\Taxes\TaxFundService;

beforeEach(function () {
    resetBusinessSettingsCache();
});

// ==========================================
// syncFromTax()
// ==========================================

test('syncFromTax creates a matching withdrawal for a paid tax', function () {
    $tax = Tax::create([
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'reference_year' => now()->year,
        'paid_at' => '2026-03-15',
    ]);

    (new TaxFundService())->syncFromTax($tax);

    $movement = TaxFundMovement::where('tax_id', $tax->id)->first();

    expect($movement)->not->toBeNull()
        ->and((float) $movement->amount)->toBe(-250.0)
        ->and($movement->date->format('Y-m-d'))->toBe('2026-03-15');
});

test('syncFromTax does not create a movement for an unpaid tax', function () {
    $tax = Tax::create([
        'description' => 'Acconto IRPEF',
        'amount' => 250,
        'due_date' => '2026-11-30',
        'reference_year' => now()->year,
        'paid_at' => null,
    ]);

    (new TaxFundService())->syncFromTax($tax);

    expect(TaxFundMovement::where('tax_id', $tax->id)->exists())->toBeFalse();
});

test('syncFromTax updates the existing movement when the tax is edited', function () {
    $tax = Tax::create([
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'reference_year' => now()->year,
        'paid_at' => '2026-03-15',
    ]);
    $service = new TaxFundService();
    $service->syncFromTax($tax);

    $tax->update(['amount' => 300, 'paid_at' => '2026-03-20']);
    $service->syncFromTax($tax);

    expect(TaxFundMovement::where('tax_id', $tax->id)->count())->toBe(1);
    $movement = TaxFundMovement::where('tax_id', $tax->id)->first();
    expect((float) $movement->amount)->toBe(-300.0)
        ->and($movement->date->format('Y-m-d'))->toBe('2026-03-20');
});

test('syncFromTax removes the movement when the tax is unmarked as paid', function () {
    $tax = Tax::create([
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'reference_year' => now()->year,
        'paid_at' => '2026-03-15',
    ]);
    $service = new TaxFundService();
    $service->syncFromTax($tax);

    $tax->update(['paid_at' => null, 'due_date' => '2026-11-30']);
    $service->syncFromTax($tax);

    expect(TaxFundMovement::where('tax_id', $tax->id)->exists())->toBeFalse();
});

test('deleting a tax cascades to its auto-generated movement', function () {
    $tax = Tax::create([
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'reference_year' => now()->year,
        'paid_at' => '2026-03-15',
    ]);
    (new TaxFundService())->syncFromTax($tax);

    $tax->delete();

    expect(TaxFundMovement::where('tax_id', $tax->id)->exists())->toBeFalse();
});

test('balance is the sum of all movements, deposits and withdrawals', function () {
    TaxFundMovement::factory()->create(['amount' => 500]);
    TaxFundMovement::factory()->create(['amount' => 300]);
    TaxFundMovement::factory()->withdrawal()->create(['amount' => -100]);

    expect((new TaxFundService())->balance())->toBe(700.0);
});

test('due this year is null when the fiscal rates are not configured', function () {
    expect((new TaxFundService())->dueThisYear())->toBeNull()
        ->and((new TaxFundService())->difference())->toBeNull();
});

test('due this year sums the estimated inps and tax of the current year paid payments', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    $taxableIncome = 1000 * 0.67;
    $inpsDue = $taxableIncome * 0.2607;
    $taxDue = ($taxableIncome - $inpsDue) * 0.15;
    $expectedDue = round($inpsDue, 2) + round($taxDue, 2);

    // Compared as formatted strings: two floats that are both "correct" to
    // the cent can differ in their last binary digit (e.g. 248.97 stored as
    // 248.96999999999997), so a strict float toBe() is the wrong tool here.
    expect(number_format((new TaxFundService())->dueThisYear(), 2))->toBe(number_format($expectedDue, 2));
});

test('difference is balance minus due, positive when the fund covers the estimate', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    $service = new TaxFundService();
    TaxFundMovement::factory()->create(['amount' => $service->dueThisYear() + 50]);

    expect($service->difference())->toBe(50.0);
});

test('difference is negative when the fund falls short of the estimate', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    $service = new TaxFundService();
    TaxFundMovement::factory()->create(['amount' => $service->dueThisYear() - 30]);

    expect($service->difference())->toBe(-30.0);
});

test('a payment from last year does not count toward this year\'s due amount', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 5000,
        'currency' => 'EUR',
        'paid_at' => now()->subYear(),
    ]);

    expect((new TaxFundService())->dueThisYear())->toBe(0.0);
});

test('a tax paid now for a past reference_year does not reduce this year\'s remaining due', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    // Paid out of pocket right now, but it settles LAST year's liability.
    Tax::create([
        'description' => 'F24 saldo anno precedente',
        'amount' => 300,
        'reference_year' => now()->year - 1,
        'paid_at' => now(),
    ]);

    $service = new TaxFundService();

    expect($service->paidThisYear())->toBe(0.0)
        ->and($service->remainingDue())->toBe($service->dueThisYear());
});

test('a tax paid for the current reference_year reduces the remaining due', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    $service = new TaxFundService();
    $due = $service->dueThisYear();

    Tax::create([
        'description' => 'Acconto INPS',
        'amount' => 50,
        'reference_year' => now()->year,
        'paid_at' => now(),
    ]);

    expect($service->paidThisYear())->toBe(50.0)
        ->and($service->remainingDue())->toBe(round($due - 50, 2));
});

test('an unpaid tax for the current year does not reduce the remaining due', function () {
    configureTaxSettings();

    Payment::factory()->paid()->create([
        'amount' => 1000,
        'currency' => 'EUR',
        'paid_at' => now()->startOfYear()->addDays(10),
    ]);

    $service = new TaxFundService();
    $due = $service->dueThisYear();

    Tax::create([
        'description' => 'Acconto INPS (non ancora pagato)',
        'amount' => 50,
        'reference_year' => now()->year,
        'due_date' => now()->addMonth(),
        'paid_at' => null,
    ]);

    expect($service->remainingDue())->toBe($due);
});
