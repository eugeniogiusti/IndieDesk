{{-- Project Modal (Create/Edit) --}}
<div x-data="projectModal()"
     @open-project-modal.window="openCreate()"
     @edit-project.window="openEdit($event.detail)"
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
                            <span x-show="!isEdit">{{ __('projects.create_project') }}</span>
                            <span x-show="isEdit">{{ __('projects.edit_project') }}</span>
                            <span x-show="isEdit" x-text="' - ' + formData.name" class="font-normal text-gray-500 dark:text-gray-400"></span>
                        </h3>
                        <button @click="closeModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Tabs --}}
                <div class="px-4 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex -mb-px">
                        <button
                            type="button"
                            @click="activeTab = 'info'"
                            :class="activeTab === 'info' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('projects.tab_info') }}
                        </button>

                        <button
                            type="button"
                            @click="activeTab = 'links'"
                            :class="activeTab === 'links' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('projects.tab_links') }}
                        </button>

                        <button
                            type="button"
                            @click="activeTab = 'notes'"
                            :class="activeTab === 'notes' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('projects.tab_notes') }}
                        </button>
                    </nav>
                </div>

                {{-- Form --}}
                <form method="POST" 
                      :action="isEdit 
                          ? '{{ route('projects.update', '__PROJECT_ID__') }}'.replace('__PROJECT_ID__', projectId) 
                          : '{{ route('projects.store') }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">
                    <input type="hidden" name="back" x-bind:value="backTo">

                    {{-- Form Fields --}}
                    <div class="px-4 py-3 space-y-4 max-h-[60vh] overflow-y-auto">

{{-- TAB 1: INFO --}}
<div x-show="activeTab === 'info'" class="space-y-4">
    
    {{-- Name + Type in row --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.name') }} <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" x-model="formData.name" required
                   placeholder="{{ __('projects.placeholder.name') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.type') }} <span class="text-red-500">*</span>
            </label>
            <select name="type" x-model="formData.type" required
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
                <option value="client_work">{{ __('projects.type_client_work') }}</option>
                <option value="product">{{ __('projects.type_product') }}</option>
                <option value="content">{{ __('projects.type_content') }}</option>
                <option value="asset">{{ __('projects.type_asset') }}</option>
                <option value="saas">{{ __('projects.type_saas') }}</option>
            </select>
        </div>
    </div>

{{-- Client Search con checkbox Interno (progetti non-SaaS) --}}
<div x-show="formData.type !== 'saas'"
     x-data="clientSearch()"
     @edit-project.window="syncFromProject($event.detail.client_id, $event.detail.client_name)"
     @open-project-modal.window="reset()">
    {{-- Checkbox Progetto Interno --}}
    <div class="flex items-center mb-2">
        <input type="checkbox" id="is_internal" x-model="isInternal"
            @change="if (isInternal) { clearClient(); }"
            class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:bg-gray-700 dark:border-gray-600">
        <label for="is_internal" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            {{ __('projects.is_internal') }}
        </label>
    </div>

    {{-- Client Search (shown only if NOT internal) --}}
    <div x-show="!isInternal" class="relative">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('projects.client') }}
        </label>
        <input type="text" x-model="searchQuery"
            @input.debounce.300ms="searchClients()"
            @focus="if (searchResults.length > 0) { showDropdown = true; }"
            @click.away="showDropdown = false"
            placeholder="{{ __('projects.placeholder.client') }}"
            class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">

        <div x-show="isSearching" class="absolute right-3 top-9">
            <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        <div x-show="showDropdown && searchResults.length > 0" x-transition
            class="absolute z-10 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-48 overflow-auto">
            <template x-for="client in searchResults" :key="client.id">
                <div @click="selectClient(client)"
                    class="px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer transition">
                    <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="client.name"></div>
                    <div class="text-xs text-gray-500 dark:text-gray-400" x-text="client.email"></div>
                </div>
            </template>
        </div>

        <input type="hidden" name="client_id" :value="selectedClient ? selectedClient.id : ''">

        <div x-show="selectedClient && !showDropdown" class="mt-1.5 flex items-center justify-between p-2 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg">
            <div>
                <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="selectedClient?.name"></div>
                <div class="text-xs text-gray-500 dark:text-gray-400" x-text="selectedClient?.email"></div>
            </div>
            <button type="button" @click="clearClient()" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

