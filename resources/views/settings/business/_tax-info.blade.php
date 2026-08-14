<div class="space-y-6">

    {{-- CF, P.IVA, IBAN, Currency --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-input
            name="tax_id"
            :label="__('business_settings.tax_id')"
            :placeholder="__('business_settings.placeholder.tax_id')"
            :value="$settings->tax_id"
        />
        <x-form-input
            name="vat_number"
            :label="__('business_settings.vat_number')"
            :placeholder="__('business_settings.placeholder.vat_number')"
            :value="$settings->vat_number"
        />
    </div>

    <div>
        <label for="default_currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('business_settings.default_currency') }}
        </label>
        <select name="default_currency"
                id="default_currency"
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @foreach(\App\Models\BusinessSettings::CURRENCIES as $code => $symbol)
                <option value="{{ $code }}" {{ ($settings->default_currency ?? 'EUR') === $code ? 'selected' : '' }}>
                    {{ $code }} ({{ $symbol }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- Fiscal Regime Section --}}
    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4">
            {{ __('business_settings.fiscal_regime_section') }}
        </h3>

        <div class="space-y-4">
            <x-form-input
                name="tax_regime"
                :label="__('business_settings.tax_regime')"
                :placeholder="__('business_settings.placeholder.tax_regime')"
                :value="$settings->tax_regime"
            />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Substitute Tax Rate --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.substitute_tax_rate') }}
                    </label>
                    <div class="flex items-center gap-2">
                        <input type="number"
                               name="substitute_tax_rate"
                               value="{{ $settings->substitute_tax_rate }}"
                               step="0.01" min="0" max="100"
                               placeholder="{{ __('business_settings.placeholder.substitute_tax_rate') }}"
                               class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                        <span class="text-sm text-gray-500 dark:text-gray-400">%</span>
                    </div>
                    @error('substitute_tax_rate')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Profitability Coefficient --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.profitability_coefficient') }}
                    </label>
                    <div class="flex items-center gap-2">
                        <input type="number"
                               name="profitability_coefficient"
                               value="{{ $settings->profitability_coefficient }}"
                               step="0.01" min="0" max="100"
                               placeholder="{{ __('business_settings.placeholder.profitability_coefficient') }}"
                               class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                        <span class="text-sm text-gray-500 dark:text-gray-400">%</span>
                    </div>
                    @error('profitability_coefficient')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- INPS Rate (Gestione Separata) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.inps_rate') }}
                    </label>
                    <div class="flex items-center gap-2">
                        <input type="number"
                               name="inps_rate"
                               value="{{ $settings->inps_rate }}"
                               step="0.01" min="0" max="100"
                               placeholder="{{ __('business_settings.placeholder.inps_rate') }}"
                               class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                        <span class="text-sm text-gray-500 dark:text-gray-400">%</span>
                    </div>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">{{ __('business_settings.inps_rate_hint') }}</p>
                    @error('inps_rate')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INPS Ceiling (massimale contributivo) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.inps_ceiling') }}
                    </label>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $currencySymbol }}</span>
                        <input type="number"
                               name="inps_ceiling"
                               value="{{ $settings->inps_ceiling }}"
                               step="0.01" min="0"
                               placeholder="{{ __('business_settings.placeholder.inps_ceiling') }}"
                               class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">{{ __('business_settings.inps_ceiling_hint') }}</p>
                    @error('inps_ceiling')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Annual Revenue Cap --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.annual_revenue_cap') }}
                    </label>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $currencySymbol }}</span>
                        <input type="number"
                               name="annual_revenue_cap"
                               value="{{ $settings->annual_revenue_cap }}"
                               step="0.01" min="0"
                               placeholder="{{ __('business_settings.placeholder.annual_revenue_cap') }}"
                               class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                    @error('annual_revenue_cap')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Business Start Date --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('business_settings.business_start_date') }}
                    </label>
                    <input type="date"
                           name="business_start_date"
                           value="{{ $settings->business_start_date?->format('Y-m-d') }}"
                           class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                    @error('business_start_date')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    {{-- Invoice Note --}}
    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4">
            {{ __('business_settings.invoice_note_section') }}
        </h3>
        <div>
            <label for="invoice_note" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('business_settings.invoice_note') }}
            </label>
            <textarea
                name="invoice_note"
                id="invoice_note"
                rows="3"
                placeholder="{{ __('business_settings.placeholder.invoice_note') }}"
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition resize-none"
            >{{ $settings->invoice_note }}</textarea>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">{{ __('business_settings.invoice_note_hint') }}</p>
            @error('invoice_note')
                <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Pension Section --}}
    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4">
            {{ __('business_settings.pension_section') }}
        </h3>

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form-input
                    name="pension_fund"
                    :label="__('business_settings.pension_fund')"
                    :placeholder="__('business_settings.placeholder.pension_fund')"
                    :value="$settings->pension_fund"
                />
                <x-form-input
                    name="pension_registration_number"
                    :label="__('business_settings.pension_registration_number')"
                    :placeholder="__('business_settings.placeholder.pension_registration_number')"
                    :value="$settings->pension_registration_number"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('business_settings.pension_registration_date') }}
                </label>
                <input type="date"
                       name="pension_registration_date"
                       value="{{ $settings->pension_registration_date?->format('Y-m-d') }}"
                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                @error('pension_registration_date')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>


</div>
