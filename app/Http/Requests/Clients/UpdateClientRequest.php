<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $client = $this->route('client');

        return [
            // Required fields
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('clients')->ignore($client->id),
            ],
            'status' => 'required|in:lead,prospect,active,archived',
            
            // Optional contact fields
            'vat_number' => 'nullable|string|max:20',
            'phone_prefix' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'pec' => 'nullable|email|max:255',
            
            // Optional billing address fields
            'billing_address' => 'nullable|string',
            'billing_city' => 'nullable|string|max:100',
            'billing_zip' => 'nullable|string|max:20',
            'billing_province' => 'nullable|string|max:5',
            'billing_country' => 'nullable|string|size:2',
            'billing_recipient_code' => 'nullable|string|size:7',
            
            // Optional web/social fields
            'website' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            
            // Notes
            'notes' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('clients.validation.name_required'),
            'email.required' => __('clients.validation.email_required'),
            'email.email' => __('clients.validation.email_invalid'),
            'email.unique' => __('clients.validation.email_unique'),
            'status.required' => __('clients.validation.status_required'),
            'status.in' => __('clients.validation.status_invalid'),
            'billing_country.size' => __('clients.validation.country_code_invalid'),
            'billing_recipient_code.size' => __('clients.validation.recipient_code_invalid'),
            'website.url' => __('clients.validation.website_invalid'),
            'linkedin.url' => __('clients.validation.linkedin_invalid'),
        ];
    }
}