<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientFollowupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type'         => ['required', 'string', 'in:call,email,whatsapp,linkedin'],
            'note'         => ['nullable', 'string'],
            'contacted_at' => ['required', 'date'],
            'completed'    => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required'         => __('clients.followup.validation.type_required'),
            'type.in'               => __('clients.followup.validation.type_invalid'),
            'contacted_at.required' => __('clients.followup.validation.contacted_at_required'),
            'contacted_at.date'     => __('clients.followup.validation.contacted_at_invalid'),
        ];
    }
}
