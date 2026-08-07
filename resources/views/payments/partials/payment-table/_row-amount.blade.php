<td class="px-4 py-4 whitespace-nowrap">
    <div class="text-lg font-bold text-gray-900 dark:text-white">
        {{ $payment->getFormattedAmount() }}
    </div>
    <div class="mt-1">
        <x-payments.method-badge :method="$payment->method" />
    </div>
    @if($payment->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $payment->client->name }}
        </div>
    @endif
    @if($payment->notes)
        <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($payment->notes, 50) }}
        </div>
    @endif
</td>
