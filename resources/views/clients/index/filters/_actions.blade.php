{{-- Filter Actions --}}
<div class="md:col-span-2 flex gap-2">
    <x-button type="submit" variant="primary" class="flex-1">
        {{ __('clients.filter') }}
    </x-button>
    <a href="{{ route('clients.index') }}">
        <x-button type="button" variant="secondary">
            {{ __('clients.reset') }}
        </x-button>
    </a>
</div>