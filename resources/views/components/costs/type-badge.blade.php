@props(['type'])

@php
    $config = match($type) {
        'hosting' => [
            'bg' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
            'icon' => '🌐',
        ],
        'api' => [
            'bg' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300',
            'icon' => '🔌',
        ],
        'tool' => [
            'bg' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300',
            'icon' => '🛠️',
        ],
        'license' => [
            'bg' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
            'icon' => '📜',
        ],
        'ads' => [
            'bg' => 'bg-pink-100 text-pink-800 dark:bg-pink-900/30 dark:text-pink-300',
            'icon' => '📢',
        ],
        'service' => [
            'bg' => 'bg-cyan-100 text-cyan-800 dark:bg-cyan-900/30 dark:text-cyan-300',
            'icon' => '👥',
        ],
        'travel' => [
            'bg' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300',
            'icon' => '✈️',
        ],
        'hardware' => [
            'bg' => 'bg-slate-100 text-slate-800 dark:bg-slate-900/30 dark:text-slate-300',
            'icon' => '🖥️',
        ],
        'meal' => [
            'bg' => 'bg-lime-100 text-lime-800 dark:bg-lime-900/30 dark:text-lime-300',
            'icon' => '🍽️',
        ],
        'fee' => [
            'bg' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-300',
            'icon' => '💸',
        ],
        default => [
            'bg' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
            'icon' => '❓',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {$config['bg']}"]) }}>
    <span>{{ $config['icon'] }}</span>
    <span>{{ __('costs.type_' . $type) }}</span>
</span>