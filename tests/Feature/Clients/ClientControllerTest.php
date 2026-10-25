<?php

use App\Models\Client;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

// ==========================================
// INDEX TESTS
// ==========================================

test('clients index page is displayed', function () {
    Client::factory()->count(3)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.index'));

    $response->assertOk();
    $response->assertViewIs('clients.index');
    $response->assertViewHas('clients');
    $response->assertViewHas('stats');
});

test('clients index can filter by status', function () {
    Client::factory()->active()->count(2)->create();
    Client::factory()->archived()->count(3)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.index', ['status' => 'active']));

    $response->assertOk();
    expect($response->viewData('clients')->count())->toBe(2);
});

test('clients index can search by name', function () {
    Client::factory()->create(['name' => 'Acme Corporation']);
    Client::factory()->create(['name' => 'Beta Inc']);

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.index', ['search' => 'Acme']));

    $response->assertOk();
    expect($response->viewData('clients')->count())->toBe(1);
    expect($response->viewData('clients')->first()->name)->toBe('Acme Corporation');
});

test('clients index can search by email', function () {
    Client::factory()->create(['email' => 'contact@acme.com']);
    Client::factory()->create(['email' => 'info@beta.com']);

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.index', ['search' => 'acme.com']));

    $response->assertOk();
    expect($response->viewData('clients')->count())->toBe(1);
});

test('guests cannot access clients index', function () {
    $response = $this->get(route('clients.index'));

    $response->assertRedirect(route('login'));
});

// ==========================================
// STORE TESTS
// ==========================================

test('client can be created with valid data', function () {
    $clientData = [
        'name' => 'New Client',
        'email' => 'newclient@example.com',
        'status' => 'active',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), $clientData);

    $response->assertRedirect(route('clients.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('clients', [
        'name' => 'New Client',
        'email' => 'newclient@example.com',
        'status' => 'active',
    ]);
});

test('client can be created with all fields', function () {
    $clientData = [
        'name' => 'Full Client',
        'email' => 'full@example.com',
        'status' => 'active',
        'vat_number' => 'IT12345678901',
        'phone_prefix' => '+39',
        'phone' => '3331234567',
        'pec' => 'pec@example.com',
        'billing_address' => 'Via Roma 1',
        'billing_city' => 'Milano',
        'billing_zip' => '20100',
        'billing_province' => 'MI',
        'billing_country' => 'IT',
        'billing_recipient_code' => 'ABC1234',
        'website' => 'https://example.com',
        'linkedin' => 'https://linkedin.com/company/example',
        'notes' => 'Some notes here',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), $clientData);

    $response->assertRedirect(route('clients.index'));
    $this->assertDatabaseHas('clients', ['email' => 'full@example.com']);
});

test('client cannot be created without required fields', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), []);

    $response->assertSessionHasErrors(['name', 'status']);
});

test('client cannot be created with duplicate email', function () {
    Client::factory()->create(['email' => 'existing@example.com']);

    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), [
            'name' => 'New Client',
            'email' => 'existing@example.com',
            'status' => 'active',
        ]);

    $response->assertSessionHasErrors('email');
});

test('client cannot be created with invalid status', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), [
            'name' => 'New Client',
            'email' => 'new@example.com',
            'status' => 'invalid_status',
        ]);

    $response->assertSessionHasErrors('status');
});

test('client cannot be created with legacy lead or prospect status', function (string $status) {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), [
            'name' => 'New Client',
            'status' => $status,
        ]);

    $response->assertSessionHasErrors('status');
})->with(['lead', 'prospect']);

test('client cannot be created with invalid email', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), [
            'name' => 'New Client',
            'email' => 'not-an-email',
            'status' => 'active',
        ]);

    $response->assertSessionHasErrors('email');
});

test('client cannot be created with invalid website url', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.store'), [
            'name' => 'New Client',
            'email' => 'new@example.com',
            'status' => 'active',
            'website' => 'not-a-url',
        ]);

    $response->assertSessionHasErrors('website');
});

// ==========================================
// SHOW TESTS
// ==========================================

test('client show page is displayed', function () {
    $client = Client::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.show', $client));

    $response->assertOk();
    $response->assertViewIs('clients.show');
    $response->assertViewHas('client');
});

test('client show returns 404 for non-existent client', function () {
    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.show', 99999));

    $response->assertNotFound();
});

// ==========================================
// UPDATE TESTS
// ==========================================

test('client can be updated', function () {
    $client = Client::factory()->create([
        'name' => 'Old Name',
        'email' => 'old@example.com',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('clients.update', $client), [
            'name' => 'New Name',
            'email' => 'new@example.com',
            'status' => 'active',
        ]);

    $response->assertRedirect(route('clients.index'));
    $response->assertSessionHas('success');

    $client->refresh();
    expect($client->name)->toBe('New Name');
    expect($client->email)->toBe('new@example.com');
    expect($client->status)->toBe('active');
});

test('client email can remain unchanged during update', function () {
    $client = Client::factory()->create(['email' => 'same@example.com']);

    $response = $this
        ->actingAs($this->user)
        ->put(route('clients.update', $client), [
            'name' => 'Updated Name',
            'email' => 'same@example.com',
            'status' => 'active',
        ]);

    $response->assertRedirect(route('clients.index'));
    $response->assertSessionHasNoErrors();
});

// ==========================================
// DELETE TESTS (Soft Delete)
// ==========================================

test('client can be soft deleted', function () {
    $client = Client::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->delete(route('clients.destroy', $client));

    $response->assertRedirect(route('clients.index'));
    $response->assertSessionHas('success');

    $this->assertSoftDeleted('clients', ['id' => $client->id]);
});

test('soft deleted client is not visible in index', function () {
    $client = Client::factory()->create();
    $client->delete();

    $response = $this
        ->actingAs($this->user)
        ->get(route('clients.index'));

    $response->assertOk();
    expect($response->viewData('clients')->contains('id', $client->id))->toBeFalse();
});

// ==========================================
// RESTORE TESTS
// ==========================================

test('soft deleted client can be restored', function () {
    $client = Client::factory()->create();
    $client->delete();

    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.restore', $client->id));

    $response->assertRedirect(route('trash.index'));
    $response->assertSessionHas('success');

    $client->refresh();
    expect($client->deleted_at)->toBeNull();
});

test('restore returns 404 for non-existent client', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('clients.restore', 99999));

    $response->assertNotFound();
});

// ==========================================
// FORCE DELETE TESTS
// ==========================================

test('client can be permanently deleted', function () {
    $client = Client::factory()->create();
    $clientId = $client->id;
    $client->delete();

    $response = $this
        ->actingAs($this->user)
        ->delete(route('clients.force-delete', $clientId));

    $response->assertRedirect(route('trash.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('clients', ['id' => $clientId]);
});

test('force delete returns 404 for non-existent client', function () {
    $response = $this
        ->actingAs($this->user)
        ->delete(route('clients.force-delete', 99999));

    $response->assertNotFound();
});
