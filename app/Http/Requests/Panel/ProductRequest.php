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
            'images' => 'required',
            'number' => 'required|unique:products,number,' . $this->id,
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|lt:price',
        ];
        foreach (locales() as $category => $language) {
            $rules['title_' . $category] = 'required|string|max:255';
            $rules['short_description_' . $category] = 'required|string|max:500';
            $rules['description_' . $category] = 'required|string';
        }
        return $rules;
    }


    public function attributes():array
    {
        return [
            'number' => __('constants.product_number'),
            'price' => __('constants.price'),
            'offer_price' => __('constants.offer_price'),
            'images' => __('constants.images'),
        ];
    }


}
