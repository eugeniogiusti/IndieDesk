{{-- Next meetings --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-transform duration-200 hover:scale-[1.02]">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('dashboard.upcoming_meetings') }}</h3>
        </div>
        <a href="{{ route('meetings.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($lists['upcoming_meetings']->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lists['upcoming_meetings'] as $meeting)
                <li>
                    <a href="{{ route('projects.show', [$meeting->project, 'tab' => 'meetings']) }}" class="flex items-center gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <div class="text-center shrink-0 w-12">
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $meeting->scheduled_at->format('d') }}</p>
                            <p class="text-xs text-gray-500 uppercase">{{ $meeting->scheduled_at->format('M') }}</p>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-gray-900 dark:text-white truncate">{{ $meeting->title }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $meeting->project->name }}
                                @if($meeting->project->getClientLabel())
                                    <span class="text-gray-400 dark:text-gray-500">· {{ $meeting->project->getClientLabel() }}</span>
                                @endif
                            </p>
                            <div class="mt-1"><x-meetings.status-badge :status="$meeting->status" /></div>
                        </div>
                        <span class="text-xs text-gray-500 shrink-0">
                            {{ $meeting->scheduled_at->format('H:i') }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic text-center">
            {{ __('dashboard.no_upcoming_meetings') }}
        </p>
    @endif
</div>
