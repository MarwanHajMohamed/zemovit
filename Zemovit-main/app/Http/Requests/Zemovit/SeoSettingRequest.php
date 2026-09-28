<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class SeoSettingRequest extends MainRequest
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
            'name' => 'string|required',
            'ar.title' => [
                'nullable',
                'string',
            ],
            'en.title' => [
                'required',
                'string',
            ],
            'ar.description' => [
                'nullable',
                'string',
            ],
            'en.description' => [
                'required',
                'string',
            ],
            'ar.keywords' => [
                'nullable',
                'string',
            ],
            'en.keywords' => [
                'required',
                'string',
            ],
            'image' => [
                'nullable',
                'file',
                'image',
            ],
        ];
    }

    protected function update(): array
    {
        return [
            // Add your validation rules for updating resources here
            'name' => 'string|required',
            'ar.title' => [
                'nullable',
                'string',
                'regex:/^[^\x{0041}-\x{007A}]*\p{Arabic}+[^\x{0041}-\x{007A}]*$/u'
            ],
            'en.title' => [
                'required',
                'string',
                'regex:/^[^\p{Arabic}]*[A-Za-z]+[^\p{Arabic}]*$/u'
            ],
            'ar.description' => [
                'nullable',
                'string',
                'regex:/^[^\x{0041}-\x{007A}]*\p{Arabic}+[^\x{0041}-\x{007A}]*$/u'
            ],
            'en.description' => [
                'required',
                'string',
                'regex:/^[^\p{Arabic}]*[A-Za-z]+[^\p{Arabic}]*$/u'
            ],
            'ar.keywords' => [
                'nullable',
                'string',
            ],
            'en.keywords' => [
                'required',
                'string',
            ],
            'image' => [
                'nullable',
                'file',
                'image',
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

    public function messages(): array
    {
        return [
            'ar.title.required' => __('zemovit.ar_title_required'),
            'ar.title.string' => __('zemovit.ar_title_string'),
            'ar.title.unique' => __('zemovit.ar_title_unique'),
            'ar.title.regex' => __('zemovit.ar_title_regex'),

            'en.title.required' => __('zemovit.en_title_required'),
            'en.title.string' => __('zemovit.en_title_string'),
            'en.title.unique' => __('zemovit.en_title_unique'),
            'en.title.regex' => __('zemovit.en_title_regex'),

            // Arabic description
            'ar.description.required' => __('zemovit.ar_description_required'),
            'ar.description.string' => __('zemovit.ar_description_string'),
            'ar.description.regex' => __('zemovit.ar_description_regex'),

            // English description
            'en.description.required' => __('zemovit.en_description_required'),
            'en.description.string' => __('zemovit.en_description_string'),
            'en.description.regex' => __('zemovit.en_description_regex'),

            'ar.keywords.required' => __('zemovit.ar_tags_required'),
            'ar.keywords.string' => __('zemovit.ar_tags_string'),

            'en.keywords.required' => __('zemovit.en_tags_required'),
            'en.keywords.string' => __('zemovit.en_tags_string'),

            // image
            'image.required' => __('zemovit.image_required'),
            'image.file' => __('zemovit.image_file'),
            'image.image' => __('zemovit.image_image'),

        ];
    }
}
