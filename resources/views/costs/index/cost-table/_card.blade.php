{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="flex items-start justify-between gap-2">
        <a href="{{ route('projects.show', [$cost->project, 'tab' => 'costs']) }}"
           class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
            {{ $cost->project->name }}
        </a>
        <div class="text-lg font-bold text-gray-900 dark:text-white shrink-0">
            {{ $cost->getFormattedAmount() }}
        </div>
    </div>

    @if($cost->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $cost->project->client->name }}</div>
    @endif

    @if($cost->notes)
        <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($cost->notes, 50) }}</div>
    @endif

    <div class="flex flex-wrap items-center gap-1.5">
        <x-projects.type-badge :type="$cost->project->type" />
        <x-costs.type-badge :type="$cost->type" />
        @if($cost->isRecent())
            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                {{ __('costs.recent') }}
            </span>
        @endif
    </div>

    <div class="flex items-center justify-between pt-1">
        <div class="text-sm text-gray-900 dark:text-white">{{ $cost->paid_at->format('d/m/Y') }}</div>
        <div class="flex items-center gap-2">
            <x-costs.receipt-actions-readonly :cost="$cost" />
        </div>
    </div>

    <div class="pt-1">
        <a href="{{ route('projects.show', [$cost->project, '#costs']) }}"
           class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition">
            {{ __('costs.view_project') }}
        </a>
    </div>
</div>
