<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class TherapeuticAreaRequest extends MainRequest
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
                'max:255',

                'unique:therapeutic_area_translations,title',
            ],
            'en.title' => [
                'required',
                'string',
                'max:255',

                'unique:therapeutic_area_translations,title',
            ],
            'en.title2' => [
                'required',
                'string',
                'max:255',

                'unique:therapeutic_area_translations,title2',
            ],
            'ar.description' => [
                'nullable',
                'string',
                'max:10000',

            ],
            'en.description' => [
                'required',
                'string',
                'max:10000',

            ],
            'icon' => 'nullable|image|max:255',

        ];
    }

    protected function update(): array
    {
//        dd($this->therapeutic_area);
        return [
            // Add your validation rules for updating resources here
            'ar.title' => [
                'nullable',
                'string',
                'max:255',

            ],
            'en.title' => [
                'required',
                'string',
                'unique:therapeutic_area_translations,title,'.$this->therapeutic_area,
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
            'icon' => 'sometimes|image|max:255',
            'en.title2' => [
                'required',
                'string',
                'max:1000',
                'unique:therapeutic_area_translations,title2,'.$this->therapeutic_area,
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
