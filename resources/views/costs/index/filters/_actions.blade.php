{{-- Filter Actions --}}
<div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
    <a href="{{ route('costs.index') }}" class="px-5 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center justify-center">
        {{ __('ui.reset') }}
    </a>
    <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition inline-flex items-center justify-center">
        {{ __('ui.filter') }}
    </button>
</div>
