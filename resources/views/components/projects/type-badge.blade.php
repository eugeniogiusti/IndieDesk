@props(['type'])

@php
    $map = [
        'client_work' => ['label' => __('projects.type_client_work'), 'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-200'],
        'product'     => ['label' => __('projects.type_product'),     'class' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200'],
        'content'     => ['label' => __('projects.type_content'),     'class' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-200'],
        'asset'       => ['label' => __('projects.type_asset'),       'class' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-200'],
        'saas'        => ['label' => __('projects.type_saas'),        'class' => 'bg-cyan-100 text-cyan-800 dark:bg-cyan-900/30 dark:text-cyan-200'],
    ];

    $item = $map[$type] ?? ['label' => $type ?: '-', 'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200'];
@endphp

<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $item['class'] }}">
    {{ $item['label'] }}
</span>