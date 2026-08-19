@props([
  'name' => 'modal',
  'show' => false,
  'title' => null,
  'size' => 'md', // sm|md|lg
])

@php
$sizes = [
  'sm' => 'max-w-md',
  'md' => 'max-w-lg',
  'lg' => 'max-w-2xl',
];
@endphp

<div
  x-data="{ open: @js($show) }"
  x-on:open-modal.window="if($event.detail === '{{ $name }}'){ open = true }"
  x-on:close-modal.window="if($event.detail === '{{ $name }}'){ open = false }"
  x-show="open"
  x-cloak
  class="fixed inset-0 z-50 flex items-center justify-center p-4"
  aria-modal="true" role="dialog"
>
  <!-- backdrop -->
  <div class="fixed inset-0 bg-black/40" x-on:click="open = false"></div>

  <!-- panel -->
  <div class="relative w-full {{ $sizes[$size] }} max-h-[90vh] bg-white dark:bg-gray-800 rounded-lg shadow-lg flex flex-col">
    @if($title)
      <div class="shrink-0 px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h3>
        <button class="p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" x-on:click="open = false" aria-label="Close">✕</button>
      </div>
    @endif

    <div class="p-4 overflow-y-auto">
      {{ $slot }}
    </div>

    @isset($footer)
      <div class="shrink-0 px-4 py-3 border-t border-gray-200 dark:border-gray-700">
        {{ $footer }}
      </div>
    @endisset
  </div>
</div>