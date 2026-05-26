@props(['status'])

@php
    $colors = [
        'lead' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
        'prospect' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
        'active' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'archived' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
    ];
@endphp

<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colors[$status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' }}">
    {{ __('clients.status_' . $status) }}
</span>