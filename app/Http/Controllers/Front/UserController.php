<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\OrderRequest;
use App\Http\Requests\Front\PasswordRequest;
use App\Http\Requests\Front\ProfileRequest;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

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
        $data['orders'] = Order::query()->where('user_id' , $user->id)->with('products')->get();
        return view('front.user.order.index' , $data);
    }
    public function ordersCreate()
    {
        return view('front.user.order.create');
    }
    public function ordersStore(OrderRequest $request)
    {

        DB::beginTransaction();

        try {

            $order = Order::query()->create([
                'user_id' => auth()->id()
            ]);

            $items = $request->get('items' , []);
            foreach ($items as $item) {
                $item['order_id'] = $order->id;
                OrderProduct::query()->create($item);
            }
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => __('messages.done_successfully'),
                'redirect_url' => route('front.profile.orders.index'),
            ]);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->response_api(false, $exception->getCode(), __('messages.error'));
        }
    }
}
