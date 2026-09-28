<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class HomeSettingRequest extends MainRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update(),
            'DELETE' => $this->destroy(),
            'GET' => $this->view(),
            default => [],
        };
    }

    protected function store(): array
    {
        return [
            'section_name' => 'required|string',
            'is_show' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ar.title' => [
                'nullable',
                'string',
            ],
            'en.title' => [
                'nullable',
                'string',
            ],
            'ar.subtitle' => [
                'nullable',
                'string',
            ],
            'en.subtitle' => [
                'nullable',
                'string',
            ],
            'ar.subtitle2' => [
                'nullable',
                'string',
            ],
            'en.subtitle2' => [
                'nullable',
                'string',
            ],
            'ar.description' => [
                'nullable',
                'string',
            ],
            'en.description' => [
                'nullable',
                'string',
            ],
        ];
    }

    protected function update(): array
    {
        return [
            'section_name' => 'required|string',
            'is_show' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ar.title' => [
                'nullable',
                'string',
            ],
            'en.title' => [
                'nullable',
                'string',
            ],
            'ar.subtitle' => [
                'nullable',
                'string',
            ],
            'en.subtitle' => [
                'nullable',
                'string',
            ],
            'ar.subtitle2' => [
                'nullable',
                'string',
            ],
            'en.subtitle2' => [
                'nullable',
                'string',
            ],
            'ar.description' => [
                'nullable',
                'string',
            ],
            'en.description' => [
                'nullable',
                'string',
            ],
        ];
    }
    protected function destroy(): array
    {
        return [
            // Add your validation rules for deleting resources here
        ];
    }

    protected function view(): array
    {
        return [
            // Add your validation rules for viewing resources here
        ];
    }
}
