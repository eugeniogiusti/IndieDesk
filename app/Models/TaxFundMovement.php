<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * A single deposit or withdrawal on the freelancer's dedicated tax savings
 * account. Amount is signed: positive = deposit, negative = withdrawal.
 * The account balance is the sum of all movements (see TaxFundService).
 *
 * A movement with a tax_id was auto-generated when that Tax was marked
 * paid (see TaxFundService::syncFromTax) — kept in sync with it rather
 * than requiring a separate manual entry.
 */
class TaxFundMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_id',
        'date',
        'amount',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }
}
