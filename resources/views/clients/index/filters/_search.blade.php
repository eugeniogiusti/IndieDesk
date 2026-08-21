{{-- Search Filter --}}
<div class="sm:col-span-2 lg:col-span-5">
    <x-form-input
        name="search"
        :label="__('ui.search')"
        :placeholder="__('clients.placeholder.search')"
        :value="request('search')"
    />
</div>
