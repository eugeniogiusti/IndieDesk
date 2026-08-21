{{-- Filter Actions --}}
<div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
    <a href="{{ route('clients.index') }}" class="w-full sm:w-auto">
        <x-button type="button" variant="secondary" size="lg" class="w-full sm:w-auto">
            {{ __('clients.reset') }}
        </x-button>
    </a>
    <x-button type="submit" variant="primary" size="lg" class="w-full sm:w-auto">
        {{ __('clients.filter') }}
    </x-button>
</div>
