{{-- Monthly form: hours grid + notes + summary + save --}}
<div x-data="{
    hours: {{ json_encode(array_map('floatval', $existingHours)) }},
    hourlyRate: {{ (float) $hourlyRate }},
    get totalHours() { return Object.values(this.hours).reduce((s, h) => s + (parseFloat(h) || 0), 0); },
    get totalEarnings() { return (this.totalHours * this.hourlyRate).toFixed(2); },
}">

    {{-- Save form (does NOT contain the delete form) --}}
    <form id="timesheet-save-form" method="POST" action="{{ route('timesheets.store', $project) }}">
        @csrf
        <input type="hidden" name="year"  value="{{ $tsYear }}">
        <input type="hidden" name="month" value="{{ $tsMonth }}">

        {{-- Monthly grid --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-900/50">
                        @foreach([__('timesheets.days.mon'), __('timesheets.days.tue'), __('timesheets.days.wed'), __('timesheets.days.thu'), __('timesheets.days.fri'), __('timesheets.days.sat'), __('timesheets.days.sun')] as $dayName)
                            <th class="px-2 py-2 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide border-b border-gray-200 dark:border-gray-700 w-[14.28%]">
                                {{ $dayName }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach($weeks as $week)
                        <tr class="divide-x divide-gray-100 dark:divide-gray-700">
                            @foreach($week as $cell)
                                <td class="p-1.5 align-top {{ $cell['is_weekend'] ? 'bg-gray-50/80 dark:bg-gray-900/30' : 'bg-white dark:bg-gray-800' }}">
                                    @if($cell['day'])
                                        <div class="text-xs font-medium {{ $cell['is_weekend'] ? 'text-gray-400 dark:text-gray-500' : 'text-gray-700 dark:text-gray-300' }} mb-1 text-center">
                                            {{ $cell['day'] }}
                                        </div>
                                        <input type="number"
                                               name="daily_hours[{{ $cell['day'] }}]"
                                               x-model.number="hours[{{ $cell['day'] }}]"
                                               @input="hours[{{ $cell['day'] }}] = parseFloat($event.target.value) || 0"
                                               value="{{ $existingHours[$cell['day']] ?? '' }}"
                                               min="0" max="24" step="0.5"
                                               placeholder="0"
                                               class="w-full text-center text-sm px-1 py-1 border rounded
                                                      {{ $cell['is_weekend']
                                                          ? 'border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400'
                                                          : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100' }}
                                                      focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500">
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Notes --}}
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('timesheets.notes') }}
            </label>
            <textarea name="notes" rows="2"
                      placeholder="{{ __('timesheets.notes_placeholder') }}"
                      class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">{{ $currentTs?->notes }}</textarea>
        </div>
    </form>

    {{-- Summary + buttons (outside the save form, separate delete form) --}}
    <div class="mt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700">
        <div class="flex gap-6 text-sm">
            <div>
                <span class="text-gray-500 dark:text-gray-400">{{ __('timesheets.total_hours') }}</span>
                <span class="ml-1 font-semibold text-gray-900 dark:text-white" x-text="totalHours.toFixed(1) + 'h'"></span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">{{ __('timesheets.rate') }}</span>
                <span class="ml-1 font-semibold text-gray-900 dark:text-white">
                    @if($hourlyRate > 0)
                        €{{ number_format((float) $hourlyRate, 2) }}/h
                    @else
                        <span class="text-amber-500">—</span>
                    @endif
                </span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">{{ __('timesheets.total_earnings') }}</span>
                <span class="ml-1 font-semibold text-emerald-600 dark:text-emerald-400" x-text="'€' + totalEarnings"></span>
            </div>
        </div>

        <div class="flex items-center gap-2">
            {{-- Separate delete form, not nested inside save form --}}
            @if($currentTs)
                <form method="POST" action="{{ route('timesheets.destroy', [$project, $currentTs]) }}"
                      data-confirm="{{ __('timesheets.delete_confirm') }}">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="px-3 py-1.5 text-sm border border-red-300 dark:border-red-700 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                        {{ __('ui.delete') }}
                    </button>
                </form>
            @endif

            {{-- PDF report download --}}
            @if($currentTs)
                <a href="{{ route('timesheets.report', [$project, $currentTs]) }}"
                   class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    {{ __('timesheets.report_download') }}
                </a>
            @endif

            {{-- Save button linked to the save form via form= attribute --}}
            <button type="submit" form="timesheet-save-form"
                    class="px-4 py-1.5 text-sm text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition font-medium">
                {{ __('ui.save') }}
            </button>
        </div>
    </div>

</div>
