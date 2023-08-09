<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\PasswordRequest;
use App\Http\Requests\Front\ProfileRequest;
use App\Model\Order;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile()
    {
        $data['user'] = auth()->user();
        return view('front.user.profile', $data);
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        return $this->response_api(true, __('messages.done_successfully'));
    }

    public function passwordIndex()
    {
        return view('front.user.password');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        $user = auth()->user();
        if (Hash::check($request->old_password, $user->getAuthPassword())) {
            $user->password = Hash::make($request->password);
            $user->save();
            return $this->response_api(true, __('messages.done_successfully'));
        }
        return $this->response_api(false, __('messages.invalid_old_password'));
    }


    public function ordersIndex()
    {
        $user = auth()->user();
        $data['orders'] = Order::query()->where('user_id' , $user->id)->with('items.product.translations')->get();
        return view('front.user.orders' , $data);
    }
}
