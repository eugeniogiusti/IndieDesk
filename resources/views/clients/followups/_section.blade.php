{{-- Follow-up section — visible for leads and prospects --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-amber-200 dark:border-amber-700/50">

    {{-- Header --}}
    <div class="px-5 py-4 border-b border-amber-200 dark:border-amber-700/50 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">
                {{ __('clients.followup.section_title') }}
            </h3>
            @if($client->followups->count() > 0)
                <span class="text-xs font-medium bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-400 px-2 py-0.5 rounded-full">
                    {{ $client->followups->count() }}
                </span>
            @endif
        </div>
        <button
            data-action="open-followup-modal"
            class="flex items-center gap-1.5 text-sm px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('clients.followup.add') }}
        </button>
    </div>

    <div class="p-5 space-y-4">

        {{-- Quick Actions --}}
        @include('clients.followups._quick-actions')

        {{-- Followup List --}}
        @include('clients.followups._list')

    </div>
</div>
