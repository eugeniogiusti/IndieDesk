<?php

namespace App\Services\Taxes\DTO;

/**
 * Estimated tax breakdown for a single payment, computed progressively
 * against the cumulative taxable income of its fiscal year.
 *
 * @see \App\Services\Taxes\PaymentTaxCalculator
 */
final class PaymentTaxEstimate
{
    public function __construct(
        public readonly float $grossAmount,
        public readonly float $taxableIncome,
        public readonly float $inpsAmount,
        public readonly float $taxAmount,
    ) {}

    public function setAsideAmount(): float
    {
        return round($this->inpsAmount + $this->taxAmount, 2);
    }

    public function netAmount(): float
    {
        return round($this->grossAmount - $this->setAsideAmount(), 2);
    }
}
