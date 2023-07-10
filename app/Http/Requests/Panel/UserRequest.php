<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $id;
     public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('add_users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->request = reArrangeTeleinputData(request());
        $this->request = reArrangeOwnerTeleinputData(request());

        return [
//            'ssn_id' => 'required|numeric|unique:users,ssn_id,' . $this->id,
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->id,

            'owner_name' => 'required|string|max:255',
            'mobile' => 'required|numeric|unique:users,mobile,' . $this->id,

            'order_owner_name' => 'required|string|max:255',
            'order_owner_mobile' => 'required|numeric|unique:users,order_owner_mobile,' . $this->id,
            'commercial_registration_no' => 'required|string|max:255',
            'tax_no' => 'required|string|max:255',
            'address' => 'required|string' ,
            'password' => 'required_unless:_method,PUT|nullable|min:8',
        ];

    }

    public function attributes()
    {
        return [
            'company_name' => __('constants.company_name'),
            'email' => __('constants.email'),
            'owner_name' => __('constants.owner_name'),
            'mobile' => __('constants.mobile'),
            'order_owner_mobile' => __('constants.order_owner_mobile'),
            'commercial_registration_no' => __('constants.commercial_registration_no'),
            'tax_no' => __('constants.tax_no'),
            'address' => __('constants.address'),
        ];
    }
}
