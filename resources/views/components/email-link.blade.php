@props(['email', 'label' => null])

@if($email)
    <div>
        @if($label)
            <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-0.5">{{ $label }}</p>
        @endif
        <a href="mailto:{{ $email }}"
           class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition group">
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>{{ $email }}</span>
        </a>
    </div>
@endif