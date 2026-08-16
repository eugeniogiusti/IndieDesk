<td class="px-4 py-4 text-right">
    <div class="flex flex-col items-end gap-2">
        {{-- Google Calendar --}}
        @if($payment->googleCalendarUrl())
            <a href="{{ $payment->googleCalendarUrl() }}"
               target="_blank"
               title="{{ __('payments.add_to_calendar') }}"
               class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
        @endif

        {{-- Agenzia Entrate — Fattura Elettronica --}}
        <a href="https://ivaservizi.agenziaentrate.gov.it/ser/fatturewizard/#/generazione"
           target="_blank"
           rel="noopener noreferrer"
           title="{{ __('payments.open_invoice_wizard') }}"
           class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M4 21V8l8-5 8 5v13M9 21v-6h6v6" />
            </svg>
        </a>

        {{-- Billing Tool --}}
        @if($billingToolUrl)
            <a href="{{ $billingToolUrl }}"
               target="_blank"
               rel="noopener noreferrer"
               title="{{ __('payments.open_billing_tool') }}"
               class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </a>
        @endif

        {{-- Edit --}}
        <button type="button"
                data-action="edit-payment"
                data-payload="{{ json_encode($payment->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
                class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                title="{{ __('ui.edit') }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </button>

        {{-- Delete --}}
        <form method="POST" action="{{ route('payments.destroy', [$project, $payment]) }}"
              data-confirm="{{ __('payments.confirm_delete') }}">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="text-red-600 hover:text-red-800 dark:text-red-400"
                    title="{{ __('ui.delete') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </div>
</td>