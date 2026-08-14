<?php

namespace App\Http\Requests\Taxes;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaxFundMovementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'type' => ['required', 'in:deposit,withdrawal'],
            'notes' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * Signed amount ready for storage: negative for withdrawals.
     */
    public function signedAmount(): float
    {
        $amount = (float) $this->validated('amount');

        return $this->validated('type') === 'withdrawal' ? -$amount : $amount;
    }
}
