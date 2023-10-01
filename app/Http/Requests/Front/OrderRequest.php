<?php

namespace App\Http\Requests\Front;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'items' => 'required|array',
            'items.*.product_code' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'items' => __('landing.order_products'),
            'items.*.product_code' => __('landing.product_model_code'),
            'items.*.quantity' => __('landing.quantity'),
        ];
    }
}
