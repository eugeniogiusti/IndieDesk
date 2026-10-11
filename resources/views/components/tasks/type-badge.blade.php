@props(['type'])

@php
$colors = [
    'bug' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
    'feature' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
    'infra' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
    'refactor' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
    'research' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200',
    'commercial' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200',
];
@endphp

<span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$type] ?? '' }}">
    {{ __('tasks.type_' . $type) }}
</span>