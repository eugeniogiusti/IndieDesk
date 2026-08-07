<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'type' => ['required', 'string', 'in:' . implode(',', Task::TYPES)],
            'status' => ['required', 'string', 'in:' . implode(',', Task::STATUSES)],
            'priority' => ['nullable', 'string', 'in:' . implode(',', Task::PRIORITIES)],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
            'order'         => ['nullable', 'integer', 'min:0'],
            'file'          => ['nullable', 'file', 'max:30720', 'mimes:pdf,jpg,jpeg,png,webp,zip,7z,rar,doc,docx,xls,xlsx'],
            'document_name' => ['nullable', 'string', 'max:255'],
        ];
    }
}