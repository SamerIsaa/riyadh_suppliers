<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data['carts'] = Cart::query()->where('user_id', $user->id)->with('product.translations')->get();
        return view('front.user.cart',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ],[],[
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


        return $this->response_api(true , __('messages.cart_added_successfully'));

    }

}
