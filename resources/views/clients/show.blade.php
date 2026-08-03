<x-app-layout>
    <div class="space-y-6">

        @include('clients.show._header')

        {{-- Layout: Sidebar + Main Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- SIDEBAR (1/4) --}}
            <div class="lg:col-span-1 space-y-6">
                @include('clients.show._client-info')
            </div>

            {{-- MAIN CONTENT (3/4) --}}
            <div class="lg:col-span-3 space-y-6">

                {{-- Follow-up section (leads and prospects only) --}}
                @if($client->needsFollowup())
                    @include('clients.followups._section')
                @endif

                {{-- Projects --}}
                @include('clients.show._projects')

                {{-- Partials --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @include('clients.show._tasks')
                    @include('clients.show._meetings')
                    @include('clients.show._payments')
                    @include('clients.show._costs')
                    @include('clients.show._documents')
                </div>

            </div>

        </div>

    </div>

    {{-- Modals --}}
    @include('clients.modals._client-form')
    @if($client->needsFollowup())
        @include('clients.modals._followup-form')
    @endif
</x-app-layout>
