<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class ProductWarningRequest extends MainRequest
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
            'ar.description' => [
                'required',
                'string',
            ],
            'en.description' => [
                'required',
                'string',
            ],

        ];
    }

    protected function update(): array
    {
        return [
            // Add your validation rules for updating resources here
            'product_id' => 'required|exists:products,id',
            'ar.description' => [
                'required',
                'string',
                'regex:/^[^\x{0041}-\x{007A}]*\p{Arabic}+[^\x{0041}-\x{007A}]*$/u'
            ],
            'en.description' => [
                'required',
                'string',
                'regex:/^[^\p{Arabic}]*[A-Za-z]+[^\p{Arabic}]*$/u'
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
