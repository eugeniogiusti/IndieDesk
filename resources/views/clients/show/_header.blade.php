{{-- resources/views/clients/show/_header.blade.php --}}

<div class="sticky top-0 z-10 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 -mx-6 px-6 py-4 mb-6">
    <div class="flex items-start justify-between gap-6">

        {{-- LEFT: Back + Title + Meta --}}
        <div class="flex items-start gap-4 min-w-0">

            {{-- Back --}}
            <a href="{{ route('clients.index') }}"
               class="mt-1 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition shrink-0"
               aria-label="{{ __('clients.back_to_list') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            {{-- Title + meta --}}
            <div class="min-w-0">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white truncate">
                    {{ $client->name }}
                </h1>

                {{-- META ROW --}}
                <div class="mt-2 flex flex-wrap items-center gap-x-6 gap-y-2">

                    {{-- Status --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('clients.status') }}:
                        </span>
                        <x-client-status-badge :status="$client->status" />
                    </div>

                    {{-- Projects count --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('projects.title') }}:
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $client->totalProjectsCount() }}
                        </span>
                    </div>

                    {{-- Stripe connection --}}
                    @if($client->stripe_customer_id)
                        <a href="{{ $client->getStripeDashboardUrl() }}" target="_blank" rel="noopener"
                           class="flex items-center gap-1.5 text-sm text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 transition">
                            🔗 {{ __('clients.connected_to_stripe') }}
                        </a>
                    @endif

                    {{-- Created at --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('clients.table.created_at') }}:
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $client->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                </div>
            </div>
        </div>

        {{-- RIGHT: Actions --}}
        <div class="flex items-center gap-2 shrink-0">
            <button
                type="button"
                data-action="edit-client"
                data-payload="{{ json_encode($client->toFormPayload(['_back' => 'show']), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span class="text-sm font-semibold">{{ __('clients.edit') }}</span>
            </button>
        </div>

    </div>
</div>
