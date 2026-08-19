<nav class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="flex md:flex-col gap-0.5 overflow-x-auto md:overflow-visible p-2">

        <button
            @click="activeTab = 'overview'"
            :class="activeTab === 'overview'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 3.5h10.5L20.5 9v11.5H4z"/>
                <path d="M14.5 3.5V9H20.5"/>
                <path d="M7 13h10M7 16h7"/>
            </svg>
            {{ __('projects.overview') }}
        </button>

        <button
            @click="activeTab = 'tasks'"
            :class="activeTab === 'tasks'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 6h11M9 12h11M9 18h11"/>
                <path d="M4 6l1.5 1.5L8 5"/>
                <path d="M4 12l1.5 1.5L8 11"/>
                <path d="M4 18l1.5 1.5L8 17"/>
            </svg>
            {{ __('tasks.title') }}
        </button>

        <button
            @click="activeTab = 'meetings'"
            :class="activeTab === 'meetings'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 4v3M17 4v3M4 9h16"/>
                <rect x="4" y="6" width="16" height="14" rx="2"/>
                <path d="M8 13h3M13 13h3M8 16h3"/>
            </svg>
            {{ __('meetings.title') }}
        </button>

        <button
            @click="activeTab = 'payments'"
            :class="activeTab === 'payments'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 7h16v10H4z"/>
                <path d="M16 7V5H8v2"/>
                <circle cx="12" cy="12" r="2.5"/>
                <path d="M6 10h2M16 14h2"/>
            </svg>
            {{ __('payments.title') }}
        </button>

        <button
            @click="activeTab = 'costs'"
            :class="activeTab === 'costs'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 7h16v10H4z"/>
                <path d="M16 7V5H8v2"/>
                <path d="M9 12h6"/>
                <path d="M14 10l2 2-2 2"/>
            </svg>
            {{ __('costs.title') }}
        </button>

        <button
            @click="activeTab = 'profit'"
            :class="activeTab === 'profit'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19h16"/>
                <path d="M7 16V9M12 16V5M17 16v-7"/>
            </svg>
            {{ __('profit.title') }}
        </button>

        <button
            @click="activeTab = 'documents'"
            :class="activeTab === 'documents'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 3.5h7.5L19.5 8v12.5H7z"/>
                <path d="M14.5 3.5V8H19.5"/>
                <path d="M9 13h8M9 16h6"/>
            </svg>
            {{ __('documents.title') }}
        </button>

        <button
            @click="activeTab = 'timesheets'"
            :class="activeTab === 'timesheets'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="16" rx="2"/>
                <path d="M3 9h18"/>
                <path d="M8 4V2M16 4V2"/>
                <path d="M7 13h2v2H7z M11 13h2v2h-2z M15 13h2v2h-2z"/>
            </svg>
            {{ __('timesheets.title') }}
        </button>

        <button
            @click="activeTab = 'editor'"
            :class="activeTab === 'editor'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9"/>
                <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
            </svg>
            {{ __('projects.editor_tab') }}
        </button>

        @if($project->repo_url && str_contains($project->repo_url, 'github.com'))
        <button
            @click="activeTab = 'repository'"
            :class="activeTab === 'repository'
                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700'"
            class="flex-shrink-0 whitespace-nowrap md:whitespace-normal md:w-full flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-md transition-colors text-left">
            <svg aria-hidden="true" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
            </svg>
            {{ __('projects.repository') }}
        </button>
        @endif

    </div>
</nav>
