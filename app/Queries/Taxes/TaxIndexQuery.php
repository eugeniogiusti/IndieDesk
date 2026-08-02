<?php

namespace App\Queries\Taxes;

use App\Models\Tax;

class TaxIndexQuery
{
    public function handle()
    {
        return Tax::query()
            ->when(request('reference_year'), fn($q, $year) => $q->referenceYear($year))
            ->when(request('paid') === '1', fn($q) => $q->paid())
            ->when(request('paid') === '0', fn($q) => $q->unpaid())
            ->when(request('type'), fn($q, $type) => $q->where('type', $type))
            ->when(request('search'), fn($q, $search) => $q->where('description', 'like', "%{$search}%"))
            ->orderBy('due_date', 'desc')
            ->paginate(15);
    }
}
