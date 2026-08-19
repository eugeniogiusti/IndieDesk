{{-- FOOTER - Theme toggle + Logout --}}
<div class="p-4 border-t border-gray-200 dark:border-gray-700 space-y-1">
    <button
        type="button"
        onclick="toggleTheme()"
        class="sidebar-nav-link flex items-center w-full px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md"
        :title="collapsed ? '{{ __('ui.theme') }}' : ''"
    >
        <svg class="sidebar-icon w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
        <span class="sidebar-label">{{ __('ui.theme') }}</span>
    </button>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button
            class="sidebar-nav-link flex items-center w-full px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md"
            :title="collapsed ? '{{ __('navbar.logout') }}' : ''"
        >
            <svg class="sidebar-icon w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="sidebar-label">{{ __('navbar.logout') }}</span>
        </button>
    </form>
</div>