<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use App\Services\Taxes\PaymentTaxCalculator;
use Illuminate\Support\Carbon;

/**
 * Carica il dettaglio riga per riga di costi e pagamenti per un singolo mese.
 *
 * Usata nella pagina statistiche quando è selezionato un mese specifico.
 * Restituisce costi e pagamenti con il relativo progetto (e cliente se presente),
 * filtrati per la valuta di default.
 */
class MonthlyDetailQuery
{
    private string $currency;

    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;
        $payments = $this->getPayments();

        return [
            'costs'    => $this->getCosts(),
            'payments' => $payments,
            'payment_tax_estimates' => (new PaymentTaxCalculator())->calculateForPayments($payments),
        ];
    }

    private function getCosts()
    {
        return Cost::with(['project.client', 'project.clients'])
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->orderBy('paid_at')
            ->get();
    }

    private function getPayments()
    {
        return Payment::with(['project.client', 'project.clients', 'client'])
            ->paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->orderBy('paid_at')
            ->get();
    }
}
