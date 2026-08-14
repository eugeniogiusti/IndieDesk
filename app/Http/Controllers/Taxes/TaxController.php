<?php

namespace App\Http\Controllers\Taxes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taxes\StoreTaxRequest;
use App\Http\Requests\Taxes\UpdateTaxRequest;
use App\Models\Tax;
use App\Queries\Taxes\TaxIndexQuery;
use App\Queries\Taxes\TaxStatsQuery;
use App\Services\Taxes\TaxFundService;

class TaxController extends Controller
{
    public function __construct(
        private TaxFundService $taxFundService
    ) {}

    public function index(TaxIndexQuery $indexQuery, TaxStatsQuery $statsQuery)
    {
        $taxes = $indexQuery->handle();
        $stats = $statsQuery->handle();
        $availableYears = $this->getAvailableYears();

        return view('taxes.index', compact('taxes', 'stats', 'availableYears'));
    }

    private function getAvailableYears(): array
    {
        return range(now()->year, now()->year - 2, -1);
    }

    public function store(StoreTaxRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('taxes', 'local');
        }

        $tax = Tax::create($data);
        $this->taxFundService->syncFromTax($tax);

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.created_successfully'));
    }

    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            if ($tax->attachment) {
                \Illuminate\Support\Facades\Storage::disk('local')->delete($tax->attachment);
            }
            $data['attachment'] = $request->file('attachment')->store('taxes', 'local');
        }

        $tax->update($data);
        $this->taxFundService->syncFromTax($tax);

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.updated_successfully'));
    }

    public function destroy(Tax $tax)
    {
        $tax->delete();

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.deleted_successfully'));
    }
}
