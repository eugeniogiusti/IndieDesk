<div class="space-y-6">

    <p class="text-xs text-gray-400 dark:text-gray-500">
        {{ __('profit.gross_values_note') }}
    </p>

    {{-- Main Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        {{-- Total Profit --}}
        <x-profit.stat-card
            :title="__('profit.total_profit')"
            :value="$currencySymbol . ' ' . number_format($profitData['total_profit'], 2, ',', '.')"
            gradient="emerald"
            :valueColor="$profitData['total_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400'"
            :subtitle="__('profit.margin') . ': ' . number_format($profitData['profit_margin'], 1) . '%'"
        >
            <x-slot:icon>
                <svg aria-hidden="true" class="h-8 w-8 text-emerald-600 dark:text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v10H4z"/>
                    <path d="M16 7V5H8v2"/>
                    <circle cx="12" cy="12" r="2.5"/>
                    <path d="M6 10h2M16 14h2"/>
                </svg>
            </x-slot:icon>
        </x-profit.stat-card>

        {{-- Total Payments --}}
        <x-profit.stat-card
            :title="__('profit.total_payments')"
            :value="$currencySymbol . ' ' . number_format($profitData['total_payments'], 2, ',', '.')"
            gradient="blue"
            :subtitle="$project->payments->count() . ' ' . __('profit.payments_count')"
        >
            <x-slot:icon>
                <svg aria-hidden="true" class="h-8 w-8 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v10H4z"/>
                    <path d="M12 4v8"/>
                    <path d="M8 8l4 4 4-4"/>
                </svg>
            </x-slot:icon>
        </x-profit.stat-card>

        {{-- Total Costs --}}
        <x-profit.stat-card
            :title="__('profit.total_costs')"
            :value="$currencySymbol . ' ' . number_format($profitData['total_costs'], 2, ',', '.')"
            gradient="red"
            :subtitle="$project->costs->count() . ' ' . __('profit.costs_count')"
        >
            <x-slot:icon>
                <svg aria-hidden="true" class="h-8 w-8 text-red-600 dark:text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v10H4z"/>
                    <path d="M12 20v-8"/>
                    <path d="M8 16l4-4 4 4"/>
                </svg>
            </x-slot:icon>
        </x-profit.stat-card>

        {{-- ROI --}}
        <x-profit.stat-card
            :title="__('profit.roi')"
            :value="$profitData['total_costs'] > 0 
                ? number_format(($profitData['total_profit'] / $profitData['total_costs']) * 100, 0) . '%' 
                : '∞'"
            gradient="purple"
            :subtitle="__('profit.return_on_investment')"
        >
            <x-slot:icon>
                <svg aria-hidden="true" class="h-8 w-8 text-purple-600 dark:text-purple-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19h16"/>
                    <path d="M7 16V9M12 16V5M17 16v-7"/>
                </svg>
            </x-slot:icon>
        </x-profit.stat-card>

    </div>
        
        <div class="flex flex-wrap gap-4">
            {{-- Button View Payments --}}
            <button 
                @click="activeTab = 'payments'"
                class="inline-flex items-center gap-3 px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                <span>{{ __('profit.view_payments') }}</span>
                <span class="ml-2 px-2 py-1 text-xs bg-blue-800/50 rounded-full">{{ $project->payments->count() }}</span>
            </button>

            {{-- Button View Costs --}}
            <button 
                @click="activeTab = 'costs'"
                class="inline-flex items-center gap-3 px-5 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/>
                </svg>
                <span>{{ __('profit.view_costs') }}</span>
                <span class="ml-2 px-2 py-1 text-xs bg-red-800/50 rounded-full">{{ $project->costs->count() }}</span>
            </button>
        </div>
    </div>

</div>
