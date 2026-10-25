<?php

use App\Models\Client;
use App\Queries\Clients\ClientStatsQuery;

test('stats query total counts active and archived clients', function () {
    Client::factory()->active()->count(3)->create();
    Client::factory()->archived()->count(2)->create();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['total'])->toBe(5);
});

test('stats query returns correct count by status', function () {
    Client::factory()->active()->count(2)->create();
    Client::factory()->archived()->count(1)->create();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['active'])->toBe(2);
    expect($stats['archived'])->toBe(1);
});

test('stats query excludes soft deleted clients', function () {
    Client::factory()->active()->count(2)->create();
    Client::factory()->active()->create()->delete();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['total'])->toBe(2);
    expect($stats['active'])->toBe(2);
});

test('stats query returns zero for empty database', function () {
    $stats = (new ClientStatsQuery())->handle();

    expect($stats['total'])->toBe(0);
    expect($stats['active'])->toBe(0);
    expect($stats['archived'])->toBe(0);
});
