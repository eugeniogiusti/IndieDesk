<x-app-layout>
    <div class="py-6">
            
            @include('projects.show._header')

            {{-- Layout: Sidebar + Main Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6"
                 x-data="{ activeTab: '{{ request()->query('tab', 'overview') }}' }"
                 x-cloak>

                {{-- SIDEBAR (1/4) --}}
                <div class="lg:col-span-1 space-y-6">
                    @include('projects.show._tabs-nav')
                </div>

                {{-- MAIN CONTENT (3/4) --}}
                <div class="lg:col-span-3">
                    @include('projects.show._content-tabs')
                </div>

            </div>

        </div>

                {{-- Modal--}}
        @include('projects.modals._project-form')

        
    </div>

    @php($aiSettings = \App\Models\AiSettings::current())
    @if($aiSettings->ai_enabled && $aiSettings->ai_api_key)
        @include('ai._panel', ['project' => $project])
    @endif
</x-app-layout>
