<!-- resources/views/components/form-input.blade.php -->
@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'hint' => '',
])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    @php
    $displayValue = old($name, $value);
    if (is_string($displayValue)) {
        $displayValue = html_entity_decode($displayValue, ENT_QUOTES, 'UTF-8');
    }
    @endphp

<input
    type="{{ $type }}"
    id="{{ $name }}"
    name="{{ $name }}"
    value="{{ $displayValue }}"
    {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg 
                        bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                        focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                        disabled:bg-gray-100 dark:disabled:bg-gray-800 disabled:cursor-not-allowed
                        transition duration-150'
        ]) }}
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
    >
    
    @if($hint)
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $hint }}</p>
    @endif
    
    @error($name)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>