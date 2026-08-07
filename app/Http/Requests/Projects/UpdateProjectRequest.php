<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            // Required fields
            'name' => 'required|string|max:255',
            'status' => 'required|in:draft,in_progress,completed,archived',

            // Project type (macro category)
            'type' => 'required|in:client_work,product,content,asset,saas',

            // Multiple clients (only relevant for type=saas)
            'client_ids' => 'nullable|array',
            'client_ids.*' => 'exists:clients,id',

            // Optional project start date (informational / target)
            'start_date' => 'nullable|date',

            // Optional target due date
            'due_date' => 'nullable|date|after_or_equal:start_date',
            
            // Optional client (nullable for internal projects)
            'client_id' => 'nullable|exists:clients,id',
            
            // Optional text fields
            'description' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
            
            // Optional URL fields
            'repo_url' => 'nullable|url|max:255',
            'staging_url' => 'nullable|url|max:255',
            'production_url' => 'nullable|url|max:255',
            'figma_url' => 'nullable|url|max:255',
            'docs_url' => 'nullable|url|max:255',
            
            // Notes
            'notes' => 'nullable|string',

            // Hourly rate (solo per progetti client_work)
            'hourly_rate' => 'nullable|numeric|min:0|max:99999.99',
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
            'name.required' => __('projects.validation.name_required'),
            'status.required' => __('projects.validation.status_required'),
            'status.in' => __('projects.validation.status_invalid'),
            'client_id.exists' => __('projects.validation.client_not_found'),
            'priority.in' => __('projects.validation.priority_invalid'),
            'repo_url.url' => __('projects.validation.repo_url_invalid'),
            'staging_url.url' => __('projects.validation.staging_url_invalid'),
            'production_url.url' => __('projects.validation.production_url_invalid'),
            'figma_url.url' => __('projects.validation.figma_url_invalid'),
            'docs_url.url' => __('projects.validation.docs_url_invalid'),
        ];
    }

}