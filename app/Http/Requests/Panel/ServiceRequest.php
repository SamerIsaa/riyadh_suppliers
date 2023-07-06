<?php

namespace App\Http\Requests\Panel;


use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{

    public function authorize()
    {
        return auth('admin')->user()->can('manage_services');
    }


    public function rules()
    {
        $rules = [
            'image' => 'required_unless:_method,PUT',
        ];
        foreach (locales() as $category => $language) {
            $rules['title_' . $category] = 'required|string|max:255';
            $rules['description_' . $category] = 'required|string';
        }
        return $rules;
    }


}
