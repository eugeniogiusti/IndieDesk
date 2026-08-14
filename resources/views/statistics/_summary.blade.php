{{-- Summary Cards --}}
<div class="space-y-4">
    {{-- Financial Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Profit (net of estimated tax when the fiscal rates are configured) --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg {{ $stats['summary']['display_profit'] >= 0 ? 'bg-emerald-100 dark:bg-emerald-900/30' : 'bg-red-100 dark:bg-red-900/30' }}">
                    <svg class="w-5 h-5 {{ $stats['summary']['display_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.profit') }}</p>
                    <p class="text-xl font-bold {{ $stats['summary']['display_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $stats['summary']['display_profit'] >= 0 ? '+' : '' }}{{ number_format($stats['summary']['display_profit'], 2, ',', '.') }} {{ $currencySymbol }}
                    </p>
                    <div class="mt-2 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                        <span class="text-emerald-600">+{{ number_format($stats['summary']['payments'], 2, ',', '.') }}</span>
                        <span class="text-red-500">-{{ number_format($stats['summary']['costs'], 2, ',', '.') }}</span>
                        @if($stats['summary']['estimated_tax'] !== null)
                            <span class="text-amber-500">-{{ number_format($stats['summary']['estimated_tax'], 2, ',', '.') }} {{ __('dashboard.taxes_abbr') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Payments --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.payments') }}</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ number_format($stats['summary']['payments'], 2, ',', '.') }} {{ $currencySymbol }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Costs --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg bg-red-100 dark:bg-red-900/30">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.costs') }}</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ number_format($stats['summary']['costs'], 2, ',', '.') }} {{ $currencySymbol }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Pending --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-lg bg-amber-100 dark:bg-amber-900/30">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.pending') }}</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ number_format($stats['summary']['pending'], 2, ',', '.') }} {{ $currencySymbol }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Operational Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        {{-- Projects Started --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.projects_started') }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['summary']['projects_started'] }}</p>
        </div>

        {{-- Projects Completed --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.projects_completed') }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['summary']['projects_completed'] }}</p>
        </div>

        {{-- Tasks Completed --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.tasks_completed') }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['summary']['tasks_completed'] }}</p>
        </div>

        {{-- Meetings Held --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.meetings_held') }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['summary']['meetings_held'] }}</p>
        </div>

        {{-- New Clients --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5 transition-transform duration-200 hover:scale-105">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('statistics.new_clients') }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['summary']['new_clients'] }}</p>
        </div>
    </div>
</div>
