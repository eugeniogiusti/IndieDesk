<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'file'  => ['required', 'file', 'max:30720', 'mimes:pdf,jpg,jpeg,png,webp,zip,7z,rar,doc,docx,xls,xlsx'], // 30MB max
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
