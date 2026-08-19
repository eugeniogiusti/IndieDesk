{{-- Card (mobile) --}}
<div class="p-4 space-y-2.5">
    <div class="font-medium text-gray-900 dark:text-white">{{ $document->name }}</div>

    @if($document->notes)
        <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($document->notes, 50) }}</div>
    @endif

    <div class="text-sm">
        <a href="{{ route('projects.show', [$document->project, 'tab' => 'documents']) }}"
           class="font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
            {{ $document->project->name }}
        </a>
        @if($document->project->client)
            <span class="text-xs text-gray-500 dark:text-gray-400">— {{ $document->project->client->name }}</span>
        @endif
    </div>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-projects.type-badge :type="$document->project->type" />
        @foreach($document->labels as $label)
            <x-documents.label-badge :label="$label" />
        @endforeach
    </div>

    <div class="flex items-center justify-between pt-1">
        <div>
            <div class="text-sm text-gray-900 dark:text-white">{{ $document->uploaded_at->format('d/m/Y') }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $document->file_size }}</div>
        </div>

        <div class="flex items-center gap-1.5">
            <x-action-button :href="route('projects.show', [$document->project, 'tab' => 'documents'])" variant="secondary" title="{{ __('documents.view_project') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
            </x-action-button>

            <x-action-button :href="$document->getPreviewUrl()" variant="info" target="_blank" title="{{ __('documents.preview') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </x-action-button>

            <x-action-button :href="$document->getDownloadUrl()" variant="primary" title="{{ __('documents.download') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </x-action-button>
        </div>
    </div>
</div>
