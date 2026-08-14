<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessSettingsRequest extends FormRequest
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
        return [
            // Personal Info
            'owner_first_name' => ['nullable', 'string', 'max:255'],
            'owner_last_name' => ['nullable', 'string', 'max:255'],

            // Legal Address
            'legal_address' => ['nullable', 'string', 'max:255'],
            'legal_city' => ['nullable', 'string', 'max:100'],
            'legal_zip' => ['nullable', 'string', 'max:20'],
            'legal_province' => ['nullable', 'string', 'size:2'],
            'legal_country' => ['nullable', 'string', 'size:2'],

            // Tax Info
            'tax_id' => ['nullable', 'string', 'max:50'],
            'vat_number' => ['nullable', 'string', 'max:50'],
            'iban' => ['nullable', 'string', 'regex:/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/'],
            'default_currency' => ['nullable', 'string', 'size:3'],

            // Contacts
            'email' => ['nullable', 'email', 'max:255'],
            'certified_email' => ['nullable', 'email', 'max:255'],
            'phone_prefix' => ['nullable', 'string', 'max:10'],
            'phone' => ['nullable', 'string', 'max:50'],

            // Business Info
            'business_name' => ['nullable', 'string', 'max:255'],
            'business_description' => ['nullable', 'string', 'max:1000'],
            'website' => ['nullable', 'url', 'max:255'],

            // Logo (max 2MB, only images)
            'logo' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,jpg,png,svg'],

            // Fiscal regime
            'tax_regime' => ['nullable', 'string', 'max:100'],
            'substitute_tax_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'profitability_coefficient' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'annual_revenue_cap' => ['nullable', 'numeric', 'min:0'],
            'inps_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'inps_ceiling' => ['nullable', 'numeric', 'min:0'],
            'business_start_date' => ['nullable', 'date'],

            // Pension
            'pension_fund' => ['nullable', 'string', 'max:100'],
            'pension_registration_number' => ['nullable', 'string', 'max:50'],
            'pension_registration_date' => ['nullable', 'date'],

            // Invoice note (e.g. forfettario VAT exemption clause)
            'invoice_note' => ['nullable', 'string', 'max:1000'],

            // Integrations
            'github_pat' => ['nullable', 'string', 'max:255'],
            'billing_tool_url' => ['nullable', 'url', 'max:255'],
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
            'logo.image' => __('business_settings.logo_must_be_image'),
            'logo.max' => __('business_settings.logo_max_size'),
            'logo.mimes' => __('business_settings.logo_allowed_formats'),
            'iban.regex' => __('business_settings.iban_invalid_format'),
        ];
    }
}