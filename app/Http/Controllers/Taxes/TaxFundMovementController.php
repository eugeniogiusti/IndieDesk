<?php

namespace App\Http\Controllers\Taxes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taxes\StoreTaxFundMovementRequest;
use App\Models\TaxFundMovement;

class TaxFundMovementController extends Controller
{
    public function store(StoreTaxFundMovementRequest $request)
    {
        TaxFundMovement::create([
            'date' => $request->validated('date'),
            'amount' => $request->signedAmount(),
            'notes' => $request->validated('notes'),
        ]);

        return redirect()
            ->route('statistics.index')
            ->with('success', __('tax_fund.movement_created'));
    }

    public function destroy(TaxFundMovement $taxFundMovement)
    {
        if ($taxFundMovement->tax_id !== null) {
            return redirect()
                ->route('statistics.index')
                ->with('error', __('tax_fund.cannot_delete_auto_movement'));
        }

        $taxFundMovement->delete();

        return redirect()
            ->route('statistics.index')
            ->with('success', __('tax_fund.movement_deleted'));
    }
}
