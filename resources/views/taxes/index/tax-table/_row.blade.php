{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    {{-- Description + Type Badge --}}
    <td class="px-6 py-4">
        <div class="flex items-center gap-2 mb-1">
            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $tax->description }}</span>
            @if($tax->type === 'F24')
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                    F24
                </span>
            @else
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                    {{ __('taxes.type_dichiarazione_redditi') }}
                </span>
            @endif
        </div>
        @if($tax->notes)
            <p class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs">{{ $tax->notes }}</p>
        @endif
    </td>

    {{-- Amount --}}
    <td class="px-6 py-4 whitespace-nowrap">
        @if($tax->amount !== null)
            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                {{ $currencySymbol }} {{ number_format($tax->amount, 2, ',', '.') }}
            </span>
        @else
            <x-not-set-badge />
        @endif
    </td>

    {{-- Due Date --}}
    <td class="px-6 py-4 whitespace-nowrap">
        @if($tax->due_date)
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-700 dark:text-gray-300">
                    {{ $tax->due_date->format('d/m/Y') }}
                </span>
                @if(!$tax->paid_at && $tax->due_date->isPast())
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400">
                        {{ __('taxes.unpaid') }}
                    </span>
                @endif
                @if(!$tax->paid_at && $tax->googleCalendarUrl())
                    <a href="{{ $tax->googleCalendarUrl() }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       title="{{ __('taxes.add_to_calendar') }}"
                       class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 flex-shrink-0">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                        </svg>
                    </a>
                @endif
            </div>
        @else
            <x-not-set-badge />
        @endif
    </td>

    {{-- Paid At --}}
    <td class="px-6 py-4 whitespace-nowrap">
        @if($tax->paid_at)
            <span class="inline-flex items-center gap-1 text-sm text-emerald-600 dark:text-emerald-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ $tax->paid_at->format('d/m/Y') }}
            </span>
        @else
            <x-not-set-badge />
        @endif
    </td>

    {{-- Reference Year --}}
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300">
            {{ $tax->reference_year }}
        </span>
    </td>

    {{-- Attachment --}}
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center justify-center gap-2">
            @if($tax->hasAttachment())
                <a href="{{ $tax->getAttachmentPreviewUrl() }}"
                   target="_blank"
                   class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                   title="{{ __('ui.preview') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>
                <a href="{{ $tax->getAttachmentDownloadUrl() }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400"
                   title="{{ __('ui.download') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
                <form method="POST"
                      action="{{ $tax->getAttachmentDeleteUrl() }}"
                      class="inline"
                      data-confirm="{{ __('taxes.confirm_delete') }}">
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
            @else
                <x-not-set-badge />
            @endif

            <button type="button"
                    data-action="upload-tax-attachment"
                    data-payload="{{ $tax->id }}"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-400"
                    title="{{ __('ui.upload') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L9 8m4-4v12" />
                </svg>
            </button>
        </div>
    </td>

    {{-- Actions --}}
    <td class="px-6 py-4 text-right">
        <div class="flex justify-end gap-2">
            <button type="button"
                    data-action="edit-tax"
                    data-payload="{{ json_encode($tax->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                    title="{{ __('ui.edit') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>

            <form method="POST" action="{{ route('taxes.destroy', $tax) }}"
                  data-confirm="{{ __('taxes.confirm_delete') }}">
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
