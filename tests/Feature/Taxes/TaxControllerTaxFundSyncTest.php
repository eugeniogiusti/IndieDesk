<?php

use App\Models\Tax;
use App\Models\TaxFundMovement;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('creating a tax already marked paid auto-creates a matching withdrawal', function () {
    $response = $this->actingAs($this->user)->post(route('taxes.store'), [
        'type' => 'F24',
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'due_date' => '2026-11-30',
        'paid_at' => '2026-03-15',
        'reference_year' => 2026,
    ]);

    $response->assertRedirect(route('taxes.index'));

    $tax = Tax::firstWhere('description', 'Saldo IRPEF');
    $this->assertDatabaseHas('tax_fund_movements', [
        'tax_id' => $tax->id,
        'amount' => -250,
    ]);
});

test('marking an existing tax as paid auto-creates the withdrawal', function () {
    $tax = Tax::create([
        'type' => 'F24',
        'description' => 'Acconto INPS',
        'amount' => 400,
        'due_date' => '2026-11-30',
        'reference_year' => 2026,
        'paid_at' => null,
    ]);

    $this->assertDatabaseMissing('tax_fund_movements', ['tax_id' => $tax->id]);

    $response = $this->actingAs($this->user)->put(route('taxes.update', $tax), [
        'type' => 'F24',
        'description' => $tax->description,
        'amount' => $tax->amount,
        'due_date' => '2026-11-30',
        'paid_at' => '2026-06-01',
        'reference_year' => 2026,
    ]);

    $response->assertRedirect(route('taxes.index'));
    $this->assertDatabaseHas('tax_fund_movements', [
        'tax_id' => $tax->id,
        'amount' => -400,
    ]);
});

test('deleting a tax removes its auto-generated withdrawal', function () {
    $tax = Tax::create([
        'type' => 'F24',
        'description' => 'Saldo IRPEF',
        'amount' => 250,
        'due_date' => '2026-11-30',
        'reference_year' => 2026,
        'paid_at' => '2026-03-15',
    ]);
    (new \App\Services\Taxes\TaxFundService())->syncFromTax($tax);

    $response = $this->actingAs($this->user)->delete(route('taxes.destroy', $tax));

    $response->assertRedirect(route('taxes.index'));
    $this->assertDatabaseMissing('tax_fund_movements', ['tax_id' => $tax->id]);
});
