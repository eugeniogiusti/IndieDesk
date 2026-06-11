{{-- Client Modal (Create/Edit) --}}
<div x-data="clientModal()"
     @open-client-modal.window="openCreate()"
     @edit-client.window="openEdit($event.detail)"
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
                            <span x-show="!isEdit">{{ __('clients.create_client') }}</span>
                            <span x-show="isEdit">{{ __('clients.edit_client') }}</span>
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
                            @click="activeTab = 'basic'"
                            :class="activeTab === 'basic' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('clients.contact_info') }}
                        </button>

                        <button
                            type="button"
                            @click="activeTab = 'billing'"
                            :class="activeTab === 'billing' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('clients.billing_info') }}
                        </button>

                        <button
                            type="button"
                            @click="activeTab = 'web'"
                            :class="activeTab === 'web' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="w-1/3 py-2.5 px-1 text-center border-b-2 font-medium text-sm transition"
                        >
                            {{ __('clients.web_social') }}
                        </button>
                    </nav>
                </div>

                {{-- Form --}}
                <form method="POST"
                      :action="isEdit
                          ? '{{ route('clients.update', '__CLIENT_ID__') }}'.replace('__CLIENT_ID__', clientId)
                          : '{{ route('clients.store') }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">
                    <input type="hidden" name="back" x-bind:value="backTo">

                    {{-- Form Fields --}}
                    <div class="px-4 py-3 space-y-4 max-h-[60vh] overflow-y-auto">

{{-- TAB 1: BASIC --}}
<div x-show="activeTab === 'basic'" class="space-y-4">
    {{-- Name + Email --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.name') }} <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" x-model="formData.name" required placeholder="{{ __('clients.placeholder.name') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.email') }} <span class="text-red-500">*</span>
            </label>
            <input type="email" name="email" x-model="formData.email" required placeholder="{{ __('clients.placeholder.email') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- Status + VAT --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.status') }} <span class="text-red-500">*</span>
            </label>
            <select name="status" x-model="formData.status" required
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
                <option value="lead">{{ __('clients.status_lead') }}</option>
                <option value="prospect">{{ __('clients.status_prospect') }}</option>
                <option value="active">{{ __('clients.status_active') }}</option>
                <option value="archived">{{ __('clients.status_archived') }}</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.vat_number') }}
            </label>
            <input type="text" name="vat_number" x-model="formData.vat_number" placeholder="{{ __('clients.placeholder.vat_number') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- Acquisition Source --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('clients.acquisition_source') }}
        </label>
        <select name="acquisition_source" x-model="formData.acquisition_source"
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
            <option value="">-- Seleziona --</option>

            <optgroup label="{{ __('clients.acquisition_sources.categories.direct_search') }}">
                <option value="search_linkedin">{{ __('clients.acquisition_sources.options.search_linkedin') }}</option>
                <option value="search_google">{{ __('clients.acquisition_sources.options.search_google') }}</option>
                <option value="search_instagram">{{ __('clients.acquisition_sources.options.search_instagram') }}</option>
                <option value="search_x">{{ __('clients.acquisition_sources.options.search_x') }}</option>
                <option value="search_facebook">{{ __('clients.acquisition_sources.options.search_facebook') }}</option>
                <option value="search_thread">{{ __('clients.acquisition_sources.options.search_thread') }}</option>
                <option value="search_bluesky">{{ __('clients.acquisition_sources.options.search_bluesky') }}</option>
            </optgroup>

            <optgroup label="{{ __('clients.acquisition_sources.categories.organic') }}">
                <option value="organic_website">{{ __('clients.acquisition_sources.options.organic_website') }}</option>
                <option value="organic_blog">{{ __('clients.acquisition_sources.options.organic_blog') }}</option>
                <option value="organic_facebook">{{ __('clients.acquisition_sources.options.organic_facebook') }}</option>
                <option value="organic_instagram">{{ __('clients.acquisition_sources.options.organic_instagram') }}</option>
                <option value="organic_reddit">{{ __('clients.acquisition_sources.options.organic_reddit') }}</option>
                <option value="organic_x">{{ __('clients.acquisition_sources.options.organic_x') }}</option>
                <option value="organic_thread">{{ __('clients.acquisition_sources.options.organic_thread') }}</option>
                <option value="organic_bluesky">{{ __('clients.acquisition_sources.options.organic_bluesky') }}</option>
            </optgroup>

            <optgroup label="{{ __('clients.acquisition_sources.categories.ads') }}">
                <option value="ads_google">{{ __('clients.acquisition_sources.options.ads_google') }}</option>
                <option value="ads_facebook">{{ __('clients.acquisition_sources.options.ads_facebook') }}</option>
                <option value="ads_instagram">{{ __('clients.acquisition_sources.options.ads_instagram') }}</option>
                <option value="ads_reddit">{{ __('clients.acquisition_sources.options.ads_reddit') }}</option>
            </optgroup>

            <optgroup label="{{ __('clients.acquisition_sources.categories.sponsorship') }}">
                <option value="sponsorship_influencer">{{ __('clients.acquisition_sources.options.sponsorship_influencer') }}</option>
            </optgroup>

            <optgroup label="{{ __('clients.acquisition_sources.categories.other') }}">
                <option value="other_word_of_mouth">{{ __('clients.acquisition_sources.options.other_word_of_mouth') }}</option>
                <option value="other_cold_contact">{{ __('clients.acquisition_sources.options.other_cold_contact') }}</option>
            </optgroup>
        </select>
    </div>

    {{-- Phone --}}
    <div class="grid grid-cols-4 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.phone_prefix') }}
            </label>
            <select name="phone_prefix" x-model="formData.phone_prefix"
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
                <option value="">{{ __('clients.select_prefix') }}</option>
                <option value="+39">+39</option>
                <option value="+1">+1</option>
                <option value="+44">+44</option>
                <option value="+33">+33</option>
                <option value="+49">+49</option>
                <option value="+34">+34</option>
            </select>
        </div>
        <div class="col-span-3">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.phone') }}
            </label>
            <input type="tel" name="phone" x-model="formData.phone" placeholder="{{ __('clients.placeholder.phone') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- PEC --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('clients.pec') }}
        </label>
        <input type="email" name="pec" x-model="formData.pec" placeholder="{{ __('clients.placeholder.pec') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
    </div>
