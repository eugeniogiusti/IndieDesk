{{-- Dettaglio mensile: costi e pagamenti riga per riga (solo vista mese) --}}
@if($stats['detail'])

    {{-- Tabella costi --}}
    <div class="summary">
        <div class="summary-title">
            {{ __('statistics.detail_costs') }}
            <span style="float: right; font-weight: normal; color: #dc2626;">
                {{ number_format($stats['detail']['costs']->sum('amount'), 2, ',', '.') }} {{ $currencySymbol }}
            </span>
        </div>

        @if($stats['detail']['costs']->isEmpty())
            <p style="font-size: 10pt; color: #999; margin-top: 10px;">{{ __('statistics.detail_empty') }}</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th style="width: 10%;">{{ __('statistics.detail_date') }}</th>
                        <th style="width: 45%;">{{ __('statistics.detail_project') }}</th>
                        <th style="width: 25%;">{{ __('statistics.detail_type') }}</th>
                        <th class="text-right" style="width: 20%;">{{ __('statistics.detail_amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['detail']['costs'] as $cost)
                        <tr>
                            <td>{{ $cost->paid_at->format('d/m') }}</td>
                            <td>
                                {{ $cost->project->name }}
                                @if($cost->project->getClientLabel())
                                    <br><span style="font-size: 8pt; color: #999;">{{ $cost->project->getClientLabel() }}</span>
                                @else
                                    <br><span style="font-size: 8pt; color: #999; font-style: italic;">{{ __('statistics.detail_internal') }}</span>
                                @endif
                            </td>
                            <td>{{ __('costs.type_' . $cost->type) }}</td>
                            <td class="text-right negative">
                                {{ number_format($cost->amount, 2, ',', '.') }} {{ $currencySymbol }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- Tabella pagamenti --}}
    <div class="summary">
        <div class="summary-title">
            {{ __('statistics.detail_payments') }}
            <span style="float: right; font-weight: normal; color: #16a34a;">
                {{ number_format($stats['detail']['payments']->sum('amount'), 2, ',', '.') }} {{ $currencySymbol }}
            </span>
            @if($stats['summary']['estimated_tax'] !== null)
                <div style="text-align: right; font-size: 8pt; color: #999; font-weight: normal;">
                    {{ __('statistics.estimated_tax') }}: {{ number_format($stats['summary']['estimated_tax'], 2, ',', '.') }} {{ $currencySymbol }}
                </div>
            @endif
        </div>

        @if($stats['detail']['payments']->isEmpty())
            <p style="font-size: 10pt; color: #999; margin-top: 10px;">{{ __('statistics.detail_empty') }}</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th style="width: 10%;">{{ __('statistics.detail_date') }}</th>
                        <th style="width: 70%;">{{ __('statistics.detail_project') }}</th>
                        <th class="text-right" style="width: 20%;">{{ __('statistics.detail_amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['detail']['payments'] as $payment)
                        <tr>
                            <td>{{ $payment->paid_at->format('d/m') }}</td>
                            <td>
                                {{ $payment->project->name }}
                                @if($payment->getClientLabel())
                                    <br><span style="font-size: 8pt; color: #999;">{{ $payment->getClientLabel() }}</span>
                                @else
                                    <br><span style="font-size: 8pt; color: #999; font-style: italic;">{{ __('statistics.detail_internal') }}</span>
                                @endif
                            </td>
                            <td class="text-right positive">
                                {{ number_format($payment->amount, 2, ',', '.') }} {{ $currencySymbol }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- Riepilogo profitto del mese --}}
    <div class="summary" style="border-top: 2px solid #333; padding-top: 15px;">
        <table style="margin-top: 0;">
            <tbody>
                <tr>
                    <td style="font-weight: bold; font-size: 11pt;">{{ __('statistics.profit') }}</td>
                    <td class="text-right" style="font-weight: bold; font-size: 13pt; {{ $stats['summary']['display_profit'] >= 0 ? 'color: #16a34a;' : 'color: #dc2626;' }}">
                        {{ $stats['summary']['display_profit'] >= 0 ? '+' : '' }}{{ number_format($stats['summary']['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                    </td>
                </tr>
                @if($stats['summary']['net_profit'] !== null)
                    <tr>
                        <td style="font-size: 9pt; color: #999;">{{ __('statistics.gross') }} / {{ __('statistics.estimated_tax') }}</td>
                        <td class="text-right" style="font-size: 9pt; color: #999;">
                            {{ number_format($stats['summary']['profit'], 2, ',', '.') }} {{ $currencySymbol }}
                            &middot; {{ number_format($stats['summary']['estimated_tax'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@endif
