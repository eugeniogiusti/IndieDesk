<div class="w-full overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

    {{-- Tab Content --}}
    <div class="p-4 sm:p-6">

        {{-- TAB: Overview --}}
        <div x-show="activeTab === 'overview'" x-cloak class="space-y-6">
            @include('projects.show._tab-overview')
        </div>

        {{-- TAB: Tasks --}}
        <div x-show="activeTab === 'tasks'" x-cloak>
            @include('projects.show._tab-tasks')
        </div>

        {{-- TAB: Meetings --}}
        <div x-show="activeTab === 'meetings'" x-cloak>
            @include('projects.show._tab-meetings')
        </div>

        {{-- TAB: Payments --}}
        <div x-show="activeTab === 'payments'" x-cloak>
            @include('projects.show._tab-payments')
        </div>

        {{-- TAB: Costs --}}
        <div x-show="activeTab === 'costs'" x-cloak>
            @include('projects.show._tab-costs')
        </div>

        {{-- TAB: Profit --}}
        <div x-show="activeTab === 'profit'" x-cloak>
            @include('projects.show._tab-profit')
        </div>

        {{-- TAB: Documents --}}
        <div x-show="activeTab === 'documents'" x-cloak>
            @include('projects.show._tab-documents')
        </div>

        {{-- TAB: Timesheets --}}
        <div x-show="activeTab === 'timesheets'" x-cloak>
            @include('projects.show._tab-timesheets')
        </div>

        {{-- TAB: Editor --}}
        <template x-if="activeTab === 'editor'">
            <div>@include('projects.show._tab-editor')</div>
        </template>

        {{-- TAB: Repository --}}
        @if($project->repo_url && str_contains($project->repo_url, 'github.com'))
        <div x-show="activeTab === 'repository'" x-cloak>
            @include('projects.show._tab-repository')
        </div>
        @endif

    </div>

</div>
