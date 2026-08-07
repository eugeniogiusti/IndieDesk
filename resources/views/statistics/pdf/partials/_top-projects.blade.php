@if($stats['top_projects'] && $stats['top_projects']->isNotEmpty())
    <div class="summary">
        <div class="summary-title">{{ __('statistics.top_projects_title') }}</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th>{{ __('statistics.top_projects_project') }}</th>
                    <th>{{ __('statistics.top_projects_client') }}</th>
                    <th class="text-right">{{ __('statistics.top_projects_income') }}</th>
                    <th class="text-right">{{ __('statistics.top_projects_costs') }}</th>
                    <th class="text-right">{{ __('statistics.top_projects_profit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['top_projects'] as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row['project']->name }}</td>
                        <td>{{ $row['project']->getClientLabel() ?? '—' }}</td>
                        <td class="text-right positive">+{{ number_format($row['income'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                        <td class="text-right negative">-{{ number_format($row['costs'], 2, ',', '.') }} {{ $currencySymbol }}</td>
                        <td class="text-right {{ $row['profit'] >= 0 ? 'positive' : 'negative' }}">
                            {{ $row['profit'] >= 0 ? '+' : '' }}{{ number_format($row['profit'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
