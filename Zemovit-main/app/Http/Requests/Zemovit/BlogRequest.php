<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends MainRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST'   => $this->store(),
            'PUT', 
            'PATCH'  => $this->update(),
            'DELETE' => $this->destroy(),
            'GET'    => $this->view(),
            default  => [],
        };
    }

    protected function store(): array
    {
        return [
            'ar.title' => [
                'nullable',
                'string',
                'unique:blog_translations,title',
            ],
            'en.title' => [
                'required',
                'string',
                'unique:blog_translations,title',
                'max:255',
            ],
            'ar.description' => ['nullable', 'string', 'max:2000'],
            'en.description' => ['required', 'string', 'max:2000'],
            'image'          => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
            'date'           => ['nullable', 'date'],
            'files'          => ['nullable', 'array'],
            'files.*'        => ['file', 'mimes:jpg,png,jpeg,webp,svg,mp4', 'max:2048'],
        ];
    }

    protected function update(): array
    {
        $BlogId = $this->Blog ?? $this->route('Blog');

        return [
            'ar.title' => ['nullable', 'string'],
            'en.title' => [
                'sometimes',
                'string',
                'max:255',
               
            ],
            'ar.description' => ['nullable', 'string', 'max:2000'],
            'en.description' => ['sometimes', 'string', 'max:2000'],
            'image'          => ['sometimes', 'image', 'mimes:jpg,png,jpeg,webp,svg,mp4', 'max:2048'],
            'date'           => ['nullable', 'date'],
            'files'          => ['nullable', 'array'],
            'files.*'        => ['sometimes', 'file', 'mimes:jpg,png,jpeg,webp,svg,mp4', 'max:2048'],
        ];
    }

    protected function destroy(): array
    {
        return [];
    }

    protected function view(): array
    {
        return [];
    }
}
