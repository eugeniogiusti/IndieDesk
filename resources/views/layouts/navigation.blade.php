{{-- NAVIGATION BAR (TOPBAR) --}}
<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center gap-4">

            {{-- Apri drawer: solo mobile --}}
            <button @click="drawerOpen = true"
                    class="md:hidden -ms-2 p-2 rounded-md text-gray-400 dark:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- Project Search --}}
            @include('layouts.navigation._project-search')

            {{-- User Menu Desktop --}}
            @include('layouts.navigation._user-menu')

        </div>
    </div>
</nav>
{{-- END NAVIGATION BAR --}}