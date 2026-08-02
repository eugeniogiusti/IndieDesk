<div class="space-y-4">

    {{-- Type --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('taxes.type') }} <span class="text-red-500">*</span>
        </label>
        <select name="type"
                x-model="formData.type"
                required
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
            <option value="">{{ __('ui.select') }}</option>
            <option value="F24">{{ __('taxes.type_f24') }}</option>
            <option value="dichiarazione_redditi">{{ __('taxes.type_dichiarazione_redditi') }}</option>
        </select>
        @error('type')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('taxes.description') }} <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="description"
               x-model="formData.description"
               required
               placeholder="{{ __('taxes.placeholder.description') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
        @error('description')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Amount + Reference Year --}}
    <div class="grid grid-cols-2 gap-3">
        <div x-show="formData.type !== 'dichiarazione_redditi'">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('taxes.amount') }} ({{ $currencySymbol }}) <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="amount"
                   x-model="formData.amount"
                   :required="formData.type !== 'dichiarazione_redditi'"
                   step="0.01"
                   min="0.01"
                   placeholder="{{ __('taxes.placeholder.amount') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
            @error('amount')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('taxes.reference_year') }} <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="reference_year"
                   x-model="formData.reference_year"
                   required
                   min="2000"
                   max="2100"
                   placeholder="{{ __('taxes.placeholder.reference_year') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
            @error('reference_year')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Due Date + Paid At --}}
    <div class="grid grid-cols-2 gap-3" x-show="formData.type !== 'dichiarazione_redditi'">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('taxes.due_date') }} <span class="text-red-500">*</span>
            </label>
            <input type="date"
                   name="due_date"
                   x-model="formData.due_date"
                   :required="formData.type !== 'dichiarazione_redditi'"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
            @error('due_date')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('taxes.paid_at') }}
            </label>
            <input type="date"
                   name="paid_at"
                   x-model="formData.paid_at"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
            @error('paid_at')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Attachment --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('taxes.attachment') }}
        </label>
        <input type="file"
               name="attachment"
               accept=".pdf,.jpg,.jpeg,.png"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition">
        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">PDF, JPG, JPEG, PNG - Max 10MB</p>
        @error('attachment')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('taxes.notes') }}
        </label>
        <textarea name="notes"
                  x-model="formData.notes"
                  rows="2"
                  placeholder="{{ __('taxes.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 transition"></textarea>
        @error('notes')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>
