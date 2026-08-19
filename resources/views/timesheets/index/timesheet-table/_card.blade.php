{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="flex items-start justify-between gap-2">
        <a href="{{ route('projects.show', ['project' => $timesheet->project, 'tab' => 'timesheets', 'ts_month' => $timesheet->month, 'ts_year' => $timesheet->year]) }}"
           class="font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-300 hover:underline">
            {{ $timesheet->project->name }}
        </a>
        <span class="text-sm font-semibold text-gray-900 dark:text-white shrink-0">
            {{ number_format($timesheet->totalHours(), 1) }}h
        </span>
    </div>

    @if($timesheet->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $timesheet->project->client->name }}</div>
    @endif

    <div class="flex flex-wrap items-center gap-1.5">
        <x-projects.type-badge :type="$timesheet->project->type" />
        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $timesheet->periodLabel() }}</span>
    </div>

    <div class="pt-1">
        @if($timesheet->hourly_rate > 0)
            <span class="text-sm font-semibold text-emerald-600 dark:text-emerald-400">
                €{{ number_format($timesheet->totalEarnings(), 2, ',', '.') }}
            </span>
        @else
            <span class="text-sm text-amber-500" title="{{ __('timesheets.no_rate_warning') }}">{{ __('timesheets.no_rate_warning') }}</span>
        @endif
    </div>
</div>
