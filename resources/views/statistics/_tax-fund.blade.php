{{-- Tax Fund: balance on the dedicated tax savings account vs estimated amount due --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-5"
     x-data="{ showForm: false, showMovements: false }">

    <div class="flex items-center justify-between flex-wrap gap-3">
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">
            {{ __('tax_fund.title') }}
        </h3>
        <button type="button" @click="showForm = !showForm"
                class="text-sm text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
            + {{ __('tax_fund.add_movement') }}
        </button>
    </div>

    @if($taxFund['due'] === null)
        <p class="text-sm text-gray-400 dark:text-gray-500 mt-3">
            {{ __('tax_fund.not_configured') }}
        </p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('tax_fund.balance') }}</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ number_format($taxFund['balance'], 2, ',', '.') }} {{ $currencySymbol }}
                </p>
            </div>
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('tax_fund.remaining_due') }}</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ number_format($taxFund['remaining'], 2, ',', '.') }} {{ $currencySymbol }}
                </p>
                @if($taxFund['paid'] > 0)
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                        {{ __('tax_fund.due_this_year') }}: {{ number_format($taxFund['due'], 2, ',', '.') }} {{ $currencySymbol }}
                        ({{ __('tax_fund.already_paid') }} {{ number_format($taxFund['paid'], 2, ',', '.') }} {{ $currencySymbol }})
                    </p>
                @endif
            </div>
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $taxFund['difference'] >= 0 ? __('tax_fund.surplus') : __('tax_fund.shortfall') }}
                </p>
                <p class="text-xl font-bold {{ $taxFund['difference'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}">
                    {{ $taxFund['difference'] >= 0 ? '+' : '' }}{{ number_format($taxFund['difference'], 2, ',', '.') }} {{ $currencySymbol }}
                </p>
            </div>
        </div>
    @endif

    {{-- Add movement form --}}
    <form method="POST" action="{{ route('tax-fund-movements.store') }}" x-show="showForm" x-cloak class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('tax_fund.date') }}</label>
                <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" required
                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('tax_fund.amount') }}</label>
                <input type="number" name="amount" step="0.01" min="0.01" required
                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">&nbsp;</label>
                <select name="type" class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="deposit">{{ __('tax_fund.deposit') }}</option>
                    <option value="withdrawal">{{ __('tax_fund.withdrawal') }}</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('tax_fund.notes') }}</label>
                <input type="text" name="notes" placeholder="{{ __('tax_fund.notes_placeholder') }}"
                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="px-3 py-1.5 text-sm bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition">
                {{ __('ui.save') }}
            </button>
        </div>
    </form>

    {{-- Recent movements --}}
    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        <button type="button" @click="showMovements = !showMovements"
                class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 font-medium">
            {{ __('tax_fund.recent_movements') }} <span x-text="showMovements ? '▲' : '▼'"></span>
        </button>

        <div x-show="showMovements" x-cloak class="mt-3 space-y-2">
            @forelse($taxFund['movements'] as $movement)
                <div class="flex items-center justify-between text-sm">
                    <div class="min-w-0">
                        <span class="text-gray-900 dark:text-white">{{ $movement->date->format('d/m/Y') }}</span>
                        <span class="{{ $movement->amount >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }} font-medium ml-2">
                            {{ $movement->amount >= 0 ? '+' : '' }}{{ number_format($movement->amount, 2, ',', '.') }} {{ $currencySymbol }}
                        </span>
                        @if($movement->notes)
                            <span class="text-gray-400 dark:text-gray-500 ml-2 truncate">{{ $movement->notes }}</span>
                        @endif
                    </div>
                    @if($movement->tax_id)
                        <span class="text-gray-400 dark:text-gray-500" title="{{ __('tax_fund.auto_movement_hint') }}">🔗</span>
                    @else
                        <form method="POST" action="{{ route('tax-fund-movements.destroy', $movement) }}"
                              data-confirm="{{ __('tax_fund.confirm_delete') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400" title="{{ __('ui.delete') }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <p class="text-sm text-gray-400 dark:text-gray-500">{{ __('tax_fund.no_movements') }}</p>
            @endforelse
        </div>
    </div>
</div>
