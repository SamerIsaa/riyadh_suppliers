<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->user()->can('add_sliders');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'image' => 'required_unless:_method,PUT',
            'mobile_image' => 'required_unless:_method,PUT',
        ];

        foreach (locales() as $key => $language) {
            $rules['title_' . $key] = 'nullable|string|max:255';
            $rules['content_' . $key] = 'nullable|string';
        }

        return $rules;
    }
}
