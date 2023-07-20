<?php

namespace App\Http\Requests\Front;


use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {

        return [
            'old_password' => 'required',
            'password' => 'required|string|confirmed|min:8|different:old_password'
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => __('panel.old_password'),
            'password' => __('panel.new_password'),
            'password_confirmation' => __('constants.password_confirmation'),
        ];
    }

}
