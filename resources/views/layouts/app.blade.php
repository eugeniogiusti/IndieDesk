{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#4f46e5">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#111827">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>{{ config('app.name', 'IndieDesk') }}</title>
    <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/pwa-icons/apple-touch-icon.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="IndieDesk">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/critical.css') }}">

    <!-- Theme (no flash) -->
    <meta name="color-scheme" content="dark light">

    <script src="{{ asset('js/boot.js') }}"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <!-- Global toast container  -->
        <x-ui.toast-container />
    @include('layouts._flash-messages')

    <!-- Main layout -->
    <div class="app-shell flex overflow-hidden"
         x-data="{ drawerOpen: false }"
         :class="{ 'sidebar-mobile-open': drawerOpen }"
         @keydown.escape.window="drawerOpen = false">

        {{-- Sidebar (desktop) / drawer off-canvas (mobile) --}}
        @include('layouts.sidebar')

        {{-- Overlay drawer mobile --}}
        <div x-show="drawerOpen" x-cloak
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="drawerOpen = false"
             class="fixed inset-0 z-30 bg-gray-900/60 md:hidden"></div>

        {{-- On the right --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            {{-- Breeze Navabar --}}
            @include('layouts.navigation')

            {{-- page content (scrollable) --}}
            <div class="flex-1 overflow-y-auto flex flex-col pb-[calc(4rem+env(safe-area-inset-bottom))] md:pb-0">
                <main class="p-4 sm:p-6 flex-1">
                    {{ $slot }}
                </main>

                {{-- Footer --}}
                @include('layouts.footer')
            </div>
        </div>

        {{-- Bottom navigation (solo mobile) --}}
        @include('layouts.bottom-nav')
    </div>

</body>
</html>
