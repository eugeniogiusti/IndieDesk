{{-- Monthly Breakdown Table --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="font-semibold text-gray-900 dark:text-white flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            {{ __('statistics.monthly_breakdown') }}
        </h3>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700/50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.month') }}
                    </th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.payments') }}
                    </th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.costs') }}
                    </th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.profit') }}
                    </th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.projects') }}
                    </th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.tasks') }}
                    </th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('statistics.clients') }}
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($stats['monthly'] as $row)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 {{ $row['is_current_month'] ? 'bg-emerald-50 dark:bg-emerald-900/20' : '' }}">
                        <td class="px-4 py-3 whitespace-nowrap">
                            <a href="{{ route('statistics.index', ['year' => $year, 'month' => $row['month']]) }}"
                               class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
                                {{ $row['label'] }}
                            </a>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">
                            {{ number_format($row['payments'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">
                            {{ number_format($row['costs'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium {{ $row['display_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}"
                            @if($row['net_profit'] !== null) title="{{ __('statistics.gross') }}: {{ number_format($row['profit'], 2, ',', '.') }} {{ $currencySymbol }} · {{ __('statistics.estimated_tax') }}: {{ number_format($row['estimated_tax'], 2, ',', '.') }} {{ $currencySymbol }}" @endif>
                            {{ $row['display_profit'] >= 0 ? '+' : '' }}{{ number_format($row['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-center text-sm text-gray-900 dark:text-white">
                            {{ $row['projects'] }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-center text-sm text-gray-900 dark:text-white">
                            {{ $row['tasks'] }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-center text-sm text-gray-900 dark:text-white">
                            {{ $row['clients'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-50 dark:bg-gray-700/50 font-semibold">
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        {{ __('statistics.total') }}
                    </td>
                    <td class="px-4 py-3 text-right text-sm text-gray-900 dark:text-white">
                        {{ number_format($stats['summary']['payments'], 2, ',', '.') }} {{ $currencySymbol }}
                    </td>
                    <td class="px-4 py-3 text-right text-sm text-gray-900 dark:text-white">
                        {{ number_format($stats['summary']['costs'], 2, ',', '.') }} {{ $currencySymbol }}
                    </td>
                    <td class="px-4 py-3 text-right text-sm {{ $stats['summary']['display_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $stats['summary']['display_profit'] >= 0 ? '+' : '' }}{{ number_format($stats['summary']['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                    </td>
                    <td class="px-4 py-3 text-center text-sm text-gray-900 dark:text-white">
                        {{ $stats['summary']['projects_started'] }}
                    </td>
                    <td class="px-4 py-3 text-center text-sm text-gray-900 dark:text-white">
                        {{ $stats['summary']['tasks_completed'] }}
                    </td>
                    <td class="px-4 py-3 text-center text-sm text-gray-900 dark:text-white">
                        {{ $stats['summary']['new_clients'] }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
