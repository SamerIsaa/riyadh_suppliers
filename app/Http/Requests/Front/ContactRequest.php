<?php

namespace App\Http\Requests\Front;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('constants.name'),
            'email' => __('constants.email'),
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'status' => StatusCodes::VALIDATION_ERROR,
//            'message' => $validator->errors()->first()
//        ], StatusCodes::VALIDATION_ERROR));
//    }


}
