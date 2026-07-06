<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandingItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:500'],
            'description' => ['nullable', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'meta' => ['nullable', 'array'],
            'meta.*' => ['nullable', 'string', 'max:5000'],
            'meta_files' => ['nullable', 'array'],
            'meta_files.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }
}
