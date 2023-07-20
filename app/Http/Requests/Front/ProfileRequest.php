<?php

namespace App\Http\Requests\Front;


use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $this->request = reArrangeTeleinputData(request());
        $this->request = reArrangeOwnerTeleinputData(request());

        return [
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'. auth()->id()],
            'owner_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users,mobile,'. auth()->id()],
            'commercial_registration_no' => ['required', 'string', 'max:255'],
            'tax_no' => ['required', 'string', 'max:255'],
            'order_owner_name' => ['required', 'string', 'max:255'],
            'order_owner_mobile' => ['required', 'string', 'max:255', 'unique:users,order_owner_mobile,'. auth()->id()],
            'address' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'company_name' => __('constants.company_name'),
            'email' => __('constants.email'),
            'owner_name' => __('constants.owner_name'),
            'mobile' => __('constants.mobile'),
            'commercial_registration_no' => __('constants.commercial_registration_no'),
            'tax_no' => __('constants.tax_no'),
            'order_owner_name' => __('constants.order_owner_name'),
            'order_owner_mobile' => __('constants.order_owner_mobile'),
            'address' => __('constants.address'),
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
