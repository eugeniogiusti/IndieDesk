{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('meetings.title') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('meetings.scheduled_at') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('meetings.duration') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('meetings.location') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('meetings.status') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($meetings as $meeting)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    
                    {{-- Title --}}
                    <td class="px-4 py-4">
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $meeting->title }}
                        </div>
                        @if($meeting->description)
                            <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                {{ Str::limit($meeting->description, 60) }}
                            </div>
                        @endif
                    </td>

                    {{-- Scheduled At --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ $meeting->scheduled_at->format('d/m/Y') }}
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $meeting->scheduled_at->format('H:i') }}
                        </div>
                    </td>

                    {{-- Duration --}}
                    <td class="px-4 py-4 whitespace-nowrap text-sm">
                        @if($meeting->duration_minutes)
                            <span class="text-gray-900 dark:text-white">{{ $meeting->duration_minutes }} min</span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                N/A
                            </span>
                        @endif
                    </td>

                    {{-- Location --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        @if($meeting->location || $meeting->meeting_url)
                            @if($meeting->location)
                                <div class="text-sm text-gray-900 dark:text-white">
                                    {{ $meeting->location }}
                                </div>
                            @endif
                            @if($meeting->meeting_url)
                                <a href="{{ $meeting->meeting_url }}" target="_blank"
                                   class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                    {{ __('meetings.join_link') }}
                                </a>
                            @endif
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                N/A
                            </span>
                        @endif
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <x-meetings.status-badge :status="$meeting->status" />
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-4 text-right">
                        <div class="flex flex-col items-end gap-2">
                            {{-- Google Calendar --}}
                            @if($meeting->googleCalendarUrl())
                                <a href="{{ $meeting->googleCalendarUrl() }}"
                                   target="_blank"
                                   title="{{ __('meetings.add_to_calendar') }}"
                                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </a>
                            @endif

                            {{-- Edit --}}
                            <button type="button"
                                    data-action="edit-meeting"
                                    data-payload="{{ json_encode($meeting->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                                    title="{{ __('ui.edit') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>

                            {{-- Delete --}}
                            <form method="POST" action="{{ route('meetings.destroy', [$project, $meeting]) }}"
                                  data-confirm="{{ __('meetings.confirm_delete') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400"
                                        title="{{ __('ui.delete') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>