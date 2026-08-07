<div class="space-y-6">

    {{-- Client --}}
    @include('projects.show._client-info')

    {{-- Divider --}}
    <div class="border-t border-gray-200 dark:border-gray-700"></div>

    {{-- Description --}}
    <div class="border-l-4 border-emerald-500 pl-4"
         x-data="inlineField('{{ route('projects.patch-field', $project) }}', 'description', {{ json_encode($project->description) }}, '{{ __('ui.saved') }}', '{{ __('ui.error_saving') }}')">

        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ __('projects.description') }}
            </h3>
            <button x-show="!editing" @click="startEdit"
                    class="text-sm text-gray-400 hover:text-emerald-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828A2 2 0 0111 16H9v-2a2 2 0 01.172-.768z"/>
                </svg>
            </button>
        </div>

        {{-- View mode --}}
        <div x-show="!editing">
            <template x-if="value">
                <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 whitespace-pre-wrap"
                     x-text="value"></div>
            </template>
            <template x-if="!value">
                <p class="text-sm text-gray-500 dark:text-gray-400 italic cursor-pointer hover:text-emerald-500 transition-colors"
                   @click="startEdit">
                    {{ __('projects.no_description') }}
                </p>
            </template>
        </div>

        {{-- Edit mode --}}
        <div x-show="editing" x-cloak>
            <textarea x-ref="textarea"
                      x-model="draft"
                      rows="5"
                      class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 resize-y"></textarea>
            <div class="flex gap-2 mt-2">
                <button @click="save" :disabled="saving"
                        class="px-3 py-1 text-sm bg-emerald-600 hover:bg-emerald-700 text-white rounded-md disabled:opacity-50 transition-colors">
                    <span x-text="saving ? '...' : '{{ __('ui.save') }}'"></span>
                </button>
                <button @click="cancel"
                        class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md transition-colors">
                    {{ __('ui.cancel') }}
                </button>
            </div>
        </div>

    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 dark:border-gray-700"></div>

    {{-- Notes --}}
    <div class="border-l-4 border-blue-500 pl-4"
         x-data="inlineField('{{ route('projects.patch-field', $project) }}', 'notes', {{ json_encode($project->notes) }}, '{{ __('ui.saved') }}', '{{ __('ui.error_saving') }}')">

        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ __('projects.notes') }}
            </h3>
            <button x-show="!editing" @click="startEdit"
                    class="text-sm text-gray-400 hover:text-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828A2 2 0 0111 16H9v-2a2 2 0 01.172-.768z"/>
                </svg>
            </button>
        </div>

        {{-- View mode --}}
        <div x-show="!editing">
            <template x-if="value">
                <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 whitespace-pre-wrap"
                     x-text="value"></div>
            </template>
            <template x-if="!value">
                <p class="text-sm text-gray-500 dark:text-gray-400 italic cursor-pointer hover:text-blue-500 transition-colors"
                   @click="startEdit">
                    {{ __('projects.no_notes') }}
                </p>
            </template>
        </div>

        {{-- Edit mode --}}
        <div x-show="editing" x-cloak>
            <textarea x-ref="textarea"
                      x-model="draft"
                      rows="5"
                      class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"></textarea>
            <div class="flex gap-2 mt-2">
                <button @click="save" :disabled="saving"
                        class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md disabled:opacity-50 transition-colors">
                    <span x-text="saving ? '...' : '{{ __('ui.save') }}'"></span>
                </button>
                <button @click="cancel"
                        class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md transition-colors">
                    {{ __('ui.cancel') }}
                </button>
            </div>
        </div>

    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 dark:border-gray-700"></div>

    {{-- Quick Info + Quick Links --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @include('projects.show._quick-info')
        @include('projects.show._quick-links')
    </div>

</div>
