<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Admin middleware protects these routes; allow request
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],

            'item_one_title' => ['nullable', 'string', 'max:255'],
            'item_one_content' => ['nullable', 'string'],

            'item_two_title' => ['nullable', 'string', 'max:255'],
            'item_two_content' => ['nullable', 'string'],

            'item_three_title' => ['nullable', 'string', 'max:255'],
            'item_three_content' => ['nullable', 'string'],

            'status' => ['required', 'in:active,inactive'],
        ];
    }
}