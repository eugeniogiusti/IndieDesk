{{-- USER MENU DESKTOP --}}
<div class="hidden sm:flex sm:items-center sm:ms-6 space-x-3">

    {{-- Locale Select --}}
    <select
        class="text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-2 py-1 focus:outline-none focus:ring-1 focus:ring-indigo-500"
        onchange="window.location.href='{{ url('locale') }}/' + this.value"
    >
        <option value="da" {{ app()->getLocale() == 'da' ? 'selected' : '' }}>🇩🇰</option>
        <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>🇩🇪</option>
        <option value="it" {{ app()->getLocale() == 'it' ? 'selected' : '' }}>🇮🇹</option>
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇬🇧</option>
        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>🇪🇸</option>
        <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>🇫🇷</option>
        <option value="nl" {{ app()->getLocale() == 'nl' ? 'selected' : '' }}>🇳🇱</option>
        <option value="pl" {{ app()->getLocale() == 'pl' ? 'selected' : '' }}>🇵🇱</option>
        <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>🇵🇹</option>
        <option value="ro" {{ app()->getLocale() == 'ro' ? 'selected' : '' }}>🇷🇴</option>
        <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>🇷🇺</option>
        <option value="uk" {{ app()->getLocale() == 'uk' ? 'selected' : '' }}>🇺🇦</option>
        <option value="zh" {{ app()->getLocale() == 'zh' ? 'selected' : '' }}>🇨🇳</option>
    </select>

    {{-- Toggle Dark/Light --}}
    <button
        type="button"
        onclick="toggleTheme()"
        class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition"
        title="{{ __('ui.theme') }}"
        aria-label="{{ __('ui.theme') }}"
    >
        🌓
    </button>

    {{-- Dropdown User --}}
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                       text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800
                       hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition"
            >
                <div>{{ Auth::user()->name }}</div>
                <div class="ms-1">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('navbar.profile') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('security.index')">
                {{ __('navbar.security') }}
            </x-dropdown-link>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('navbar.logout') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>