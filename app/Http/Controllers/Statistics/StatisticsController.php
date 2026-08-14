<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Models\TaxFundMovement;
use App\Queries\Statistics\StatisticsQuery;
use App\Services\Statistics\StatisticsPdfExporter;
use App\Services\Taxes\TaxFundService;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request, TaxFundService $taxFundService)
    {
        $year = (int) $request->get('year', now()->year);
        $month = $request->has('month')
            ? ($request->get('month') ? (int) $request->get('month') : null)
            : now()->month;

        $availableYears = $this->getAvailableYears();
        $stats = (new StatisticsQuery($year, $month))->handle();

        $taxFund = [
            'balance' => $taxFundService->balance(),
            'due' => $taxFundService->dueThisYear(),
            'paid' => $taxFundService->paidThisYear(),
            'remaining' => $taxFundService->remainingDue(),
            'difference' => $taxFundService->difference(),
            'movements' => TaxFundMovement::latest('date')->latest('id')->take(10)->get(['id', 'tax_id', 'date', 'amount', 'notes']),
        ];

        return view('statistics.index', compact(
            'year',
            'month',
            'availableYears',
            'stats',
            'taxFund'
        ));
    }

    public function exportPdf(Request $request)
    {
        $year = (int) $request->get('year', now()->year);
        $month = $request->get('month') ? (int) $request->get('month') : null;

        return (new StatisticsPdfExporter($year, $month))->download();
    }

    private function getAvailableYears(): array
    {
        $startYear = 2026;
        $currentYear = now()->year;

        return range($currentYear, $startYear);
    }
}
