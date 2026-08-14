<?php

use App\Models\Tax;
use App\Models\TaxFundMovement;
use App\Models\User;
use App\Services\Taxes\TaxFundService;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('a deposit is stored with a positive signed amount', function () {
    $response = $this->actingAs($this->user)->post(route('tax-fund-movements.store'), [
        'date' => '2026-03-10',
        'amount' => 500,
        'type' => 'deposit',
        'notes' => 'Accantonato da fattura',
    ]);

    $response->assertRedirect(route('statistics.index'));
    $this->assertDatabaseHas('tax_fund_movements', [
        'amount' => 500,
        'notes' => 'Accantonato da fattura',
    ]);
});

test('a withdrawal is stored with a negative signed amount', function () {
    $response = $this->actingAs($this->user)->post(route('tax-fund-movements.store'), [
        'date' => '2026-03-10',
        'amount' => 200,
        'type' => 'withdrawal',
    ]);

    $response->assertRedirect(route('statistics.index'));
    $this->assertDatabaseHas('tax_fund_movements', [
        'amount' => -200,
    ]);
});

test('amount is required and must be a positive number', function () {
    $response = $this->actingAs($this->user)->post(route('tax-fund-movements.store'), [
        'date' => '2026-03-10',
        'amount' => -50,
        'type' => 'deposit',
    ]);

    $response->assertSessionHasErrors(['amount']);
});

test('a movement can be deleted', function () {
    $movement = TaxFundMovement::factory()->create();

    $response = $this->actingAs($this->user)->delete(route('tax-fund-movements.destroy', $movement));

    $response->assertRedirect(route('statistics.index'));
    $this->assertDatabaseMissing('tax_fund_movements', ['id' => $movement->id]);
});

test('a movement auto-generated from a paid tax cannot be deleted directly', function () {
    $tax = Tax::create([
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'reference_year' => now()->year,
        'paid_at' => '2026-03-15',
    ]);
    (new TaxFundService())->syncFromTax($tax);
    $movement = TaxFundMovement::where('tax_id', $tax->id)->firstOrFail();

    $response = $this->actingAs($this->user)->delete(route('tax-fund-movements.destroy', $movement));

    $response->assertRedirect(route('statistics.index'));
    $response->assertSessionHas('error');
    $this->assertDatabaseHas('tax_fund_movements', ['id' => $movement->id]);
});

test('guests cannot register or delete tax fund movements', function () {
    $movement = TaxFundMovement::factory()->create();

    $this->post(route('tax-fund-movements.store'), ['date' => '2026-03-10', 'amount' => 100, 'type' => 'deposit'])
        ->assertRedirect(route('login'));

    $this->delete(route('tax-fund-movements.destroy', $movement))
        ->assertRedirect(route('login'));
});