</div>

{{-- TAB 2: BILLING --}}
<div x-show="activeTab === 'billing'" class="space-y-4">
    {{-- Address --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('clients.billing_address') }}
        </label>
        <input type="text" name="billing_address" x-model="formData.billing_address" placeholder="{{ __('clients.placeholder.billing_address') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
    </div>

    {{-- City + ZIP + Province --}}
    <div class="grid grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.billing_city') }}
            </label>
            <input type="text" name="billing_city" x-model="formData.billing_city" placeholder="{{ __('clients.placeholder.billing_city') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.billing_zip') }}
            </label>
            <input type="text" name="billing_zip" x-model="formData.billing_zip" placeholder="{{ __('clients.placeholder.billing_zip') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.billing_province') }}
            </label>
            <input type="text" name="billing_province" x-model="formData.billing_province" placeholder="{{ __('clients.placeholder.billing_province') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- Country + SDI --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.billing_country') }}
            </label>
            <input type="text" name="billing_country" x-model="formData.billing_country" placeholder="{{ __('clients.placeholder.billing_country') }}" maxlength="2"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">{{ __('clients.hint.billing_country') }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.billing_recipient_code') }}
            </label>
            <input type="text" name="billing_recipient_code" x-model="formData.billing_recipient_code" placeholder="{{ __('clients.placeholder.billing_recipient_code') }}" maxlength="7"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">{{ __('clients.hint.billing_recipient_code') }}</p>
        </div>
    </div>
</div>

{{-- TAB 3: WEB --}}
<div x-show="activeTab === 'web'" class="space-y-4">
    {{-- Website + LinkedIn --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.website') }}
            </label>
            <input type="url" name="website" x-model="formData.website" placeholder="{{ __('clients.placeholder.website') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('clients.linkedin') }}
            </label>
            <input type="url" name="linkedin" x-model="formData.linkedin" placeholder="{{ __('clients.placeholder.linkedin') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
        </div>
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('clients.notes') }}
        </label>
        <textarea name="notes" x-model="formData.notes" rows="4" placeholder="{{ __('clients.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500"></textarea>
    </div>
</div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                        <button type="button" @click="closeModal()"
                                class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('clients.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!formData.name || !formData.email || !formData.status"
                                :class="(!formData.name || !formData.email || !formData.status) ? 'bg-gray-300 dark:bg-gray-600 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700'"
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
