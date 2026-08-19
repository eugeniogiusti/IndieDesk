<div id="ateco" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4">
        {{ __('business_settings.ateco_section') }}
    </h3>

    {{-- Existing codes table --}}
    @if($atecoCodes->isNotEmpty())
        <div class="mb-4 overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">{{ __('business_settings.ateco_code') }}</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">{{ __('business_settings.ateco_description') }}</th>
                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">{{ __('business_settings.ateco_primary') }}</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($atecoCodes as $ateco)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-4 py-3 font-mono text-gray-900 dark:text-gray-100">{{ $ateco->code }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $ateco->description ?? '—' }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($ateco->is_primary)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
                                        ✓
                                    </span>
                                @else
                                    <form method="POST" action="{{ route('settings.ateco.set-primary', $ateco) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="text-xs text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition"
                                                title="{{ __('business_settings.ateco_set_primary') }}">
                                            ○
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <form method="POST" action="{{ route('settings.ateco.destroy', $ateco) }}" class="inline"
                                      data-confirm="{{ __('business_settings.ateco_delete_confirm') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-sm text-gray-400 dark:text-gray-500 mb-4">{{ __('business_settings.ateco_no_codes') }}</p>
    @endif

    {{-- Add new code form --}}
    <form method="POST" action="{{ route('settings.ateco.store') }}" class="flex flex-col sm:flex-row sm:items-end gap-3">
        @csrf
        <div class="sm:w-32">
            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('business_settings.ateco_code') }}
            </label>
            <input type="text"
                   name="code"
                   placeholder="{{ __('business_settings.placeholder.ateco_code') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
        </div>
        <div class="flex-1">
            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('business_settings.ateco_description') }}
            </label>
            <input type="text"
                   name="description"
                   placeholder="{{ __('business_settings.placeholder.ateco_description') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
        </div>
        <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition">
            {{ __('business_settings.ateco_add') }}
        </button>
    </form>
    @error('code')
        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>
