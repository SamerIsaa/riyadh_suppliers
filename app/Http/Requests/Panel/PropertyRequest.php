<?php

namespace App\Http\Requests\Panel;


use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{

    public function authorize()
    {
        return auth('admin')->user()->can('manage_services');
    }


    public function rules()
    {

        $rules = [
            'options' => 'nullable|array',
        ];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
            $rules['options.*.name_' . $key] = 'required|string|max:255';
        }
        return $rules;
    }


}
