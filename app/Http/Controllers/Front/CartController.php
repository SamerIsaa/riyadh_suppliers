<?php

namespace App\Http\Controllers\Front;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data['carts'] = Cart::query()->where('user_id', $user->id)->with('product.translations')->get();
        return view('front.user.cart', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ], [], [
            'product_id' => __('landing.product'),
            'quantity' => __('landing.quantity'),
        ]);


        $data['user_id'] = auth()->id();
        $data['product_id'] = $request->get('product_id', 1);
        $data['quantity'] = $request->get('quantity', 1);

        Cart::query()->updateOrCreate([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
        ], [
            'quantity' => $data['quantity'],
        ]);


        return $this->response_api(true, __('messages.cart_added_successfully'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ], [], [
            'quantity' => __('landing.quantity'),
        ]);

        $user = auth()->user();
        $cart = Cart::query()->where('user_id', $user->id)->find($id);
        if (!$cart) {
            return $this->response_api(false, __('messages.not_found'), StatusCodes::NOT_FOUND);
        }

        $cart->update(['quantity' => $request->get('quantity')]);

        $data['carts'] = Cart::query()->where('user_id', $user->id)->with('product.translations')->get();
        $html = view('front.user.partials.cart_container', $data)->render();

        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    public function confirm()
    {
        $user = auth()->user();
        $carts = Cart::query()->where('user_id', $user->id)->get();
        if (!$carts->count()) {
            return $this->response_api(false, StatusCodes::VALIDATION_ERROR, __('messages.empty_cart'));
        }
        DB::beginTransaction();

        try {

            $order = Order::query()->create([
                'user_id' => $user->id
            ]);

            foreach ($carts as $cart) {
                OrderItem::query()->create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'init_price' => $cart->getProductPrice()
                ]);

                $cart->delete();
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
