{{-- Followup Modal (Create / Edit) --}}
<div x-data="clientFollowupModal()"
     @open-followup-modal.window="openCreate()"
     @edit-followup.window="openEdit($event.detail)"
     @keydown.escape.window="closeModal()"
     x-cloak>

    {{-- Backdrop --}}
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40"
         @click="closeModal()"></div>

    {{-- Modal --}}
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20"
         @click.away="closeModal()">

        <div class="mx-auto max-w-md">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>

                {{-- Header --}}
                <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">
                            <span x-show="!isEdit">{{ __('clients.followup.modal_title') }}</span>
                            <span x-show="isEdit">{{ __('clients.followup.modal_title_edit') }}</span>
                        </h3>
                        <button @click="closeModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST"
                      :action="isEdit
                          ? '{{ route('clients.followups.update', [$client, '__ID__']) }}'.replace('__ID__', followupId)
                          : '{{ route('clients.followups.store', $client) }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PATCH' : 'POST'">

                    <div class="px-4 py-4 space-y-4">

                        {{-- Type + Date --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    {{ __('clients.followup.type') }} <span class="text-red-500">*</span>
                                </label>
                                <select name="type" x-model="formData.type" required
                                        class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500">
                                    <option value="call">{{ __('clients.followup.type_call') }}</option>
                                    <option value="email">{{ __('clients.followup.type_email') }}</option>
                                    <option value="whatsapp">{{ __('clients.followup.type_whatsapp') }}</option>
                                    <option value="linkedin">{{ __('clients.followup.type_linkedin') }}</option>
                                    <option value="meeting">{{ __('clients.followup.type_meeting') }}</option>
                                    <option value="note">{{ __('clients.followup.type_note') }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    {{ __('clients.followup.contacted_at') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="contacted_at" x-model="formData.contacted_at" required
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>

                        {{-- Note --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ __('clients.followup.note') }}
                            </label>
                            <textarea name="note" x-model="formData.note" rows="3"
                                      placeholder="{{ __('clients.followup.note_placeholder') }}"
                                      class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500"></textarea>
                        </div>

                        {{-- Completed --}}
                        <div class="flex items-center gap-2">
                            <input type="hidden" name="completed" :value="formData.completed ? '1' : '0'">
                            <input type="checkbox" id="followup-completed" x-model="formData.completed"
                                   class="rounded border-gray-300 dark:border-gray-600 text-amber-500 focus:ring-amber-500">
                            <label for="followup-completed" class="text-sm text-gray-700 dark:text-gray-300">
                                {{ __('clients.followup.completed') }}
                            </label>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                        <button type="button" @click="closeModal()"
                                class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!formData.type || !formData.contacted_at"
                                :class="(!formData.type || !formData.contacted_at) ? 'bg-gray-300 dark:bg-gray-600 cursor-not-allowed' : 'bg-amber-500 hover:bg-amber-600'"
                                class="px-3 py-1.5 text-sm text-white rounded-lg transition">
                            {{ __('ui.save') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
