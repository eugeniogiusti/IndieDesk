<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ __('timesheets.report_title') }} — {{ $monthNames[$timesheet->month] }} {{ $timesheet->year }}</title>
    <style>
        @font-face {
            font-family: 'Noto Sans CJK';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/NotoSansCJKsc-Regular.ttf') }}') format('truetype');
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DejaVu Sans', 'Noto Sans CJK', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.6;
            padding: 40px;
        }

        /* Header */
        .header-row { display: table; width: 100%; margin-bottom: 30px; }
        .logo-col    { display: table-cell; width: 50%; vertical-align: top; }
        .logo-col img { max-width: 150px; max-height: 80px; }
        .business-name { margin-top: 3px; font-size: 9pt; color: #666; }
        .report-col  { display: table-cell; width: 50%; text-align: right; vertical-align: top; }
        .report-label { font-size: 16pt; font-weight: bold; }
        .report-period { font-size: 11pt; color: #666; margin-top: 3px; }

        /* Parties */
        .parties     { display: table; width: 100%; margin-bottom: 30px; }
        .from-col    { display: table-cell; width: 50%; vertical-align: top; padding-right: 20px; }
        .to-col      { display: table-cell; width: 50%; vertical-align: top; padding-left: 20px; }
        .party-label { font-weight: bold; font-size: 9pt; color: #999; text-transform: uppercase; margin-bottom: 4px; }
        .party-name  { font-size: 11pt; font-weight: bold; }
        .party-line  { font-size: 9pt; color: #555; margin-top: 2px; }

        /* Days table */
        .section-title { font-weight: bold; font-size: 10pt; margin-bottom: 8px; color: #333; }
        table.days {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }
        table.days thead tr { background-color: #f0f0f0; }
        table.days th {
            text-align: left;
            padding: 6px 10px;
            font-size: 9pt;
            font-weight: bold;
            border-bottom: 2px solid #ccc;
        }
        table.days th.right { text-align: right; }
        table.days td {
            padding: 5px 10px;
            font-size: 10pt;
            border-bottom: 1px solid #eee;
        }
        table.days td.right { text-align: right; }
        table.days tr:last-child td { border-bottom: none; }

        /* Summary */
        .summary {
            border-top: 2px solid #333;
            padding-top: 12px;
            margin-top: 4px;
        }
        .summary-row { display: table; width: 100%; margin-bottom: 6px; }
        .summary-label { display: table-cell; font-size: 10pt; color: #555; }
        .summary-value { display: table-cell; text-align: right; font-size: 10pt; font-weight: bold; }
        .summary-total-label { display: table-cell; font-size: 13pt; font-weight: bold; }
        .summary-total-value { display: table-cell; text-align: right; font-size: 13pt; font-weight: bold; color: #1a7a4a; }

        /* Notes */
        .notes-box {
            margin-top: 24px;
            padding: 12px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 9pt;
            color: #555;
        }
        .notes-label { font-weight: bold; margin-bottom: 4px; font-size: 9pt; color: #333; }

        /* Footer */
        .footer { margin-top: 40px; font-size: 8pt; color: #aaa; text-align: center; }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header-row">
        <div class="logo-col">
            @if($business->logoAbsolutePath())
                <img src="{{ $business->logoAbsolutePath() }}" alt="Logo">
            @endif
            @if($business->business_name)
                <div class="business-name">{{ $business->business_name }}</div>
            @endif
        </div>
        <div class="report-col">
            <div class="report-label">{{ __('timesheets.report_title') }}</div>
            <div class="report-period">{{ $monthNames[$timesheet->month] }} {{ $timesheet->year }}</div>
        </div>
    </div>

    {{-- Parties --}}
    <div class="parties">
        <div class="from-col">
            <div class="party-label">{{ __('timesheets.report_from') }}</div>
            @if($business->business_name)
                <div class="party-name">{{ $business->business_name }}</div>
            @endif
            @if($business->address)
                <div class="party-line">{{ $business->address }}</div>
            @endif
            @if($business->vat_number)
                <div class="party-line">{{ __('timesheets.report_vat') }}: {{ $business->vat_number }}</div>
            @endif
        </div>
        <div class="to-col">
            <div class="party-label">{{ __('timesheets.report_project') }}</div>
            <div class="party-name">{{ $project->name }}</div>
            @if($client)
                <div class="party-line">{{ $client->name }}</div>
                @if($client->email)
                    <div class="party-line">{{ $client->email }}</div>
                @endif
            @endif
        </div>
    </div>

    {{-- Worked days table --}}
    <div class="section-title">{{ __('timesheets.report_worked_days') }}</div>
    <table class="days">
        <thead>
            <tr>
                <th>{{ __('timesheets.report_day') }}</th>
                <th>{{ __('timesheets.report_weekday') }}</th>
                <th class="right">{{ __('timesheets.hours') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workedDays as $entry)
                <tr>
                    <td>{{ $entry['day'] }}</td>
                    <td>{{ $entry['day_name'] }}</td>
                    <td class="right">{{ number_format($entry['hours'], 1) }}h</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Summary --}}
    <div class="summary">
        <div class="summary-row">
            <span class="summary-label">{{ __('timesheets.total_hours') }}</span>
            <span class="summary-value">{{ number_format($totalHours, 1) }}h</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">{{ __('timesheets.rate') }}</span>
            <span class="summary-value">
                @if($timesheet->hourly_rate > 0)
                    €{{ number_format((float) $timesheet->hourly_rate, 2) }}/h
                @else
                    —
                @endif
            </span>
        </div>
        <div class="summary-row" style="margin-top: 8px;">
            <span class="summary-total-label">{{ __('timesheets.report_total') }}</span>
            <span class="summary-total-value">
                @if($timesheet->hourly_rate > 0)
                    €{{ number_format($earnings, 2, ',', '.') }}
                @else
                    —
                @endif
            </span>
        </div>
    </div>

    {{-- Notes --}}
    @if($timesheet->notes)
        <div class="notes-box">
            <div class="notes-label">{{ __('timesheets.notes') }}</div>
            {{ $timesheet->notes }}
        </div>
    @endif

    {{-- Footer --}}
    <div class="footer">
        {{ $business->business_name }} — {{ __('timesheets.report_generated') }} {{ now()->format('d/m/Y') }}
    </div>

</body>
</html>
