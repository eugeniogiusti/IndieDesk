{{-- Bottom navigation: solo mobile, le voci principali + menu completo (drawer) --}}
<nav class="fixed bottom-0 inset-x-0 z-30 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 pb-[env(safe-area-inset-bottom)] md:hidden">
    <div class="grid grid-cols-5 h-16">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('dashboard') ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-[10px] font-medium leading-none">{{ __('navbar.dashboard') }}</span>
        </a>

        {{-- Projects --}}
        <a href="{{ route('projects.index') }}"
           class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('projects.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="text-[10px] font-medium leading-none">{{ __('projects.title') }}</span>
        </a>

        {{-- Calendar --}}
        <a href="{{ route('calendar.index') }}"
           class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('calendar.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-[10px] font-medium leading-none">Calendar</span>
        </a>

        {{-- Documents --}}
        <a href="{{ route('documents.index') }}"
           class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('documents.*') ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <span class="text-[10px] font-medium leading-none">{{ __('documents.title') }}</span>
        </a>

        {{-- Menu completo (apre/chiude il drawer) --}}
        <button type="button" @click="drawerOpen = !drawerOpen"
                :class="drawerOpen ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400'"
                class="flex flex-col items-center justify-center gap-1">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <span class="text-[10px] font-medium leading-none">{{ __('ui.menu') }}</span>
        </button>

    </div>
</nav>
