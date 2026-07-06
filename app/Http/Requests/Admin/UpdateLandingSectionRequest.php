<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandingSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'section_label' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:500'],
            'subtitle' => ['nullable', 'string', 'max:2000'],
            'body' => ['nullable', 'string', 'max:10000'],
            'is_active' => ['sometimes', 'boolean'],
            'extra' => ['nullable', 'array'],
            'extra.*' => ['nullable', 'string', 'max:5000'],
            'extra_files' => ['nullable', 'array'],
            'extra_files.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }
}