{{-- Client Multi-Search (progetti SaaS: piu clienti collegati) --}}
<div x-show="formData.type === 'saas'"
     x-data="clientMultiSearch()"
     @edit-project.window="syncFromProject($event.detail.clients)"
     @open-project-modal.window="reset()">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
        {{ __('projects.clients') }}
    </label>

    <div class="relative">
        <input type="text" x-model="searchQuery"
            @input.debounce.300ms="searchClients()"
            @focus="if (searchResults.length > 0) { showDropdown = true; }"
            @click.away="showDropdown = false"
            placeholder="{{ __('projects.placeholder.client') }}"
            class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">

        <div x-show="isSearching" class="absolute right-3 top-2.5">
            <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        <div x-show="showDropdown && searchResults.length > 0" x-transition
            class="absolute z-10 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-48 overflow-auto">
            <template x-for="client in searchResults" :key="client.id">
                <div @click="addClient(client)"
                    class="px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer transition">
                    <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="client.name"></div>
                    <div class="text-xs text-gray-500 dark:text-gray-400" x-text="client.email"></div>
                </div>
            </template>
        </div>
    </div>

    {{-- Selected clients as removable chips --}}
    <template x-for="client in selectedClients" :key="client.id">
        <input type="hidden" name="client_ids[]" :value="client.id">
    </template>

    <div x-show="selectedClients.length > 0" class="mt-2 flex flex-wrap gap-1.5">
        <template x-for="client in selectedClients" :key="client.id">
            <span class="inline-flex items-center gap-1 pl-2.5 pr-1.5 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-800 dark:text-emerald-200 text-xs font-medium rounded-full">
                <span x-text="client.name"></span>
                <button type="button" @click="removeClient(client.id)" class="text-emerald-600 hover:text-red-600 dark:text-emerald-400 dark:hover:text-red-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
        </template>
    </div>
</div>

    {{-- Description --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('projects.description') }}
        </label>
        <textarea name="description" x-model="formData.description" rows="2"
                  placeholder="{{ __('projects.placeholder.description') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500"></textarea>
    </div>

    {{-- Status and Priority --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.status') }} <span class="text-red-500">*</span>
            </label>
            <select name="status" x-model="formData.status" required
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
                <option value="draft">{{ __('projects.status_draft') }}</option>
                <option value="in_progress">{{ __('projects.status_in_progress') }}</option>
                <option value="completed">{{ __('projects.status_completed') }}</option>
                <option value="archived">{{ __('projects.status_archived') }}</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.priority') }}
            </label>
            <select name="priority" x-model="formData.priority"
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
                <option value="">{{ __('projects.select_priority') }}</option>
                <option value="low">{{ __('projects.priority_low') }}</option>
                <option value="medium">{{ __('projects.priority_medium') }}</option>
                <option value="high">{{ __('projects.priority_high') }}</option>
            </select>
        </div>
    </div>

    {{-- Hourly Rate: sempre visibile in edit, solo per client_work in create --}}
    <div x-show="isEdit || formData.type === 'client_work'">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('projects.hourly_rate') }}
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400 text-sm pointer-events-none">€</span>
            <input type="number" name="hourly_rate" x-model="formData.hourly_rate"
                   step="0.01" min="0" max="99999.99" placeholder="0.00"
                   class="w-full pl-7 pr-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- Dates --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.start_date') }}
            </label>
            <input type="date" name="start_date" x-model="formData.start_date"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.due_date') }}
            </label>
            <input type="date" name="due_date" x-model="formData.due_date"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

</div>

{{-- TAB 2: LINKS --}}
<div x-show="activeTab === 'links'" class="space-y-3">
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('projects.repo_url') }}
        </label>
        <input type="url" name="repo_url" x-model="formData.repo_url"
               placeholder="{{ __('projects.placeholder.repo_url') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
    </div>
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.staging_url') }}
            </label>
            <input type="url" name="staging_url" x-model="formData.staging_url"
                   placeholder="{{ __('projects.placeholder.staging_url') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.production_url') }}
            </label>
            <input type="url" name="production_url" x-model="formData.production_url"
                   placeholder="{{ __('projects.placeholder.production_url') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.figma_url') }}
            </label>
            <input type="url" name="figma_url" x-model="formData.figma_url"
                   placeholder="{{ __('projects.placeholder.figma_url') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('projects.docs_url') }}
            </label>
            <input type="url" name="docs_url" x-model="formData.docs_url"
                   placeholder="{{ __('projects.placeholder.docs_url') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>
</div>

{{-- TAB 3: NOTES --}}
<div x-show="activeTab === 'notes'">
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('projects.notes') }}
        </label>
        <textarea name="notes" x-model="formData.notes" rows="5"
                  placeholder="{{ __('projects.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500"></textarea>
    </div>
</div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                        <button type="button" @click="closeModal()"
                                class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('projects.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!formData.name || !formData.type || !formData.status"
                                :class="(!formData.name || !formData.type || !formData.status) ? 'bg-gray-300 dark:bg-gray-600 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700'"
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