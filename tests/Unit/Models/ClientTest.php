<?php

use App\Models\Client;

// ==========================================
// SCOPE TESTS
// ==========================================

test('active scope returns only active clients', function () {
    Client::factory()->active()->count(2)->create();
    Client::factory()->archived()->count(1)->create();

    $activeClients = Client::active()->get();

    expect($activeClients)->toHaveCount(2);
    expect($activeClients->every(fn ($client) => $client->status === 'active'))->toBeTrue();
});

test('archived scope returns only archived clients', function () {
    Client::factory()->active()->count(2)->create();
    Client::factory()->archived()->count(1)->create();

    $archived = Client::archived()->get();

    expect($archived)->toHaveCount(1);
    expect($archived->every(fn ($client) => $client->status === 'archived'))->toBeTrue();
});

// ==========================================
// SOFT DELETE TESTS
// ==========================================

test('client uses soft deletes', function () {
    $client = Client::factory()->create();
    $clientId = $client->id;

    $client->delete();

    // Client should not be found with normal query
    expect(Client::find($clientId))->toBeNull();

    // Client should be found with trashed
    expect(Client::withTrashed()->find($clientId))->not->toBeNull();
    expect(Client::withTrashed()->find($clientId)->deleted_at)->not->toBeNull();
});

test('soft deleted client can be restored', function () {
    $client = Client::factory()->create();
    $client->delete();

    $client->restore();

    expect($client->deleted_at)->toBeNull();
    expect(Client::find($client->id))->not->toBeNull();
});

test('client can be force deleted', function () {
    $client = Client::factory()->create();
    $clientId = $client->id;

    $client->forceDelete();

    expect(Client::withTrashed()->find($clientId))->toBeNull();
});

// ==========================================
// FILLABLE TESTS
// ==========================================

test('client has correct fillable attributes', function () {
    $client = new Client();

    $expectedFillable = [
        'name',
        'email',
        'stripe_customer_id',
        'status',
        'acquisition_source',
        'vat_number',
        'phone_prefix',
        'phone',
        'pec',
        'email_fatturazione',
        'billing_address',
        'billing_city',
        'billing_zip',
        'billing_province',
        'billing_country',
        'billing_recipient_code',
        'website',
        'linkedin',
        'notes',
    ];

    expect($client->getFillable())->toBe($expectedFillable);
});

// ==========================================
// FACTORY TESTS
// ==========================================

test('client factory creates valid client', function () {
    $client = Client::factory()->create();

    expect($client->name)->not->toBeEmpty();
    expect($client->email)->not->toBeEmpty();
    expect($client->status)->toBeIn(['active', 'archived']);
});

test('client factory minimal state creates client with only required fields', function () {
    $client = Client::factory()->minimal()->create();

    expect($client->name)->not->toBeEmpty();
    expect($client->email)->not->toBeEmpty();
    expect($client->vat_number)->toBeNull();
    expect($client->phone)->toBeNull();
    expect($client->website)->toBeNull();
});
