<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class FaqRequest extends MainRequest
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
                'unique:faq_translations,title',
            ],
            'en.title' => [
                'required',
                'string',
                'unique:faq_translations,title',
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
            // Add your validation rules for updating resources here
            'ar.title' => [
                'nullable',
                'string',
                Rule::unique('faq_translations', 'title')
                    ->where('locale', 'ar')
                    ->ignore($this->faq, 'faq_id'),
            ],
            'en.title' => [
                'required',
                'string',
                Rule::unique('faq_translations', 'title')
                    ->where('locale', 'en')
                    ->ignore($this->faq, 'faq_id'),
            ],
            'ar.description' => [
                'nullable',
                'string',
            ],
            'en.description' => [
                'required',
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
