<?php

namespace App\Http\Requests\Zemovit;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MissionRequest extends MainRequest
{
    public function authorize(): bool
    {
        return true; // غيرها حسب الصلاحيات
    }

    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

            // الترانسليشن
            'ar.title' => ['nullable', 'string', 'max:255'],
            'en.title' => ['nullable', 'string', 'max:255'],
            'ar.sub_title' => ['nullable', 'string', 'max:255'],
            'en.sub_title' => ['nullable', 'string', 'max:255'],
            'ar.description' => ['nullable', 'string'],
            'en.description' => ['nullable', 'string'],
        ];
    }
}
