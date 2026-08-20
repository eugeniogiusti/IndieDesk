<x-app-layout>
    <div class="space-y-6" x-data="{ activeTab: '{{ request()->query('tab', 'personal') }}' }">
        {{-- Header --}}
        @include('settings.business._header')

        {{-- Main Form --}}
        <form method="POST" action="{{ route('settings.business.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('settings.business._tabs-container')
        </form>

        {{-- ATECO Codes (outside main form to avoid nested forms) --}}
        <div x-show="activeTab === 'tax'" x-cloak>
            @include('settings.business._ateco-codes')
        </div>

        {{-- Business Documents (outside main form — has its own upload form) --}}
        <div x-show="activeTab === 'documents'" x-cloak>
            @include('settings.business._documents')
        </div>

        {{-- Hidden form for delete logo --}}
        <form id="delete-logo-form"
              method="POST"
              action="{{ route('settings.business.delete-logo') }}"
              class="hidden">
            @csrf
            @method('DELETE')
        </form>

        {{-- Hidden form for Google Calendar disconnect (outside main form to avoid nested forms) --}}
        <form id="google-calendar-disconnect-form"
              method="POST"
              action="{{ route('settings.google-calendar.disconnect') }}"
              class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-app-layout>