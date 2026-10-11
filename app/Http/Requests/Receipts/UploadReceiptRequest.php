<?php

namespace App\Http\Requests\Receipts;

use Illuminate\Foundation\Http\FormRequest;

class UploadReceiptRequest extends FormRequest
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
            'receipt' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:30720'], // 30MB max
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
            'receipt.required' => __('receipts.file_required'),
            'receipt.file' => __('receipts.must_be_file'),
            'receipt.mimes' => __('receipts.must_be_valid_format'),
            'receipt.max' => __('receipts.max_size'),
        ];
    }
}
