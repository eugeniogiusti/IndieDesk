{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="flex items-start justify-between gap-2">
        <div class="font-medium text-gray-900 dark:text-white">{{ $meeting->title }}</div>
        <x-meetings.status-badge :status="$meeting->status" />
    </div>

    @if($meeting->description)
        <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($meeting->description, 60) }}</div>
    @endif

    <div class="text-sm">
        <a href="{{ route('projects.show', [$meeting->project, 'tab' => 'meetings']) }}"
           class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
            {{ $meeting->project->name }}
        </a>
        @if($meeting->project->client)
            <span class="text-xs text-gray-500 dark:text-gray-400">— {{ $meeting->project->client->name }}</span>
        @endif
    </div>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-projects.type-badge :type="$meeting->project->type" />
        <span class="text-sm text-gray-900 dark:text-white">
            {{ $meeting->scheduled_at->format('d/m/Y H:i') }}
        </span>
        @if($meeting->duration_minutes)
            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $meeting->duration_minutes }} min</span>
        @endif
    </div>

    @if($meeting->location || $meeting->meeting_url)
        <div class="flex items-center gap-2 text-sm">
            @if($meeting->location)
                <span class="text-gray-900 dark:text-white">{{ $meeting->location }}</span>
            @endif
            @if($meeting->meeting_url)
                <a href="{{ $meeting->meeting_url }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400">
                    {{ __('meetings.join_link') }}
                </a>
            @endif
        </div>
    @endif

    <div class="pt-1">
        <a href="{{ route('projects.show', [$meeting->project, '#meetings']) }}"
           class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition">
            {{ __('meetings.view_project') }}
        </a>
    </div>
</div>
