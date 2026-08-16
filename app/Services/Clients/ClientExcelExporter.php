<?php

namespace App\Services\Clients;

use App\Queries\Clients\ClientIndexQuery;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Exports the clients list to an .xlsx file, honoring the same filters
 * (status, follow-up status, acquisition source, search) as the clients
 * index page.
 */
class ClientExcelExporter
{
    private function headers(): array
    {
        return [
            __('clients.name'),
            __('clients.email'),
            __('clients.phone'),
            __('clients.status'),
            __('clients.acquisition_source'),
            __('clients.vat_number'),
            __('clients.pec'),
            __('clients.email_fatturazione'),
            __('clients.billing_city'),
            __('clients.billing_province'),
            __('clients.website'),
            __('clients.table.created_at'),
        ];
    }

    public function download(): StreamedResponse
    {
        $clients = (new ClientIndexQuery())->query()->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle(__('clients.title'));

        $sheet->fromArray($this->headers(), null, 'A1');
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);

        $row = 2;
        foreach ($clients as $client) {
            $sheet->fromArray([
                $client->name,
                $client->email,
                trim(($client->phone_prefix ?? '') . ' ' . ($client->phone ?? '')),
                __('clients.status_' . $client->status),
                $client->acquisition_source
                    ? __('clients.acquisition_sources.options.' . $client->acquisition_source->value)
                    : '',
                $client->vat_number,
                $client->pec,
                $client->email_fatturazione,
                $client->billing_city,
                $client->billing_province,
                $client->website,
                $client->created_at?->format('d/m/Y'),
            ], null, "A{$row}");
            $row++;
        }

        foreach (range('A', 'L') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = Str::slug(__('clients.title')) . '_' . now()->format('Y-m-d_His') . '.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
