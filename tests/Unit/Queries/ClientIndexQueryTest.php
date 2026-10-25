<?php

use App\Models\Client;
use App\Queries\Clients\ClientIndexQuery;

test('index query returns paginated results', function () {
    Client::factory()->count(20)->create();

    $result = (new ClientIndexQuery())->handle();

    expect($result)->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
    expect($result->perPage())->toBe(15);
    expect($result->total())->toBe(20);
});

test('index query filters by status', function () {
    Client::factory()->active()->count(3)->create();
    Client::factory()->archived()->count(2)->create();

    // Simulate request with status filter
    request()->merge(['status' => 'active']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->total())->toBe(3);
    expect($result->every(fn ($client) => $client->status === 'active'))->toBeTrue();

    // Clean up request
    request()->replace([]);
});

test('index query searches by name', function () {
    Client::factory()->create(['name' => 'Acme Corporation']);
    Client::factory()->create(['name' => 'Beta Company']);
    Client::factory()->create(['name' => 'Acme Industries']);

    request()->merge(['search' => 'Acme']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->total())->toBe(2);

    request()->replace([]);
});

test('index query searches by email', function () {
    Client::factory()->create(['email' => 'contact@acme.com']);
    Client::factory()->create(['email' => 'info@beta.com']);

    request()->merge(['search' => '@acme.com']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->email)->toBe('contact@acme.com');

    request()->replace([]);
});

test('index query searches by vat number', function () {
    Client::factory()->create(['vat_number' => 'IT12345678901']);
    Client::factory()->create(['vat_number' => 'IT98765432109']);

    request()->merge(['search' => '12345']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->vat_number)->toBe('IT12345678901');

    request()->replace([]);
});

test('index query sorts by created_at desc by default', function () {
    $oldest = Client::factory()->create(['created_at' => now()->subDays(2)]);
    $newest = Client::factory()->create(['created_at' => now()]);
    $middle = Client::factory()->create(['created_at' => now()->subDay()]);

    $result = (new ClientIndexQuery())->handle();

    expect($result->first()->id)->toBe($newest->id);
    expect($result->last()->id)->toBe($oldest->id);
});

test('index query can sort by custom field', function () {
    Client::factory()->create(['name' => 'Charlie']);
    Client::factory()->create(['name' => 'Alpha']);
    Client::factory()->create(['name' => 'Beta']);

    request()->merge(['sort_by' => 'name', 'sort_direction' => 'asc']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->first()->name)->toBe('Alpha');
    expect($result->last()->name)->toBe('Charlie');

    request()->replace([]);
});

test('index query combines status filter and search', function () {
    Client::factory()->active()->create(['name' => 'Acme Active']);
    Client::factory()->archived()->create(['name' => 'Acme Archived']);
    Client::factory()->active()->create(['name' => 'Beta Active']);

    request()->merge(['status' => 'active', 'search' => 'Acme']);

    $result = (new ClientIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->name)->toBe('Acme Active');

    request()->replace([]);
});
