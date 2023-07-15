<?php

namespace App\Http\Requests\Panel;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return auth('admin')->user()->can('add_categories');
    }


    public function rules()
    {

        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
        }
        return $rules;
    }


}
