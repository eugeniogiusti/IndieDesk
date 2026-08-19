<x-app-layout>
    <div class="w-full py-6">
        @include('projects.show._header')

        {{-- Layout: Sidebar + Main Content --}}
        <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-[13rem_minmax(0,1fr)] lg:gap-6"
             x-data="{ activeTab: '{{ request()->query('tab', 'overview') }}' }"
             x-cloak>

            {{-- SIDEBAR (fixed width, sticky) --}}
            <div class="sticky top-0 z-20 min-w-0 lg:top-6 lg:z-auto">
                @include('projects.show._tabs-nav')
            </div>

            {{-- MAIN CONTENT --}}
            <div class="min-w-0">
                @include('projects.show._content-tabs')
            </div>
        </div>

        {{-- Modal --}}
        @include('projects.modals._project-form')
    </div>

    @if($aiSettings->ai_enabled && $aiSettings->ai_api_key)
        @include('ai._panel', ['project' => $project])
    @endif
</x-app-layout>
