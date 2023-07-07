<?php

namespace App\Http\Requests\Panel;


use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    protected $id;

    public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('add_products');
    }


    public function rules()
    {
        $rules = [
            'image' => 'required_unless:_method,PUT',
            'number' => 'required|unique:products,number,'.$this->id,
        ];
        foreach (locales() as $category => $language) {
            $rules['title_' . $category] = 'required|string|max:255';
            $rules['description_' . $category] = 'required|string';
        }
        return $rules;
    }


}
