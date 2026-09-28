<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class AboutRequest extends MainRequest
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
            // Add your validation rules for storing resources here
            'ar.title' => [
                'nullable',
                'string',
                'unique:about_translations,title',
            ],
            'en.title' => [
                'required',
                'string',
                'unique:about_translations,title',
                'max:255',
            ],
            'ar.subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],
            'en.subtitle' => [
                'required',
                'string',
                'max:255',
            ],

            'is_show' => ['nullable','in:0,1'],
            'en.subtitle2' => [
                'required',
                'string',
                'max:255',
            ],
            'ar.subtitle2' => [
                'nullable',
                'string',
                'max:255',
            ],
            'ar.description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'en.description' => [
                'required',
                'string',
                'max:1000',
            ],
            'image' => 'required',

        ];
    }

    protected function update(): array
    {
        $aboutId = $this->about ? $this->about : $this->route('about');

        return [
            // Add your validation rules for updating resources here
            'ar.title' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('about_translations', 'title')
                    ->where('locale', 'ar')
                    ->ignore($aboutId, 'about_id'),
            ],
            'en.title' => [
                'required',
                'string',
                'max:50',
                Rule::unique('about_translations', 'title')
                    ->where('locale', 'ar')
                    ->ignore($aboutId, 'about_id'),
                'regex:/^[^\p{Arabic}]*[A-Za-z]+[^\p{Arabic}]*$/u'
            ],
            'en.subtitle' => [
                'required',
                'string',
                'max:255',
            ],
            'ar.description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'en.description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'en.subtitle2' => [
                'nullable',
                'string',
                'max:255',
            ],
            'ar.subtitle2' => [
                'nullable',
                'string',
                'max:255',
            ],
            'image' => ($this->image_value == null && $this->image == null) ? 'required|image' : 'nullable|image',
            'is_show' => ['nullable','in:0,1'],
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
