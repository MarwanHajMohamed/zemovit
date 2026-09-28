<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class ProductBenefitRequest extends MainRequest
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
                'unique:product_benefit_translations,title',
            ],
            'en.title' => [
                'required',
                'string',
                'unique:product_benefit_translations,title',
                'max:255',

            ],
            'product_id' => 'required|integer|exists:products,id',

        ];
    }

    protected function update(): array
    {
        return [
            // Add your validation rules for updating resources here
            'ar.title' => [
                'nullable',
                'string',
                'unique:product_benefit_translations,title',
                'max:255',

            ],
            'en.title' => [
                'required',
                'string',
                'unique:product_benefit_translations,title',
            ],
            'product_id' => 'required|integer|exists:products,id',

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
