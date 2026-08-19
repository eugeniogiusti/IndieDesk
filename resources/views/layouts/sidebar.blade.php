<aside
    x-data="{
        collapsed: localStorage.getItem('sidebar-collapsed') === 'true'
    }"
    x-init="
        // Sync HTML class with Alpine state on init (in case of mismatch)
        document.documentElement.classList.toggle('sidebar-collapsed', collapsed);
        // Enable transitions after first paint
        $nextTick(() => document.documentElement.classList.add('sidebar-ready'));
        // Watch for changes
        $watch('collapsed', value => {
            localStorage.setItem('sidebar-collapsed', value);
            document.documentElement.classList.toggle('sidebar-collapsed', value);
        })
    "
    class="sidebar-element min-h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col shrink-0 overflow-y-auto"
>

    {{-- Brand + Toggle --}}
    @include('layouts.sidebar._brand')

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-4 space-y-1">

        {{-- Main Navigation --}}
        @include('layouts.sidebar._nav-main')

        {{-- Divider - uses CSS class instead of x-show to prevent FOUC --}}
        <div class="my-3 border-t border-gray-200 dark:border-gray-600 sidebar-expanded-only"></div>

        {{-- Settings Navigation --}}
        @include('layouts.sidebar._nav-settings')

    </nav>

    {{-- Footer --}}
    @include('layouts.sidebar._footer')
    
</aside>
