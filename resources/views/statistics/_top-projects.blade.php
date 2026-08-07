{{-- Top 10 most profitable projects for the selected year --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center gap-2 p-4 border-b border-gray-200 dark:border-gray-700">
        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('statistics.top_projects_title') }}</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-xs uppercase text-gray-500 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">{{ __('statistics.top_projects_project') }}</th>
                    <th class="px-4 py-3 text-left">{{ __('statistics.top_projects_client') }}</th>
                    <th class="px-4 py-3 text-right">{{ __('statistics.top_projects_income') }}</th>
                    <th class="px-4 py-3 text-right">{{ __('statistics.top_projects_costs') }}</th>
                    <th class="px-4 py-3 text-right">{{ __('statistics.top_projects_profit') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($stats['top_projects'] as $index => $row)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('projects.show', $row['project']) }}"
                               class="font-medium text-gray-900 dark:text-white hover:text-purple-600 dark:hover:text-purple-400">
                                {{ $row['project']->name }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                            {{ $row['project']->getClientLabel() ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-right text-emerald-600 dark:text-emerald-400">
                            +{{ number_format($row['income'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="px-4 py-3 text-right text-red-500 dark:text-red-400">
                            -{{ number_format($row['costs'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                        <td class="px-4 py-3 text-right font-semibold {{ $row['profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-500 dark:text-red-400' }}">
                            {{ $row['profit'] >= 0 ? '+' : '' }}{{ number_format($row['profit'], 2, ',', '.') }} {{ $currencySymbol }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
