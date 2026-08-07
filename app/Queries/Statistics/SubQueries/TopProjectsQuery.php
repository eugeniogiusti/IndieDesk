<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Returns the top 10 most profitable projects for the selected year.
 *
 * Aggregates income, costs and profit (income - costs) per project.
 * Used only in the full-year statistics view.
 * Filters by the default currency.
 */
class TopProjectsQuery
{
    private string $currency;

    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): Collection
    {
        $this->currency = BusinessSettings::current()->default_currency;

        $payments = $this->getPaymentsByProject();
        $costs    = $this->getCostsByProject();

        // Merge all project IDs found in payments and costs
        $projectIds = $payments->keys()->merge($costs->keys())->unique();

        $projects = Project::with(['client', 'clients'])
            ->whereIn('id', $projectIds)
            ->get()
            ->keyBy('id');

        return $projectIds
            ->map(function (int $projectId) use ($payments, $costs, $projects) {
                $income  = $payments->get($projectId, 0);
                $expense = $costs->get($projectId, 0);

                return [
                    'project' => $projects->get($projectId),
                    'income'  => $income,
                    'costs'   => $expense,
                    'profit'  => $income - $expense,
                ];
            })
            ->sortByDesc('profit')
            ->take(10)
            ->values();
    }

    private function getPaymentsByProject(): Collection
    {
        return Payment::paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->selectRaw('project_id, SUM(amount) as total')
            ->groupBy('project_id')
            ->pluck('total', 'project_id')
            ->map(fn ($v) => (float) $v);
    }

    private function getCostsByProject(): Collection
    {
        return Cost::where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->selectRaw('project_id, SUM(amount) as total')
            ->groupBy('project_id')
            ->pluck('total', 'project_id')
            ->map(fn ($v) => (float) $v);
    }
}
