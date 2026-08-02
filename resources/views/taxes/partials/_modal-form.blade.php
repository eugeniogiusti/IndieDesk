{{-- Tax Modal (Create/Edit) --}}
<div x-data="taxModal()"
     @open-tax-modal.window="openCreate()"
     @edit-tax.window="openEdit($event.detail)"
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

        <div class="mx-auto max-w-xl">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>

                {{-- Header --}}
                <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">
                            <span x-show="!isEdit">{{ __('taxes.create_tax') }}</span>
                            <span x-show="isEdit">{{ __('taxes.edit_tax') }}</span>
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
                      enctype="multipart/form-data"
                      :action="isEdit
                          ? '{{ route('taxes.update', '__TAX_ID__') }}'.replace('__TAX_ID__', taxId)
                          : '{{ route('taxes.store') }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

                    <div class="px-4 py-3 max-h-[60vh] overflow-y-auto">
                        @include('taxes.partials._form-fields')
                    </div>

                    {{-- Footer --}}
                    <div class="px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                        <button type="button" @click="closeModal()"
                                class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!formData.type || !formData.description || !formData.reference_year || (formData.type === 'F24' && (!formData.amount || !formData.due_date))"
                                :class="(!formData.type || !formData.description || !formData.reference_year || (formData.type === 'F24' && (!formData.amount || !formData.due_date))) ? 'bg-gray-300 dark:bg-gray-600 cursor-not-allowed' : 'bg-amber-600 hover:bg-amber-700'"
                                class="px-3 py-1.5 text-sm text-white rounded-lg transition">
                            <span x-show="!isEdit">{{ __('ui.create') }}</span>
                            <span x-show="isEdit">{{ __('ui.save') }}</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
