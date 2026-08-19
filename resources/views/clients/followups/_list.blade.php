{{-- Followup log list --}}
@if($client->followups->isEmpty())
    <p class="text-sm text-gray-500 dark:text-gray-400 italic">
        {{ __('clients.followup.empty') }}
    </p>
@else
    <div class="space-y-2">
        @foreach($client->followups as $followup)
            <div class="flex items-start gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg group">

                {{-- Type icon --}}
                <div class="flex-shrink-0 mt-0.5">
                    <x-followup-type-icon :type="$followup->type" />
                </div>

                {{-- Content --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                            {{ __('clients.followup.type_' . $followup->type) }}
                        </span>
                        <span class="text-xs text-gray-400 dark:text-gray-500">
                            {{ $followup->contacted_at->format('d/m/Y') }}
                        </span>
                        <span class="text-xs font-medium px-1.5 py-0.5 rounded-full {{ $followup->completed ? 'bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400' : 'bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400' }}">
                            {{ $followup->completed ? __('clients.followup.status_done') : __('clients.followup.status_pending') }}
                        </span>
                    </div>
                    @if($followup->note)
                        <p class="text-sm text-gray-700 dark:text-gray-300 mt-0.5 whitespace-pre-wrap">{{ $followup->note }}</p>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-1">

                    {{-- Toggle completed --}}
                    <form method="POST" action="{{ route('clients.followups.toggle-complete', [$client, $followup]) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                title="{{ $followup->completed ? __('clients.followup.mark_not_completed') : __('clients.followup.mark_completed') }}"
                                class="{{ $followup->completed ? 'text-green-500 hover:text-gray-400' : 'text-amber-500 hover:text-green-500' }} transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>

                    <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition">

                    {{-- Google Calendar --}}
                    @if($followup->googleCalendarUrl())
                        <a href="{{ $followup->googleCalendarUrl() }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="{{ __('clients.followup.add_to_calendar') }}"
                           class="text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </a>
                    @endif

                    {{-- Edit --}}
                    <button type="button"
                            data-action="edit-followup"
                            data-payload="{{ json_encode(['id' => $followup->id, 'type' => $followup->type, 'note' => $followup->note, 'contacted_at' => $followup->contacted_at->format('Y-m-d'), 'completed' => $followup->completed]) }}"
                            class="text-gray-400 hover:text-amber-500 dark:hover:text-amber-400 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>

                    {{-- Delete --}}
                    <form method="POST"
                          action="{{ route('clients.followups.destroy', [$client, $followup]) }}"
                          data-confirm="{{ __('clients.followup.confirm_delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>

                    </div>

                </div>

            </div>
        @endforeach
    </div>
@endif
