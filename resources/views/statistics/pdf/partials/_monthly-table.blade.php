@if($stats['monthly'])
    <div class="summary">
        <div class="summary-title">{{ __('statistics.monthly_breakdown') }}</div>
        <table>
            <thead>
                <tr>
                    <th>{{ __('statistics.month') }}</th>
                    <th class="text-right">{{ __('statistics.payments') }}</th>
                    <th class="text-right">{{ __('statistics.costs') }}</th>
                    <th class="text-right">{{ __('statistics.profit') }}</th>
                    <th class="text-center">{{ __('statistics.projects') }}</th>
                    <th class="text-center">{{ __('statistics.tasks') }}</th>
                    <th class="text-center">{{ __('statistics.clients') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['monthly'] as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td class="text-right">{{ number_format($row['payments'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                        <td class="text-right">{{ number_format($row['costs'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                        <td class="text-right {{ $row['display_profit'] >= 0 ? 'positive' : 'negative' }}">
                            {{ $row['display_profit'] >= 0 ? '+' : '' }}{{ number_format($row['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="text-center">{{ $row['projects'] }}</td>
                        <td class="text-center">{{ $row['tasks'] }}</td>
                        <td class="text-center">{{ $row['clients'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>{{ __('statistics.total') }}</td>
                    <td class="text-right">{{ number_format($stats['summary']['payments'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                    <td class="text-right">{{ number_format($stats['summary']['costs'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                    <td class="text-right {{ $stats['summary']['display_profit'] >= 0 ? 'positive' : 'negative' }}">
                        {{ $stats['summary']['display_profit'] >= 0 ? '+' : '' }}{{ number_format($stats['summary']['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                    </td>
                    <td class="text-center">{{ $stats['summary']['projects_started'] }}</td>
                    <td class="text-center">{{ $stats['summary']['tasks_completed'] }}</td>
                    <td class="text-center">{{ $stats['summary']['new_clients'] }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endif
