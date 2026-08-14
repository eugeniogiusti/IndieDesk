<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Unit/Models', 'Unit/Queries', 'Unit/Services');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

/**
 * BusinessSettings::current() memoizes the singleton in a static property
 * for the lifetime of the PHP process, so it must be cleared between tests
 * (RefreshDatabase resets the DB, not this in-memory cache).
 */
function resetBusinessSettingsCache(): void
{
    $property = (new ReflectionClass(\App\Models\BusinessSettings::class))->getProperty('cachedInstance');
    $property->setAccessible(true);
    $property->setValue(null, null);
}

/**
 * Sets the fiscal rates used by PaymentTaxCalculator / TaxFundService on the
 * BusinessSettings singleton, defaulting to EUR + the rates quoted in the
 * original spec (67% coefficient, 26.07% INPS, 15% imposta sostitutiva).
 */
function configureTaxSettings(array $overrides = []): \App\Models\BusinessSettings
{
    $settings = \App\Models\BusinessSettings::current();

    $settings->update(array_merge([
        'default_currency' => 'EUR',
        'profitability_coefficient' => 67.00,
        'inps_rate' => 26.07,
        'substitute_tax_rate' => 15.00,
    ], $overrides));

    return $settings->fresh();
}
