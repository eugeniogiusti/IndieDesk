{{-- Monthly Detail --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

    {{-- Costi --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ __('statistics.detail_costs') }}
            </h3>
            <span class="text-sm font-medium text-red-600 dark:text-red-400">
                {{ number_format($stats['summary']['costs'], 2, ',', '.') }} {{ $currencySymbol }}
            </span>
        </div>

        @if($stats['detail']['costs']->isEmpty())
            <div class="p-6 text-center text-sm text-gray-400 dark:text-gray-500">
                {{ __('statistics.detail_empty') }}
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_date') }}
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_project') }}
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_type') }}
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_amount') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($stats['detail']['costs'] as $cost)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $cost->paid_at->format('d/m') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('projects.show', $cost->project) }}"
                                       class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
                                        {{ $cost->project->name }}
                                    </a>
                                    @if($cost->project->getClientLabel())
                                        <span class="block text-xs text-gray-400 dark:text-gray-500">
                                            {{ $cost->project->getClientLabel() }}
                                        </span>
                                    @else
                                        <span class="block text-xs text-gray-400 dark:text-gray-500 italic">
                                            {{ __('statistics.detail_internal') }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('costs.type_' . $cost->type) }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium text-red-600 dark:text-red-400">
                                    {{ number_format($cost->amount, 2, ',', '.') }} {{ $currencySymbol }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Pagamenti --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('statistics.detail_payments') }}
            </h3>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                {{ number_format($stats['summary']['payments'], 2, ',', '.') }} {{ $currencySymbol }}
            </span>
        </div>

        @if($stats['detail']['payments']->isEmpty())
            <div class="p-6 text-center text-sm text-gray-400 dark:text-gray-500">
                {{ __('statistics.detail_empty') }}
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_date') }}
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_project') }}
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('statistics.detail_amount') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($stats['detail']['payments'] as $payment)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $payment->paid_at->format('d/m') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('projects.show', $payment->project) }}"
                                       class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
                                        {{ $payment->project->name }}
                                    </a>
                                    @if($payment->getClientLabel())
                                        <span class="block text-xs text-gray-400 dark:text-gray-500">
                                            {{ $payment->getClientLabel() }}
                                        </span>
                                    @else
                                        <span class="block text-xs text-gray-400 dark:text-gray-500 italic">
                                            {{ __('statistics.detail_internal') }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium text-blue-600 dark:text-blue-400">
                                    {{ number_format($payment->amount, 2, ',', '.') }} {{ $currencySymbol }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
