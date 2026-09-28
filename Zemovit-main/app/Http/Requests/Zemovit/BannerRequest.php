<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class BannerRequest extends MainRequest
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
            'en.title' => [
                'required',
                'string',
                'unique:banner_translations,title',
                'max:255',
            ],
            'en.description' => [
                'required',
                'string',
                'max:1000',
            ],
            'btn_link'=>'required',
            'image' => 'required|image',
        ];
    }

    protected function update(): array
    {

        return [
            // Add your validation rules for updating resources here
            'en.title' => [
                'required',
                'string',
                'max:255',

            ],
            'en.description' => [
                'required',
                'string',
                'max:1000',

            ],
            'btn_link'=>'required',
            'image' => ($this->image_value == null && $this->image == null) ? 'required|image' : 'nullable|image',

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
            // Store & Update: Title (en)
            'en.title.required' => 'The English title field is required.',
            'en.title.string' => 'The English title must be a string.',
            'en.title.max' => 'The English title may not be greater than 50 characters.',
            'en.title.unique' => 'The English title has already been taken.',
            'en.title.regex' => 'The English title must contain Latin characters only and no Arabic characters.',

            // Store & Update: Description (en)
            'en.description.required' => 'The English description field is required.',
            'en.description.string' => 'The English description must be a string.',
            'en.description.max' => 'The English description may not be greater than 255 characters.',
            'en.description.regex' => 'The English description must contain Latin characters only and no Arabic characters.',

            // Store & Update: Button Link
            'btn_link.required' => 'The button link field is required.',

            // Store: Image
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            ];

    }
}
