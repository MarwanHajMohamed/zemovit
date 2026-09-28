<?php

namespace App\Http\Requests\Nami\Settings;

use App\Http\Requests\MainRequest;

class StoreSettingRequest extends MainRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'*.website_name'] = 'nullable|string|max:255';
            $rules[$locale.'*.location'] = 'nullable|string|max:255';
            $rules[$locale.'*.copyright'] = 'required|string|max:255';
            $rules[$locale.'*.footer_text'] = 'required|string|max:255';
            $rules[$locale.'*.privacy'] = 'nullable|string|max:255';
        }

        return array_merge($rules, [
            'logo_header' => 'nullable',
            'logo_footer' => 'nullable',
            'favicon' => 'nullable',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'snapchat' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'other_phone' => 'nullable',
            'map_link' => 'nullable',
        ]);
    }
}
