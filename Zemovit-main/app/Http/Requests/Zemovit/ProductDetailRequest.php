<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class ProductDetailRequest extends MainRequest
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
            'product_id' => 'required|exists:products,id',

            'ar.label' => [
                'nullable',
                'string',
                'unique:about_translations,title',

            ],
            'en.label' => [
                'required',
                'string',
                'max:255',

                'unique:about_translations,title',
            ],
            'ar.value' => [
                'nullable',
                'string',
                'max:255',

            ],
            'en.value' => [
                'required',
                'string',
                'max:255',

            ],

        ];
    }

    protected function update(): array
    {
        return [
            // Add your validation rules for updating resources here
            'product_id' => 'required|exists:products,id',

            'ar.label' => [
                'nullable',
                'string',
                'unique:about_translations,title',
                'max:255',

            ],
            'en.label' => [
                'required',
                'string',
                'unique:about_translations,title',
                'max:255',

            ],
            'ar.value' => [
                'nullable',
                'string',
                'max:255',

            ],
            'en.value' => [
                'required',
                'string',
                'max:255',

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
