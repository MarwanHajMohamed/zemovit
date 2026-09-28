<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends MainRequest
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
                'unique:product_translations,title',
                'max:255',
            ],
            'en.title' => [
                'required',
                'string',
                'unique:product_translations,title',
                'max:255',
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
            'image' => 'required|image',
            'is_featured' => 'sometimes|boolean',
            'therapeutic_area_id'=>'array',
            'therapeutic_area_id.*' => 'required|exists:therapeutic_areas,id',
            'titles'=> 'array',
            'benefits'=>'array',
            'details'=>'array',

        ];
    }

    protected function update(): array
    {
        return [
            // Add your validation rules for updating resources here
            'ar.title' => [
                'nullable',
                'string',
                'max:255',
                'unique:product_translations,title,'.$this->product,
            ],
            'en.title' => [
                'required',
                'string',
                'max:255',
                'unique:product_translations,title,'.$this->product,
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
            'image' => 'sometimes|image',
            'is_featured' => 'sometimes|boolean',
            'therapeutic_area_id'=>'array',
            'therapeutic_area_id.*' => 'required|exists:therapeutic_areas,id',
            'titles'=> 'array',
            'benefits'=>'array',
            'details'=>'array',
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
