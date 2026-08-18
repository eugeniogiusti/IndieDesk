<x-app-layout>
    <div class="space-y-6">

        @include('security.index._header')

        @include('security.index._active-sessions')

        @include('security.index._login-history')

    </div>
</x-app-layout>
