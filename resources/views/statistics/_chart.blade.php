{{-- Trend Chart (Annual or Monthly) --}}
<div
    x-data="annualTrendChart(@js([
        'labels' => $stats['chart']['labels'],
        'payments' => $stats['chart']['payments'],
        'costs' => $stats['chart']['costs'],
        'profit' => $stats['chart']['profit'],
        'type' => $stats['chart']['type'],
        'currencySymbol' => $currencySymbol,
        'translations' => [
            'payments' => __('statistics.payments'),
            'costs' => __('statistics.costs'),
            'profit' => __('statistics.profit'),
        ]
    ]))"
    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6"
>
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">
                {{ $stats['chart']['title'] }}
                @if($stats['chart']['type'] === 'daily' && $month)
                    - {{ \Carbon\Carbon::create($year, $month, 1)->translatedFormat('F Y') }}
                @else
                    {{ $year }}
                @endif
            </h3>
        </div>
        <div class="flex items-center gap-4 text-xs">
            <span class="flex items-center gap-1.5">
                <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                {{ __('statistics.payments') }}
            </span>
            <span class="flex items-center gap-1.5">
                <span class="w-3 h-3 rounded-full bg-red-500"></span>
                {{ __('statistics.costs') }}
            </span>
            <span class="flex items-center gap-1.5">
                <span class="w-3 h-3 rounded-full bg-indigo-500"></span>
                {{ __('statistics.profit') }}
            </span>
        </div>
    </div>

    <div class="relative h-72">
        <canvas x-ref="canvas"></canvas>
    </div>
</div>
