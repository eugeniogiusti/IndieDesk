<td class="px-6 py-4 whitespace-nowrap">
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
</td>
