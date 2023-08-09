<div class="col-lg-8">
    @foreach($carts as $cart)
        <div class="item-cart bg-white p-3 mb-3">
            <div class="row gx-2 align-items-center">
                <div class="col-auto">
                    <a href="{{ route('front.products.show' , $cart->product_id) }}">
                        <img class="rounded cart-image"
                             src="{{ image_url($cart->product?->image , '96x80') }}" alt=""/>
                    </a>
                </div>
                <div class="col-auto col-lg">
                    <div class="d-lg-flex align-items-center justify-content-between px-lg-2">
                        <div class="d-flex flex-column">
                            <h4 class="font-semi-bold">
                                <a class="text-dark"
                                   href="{{ route('front.products.show' , $cart->product_id) }}">{{ $cart->product?->title }}</a>
                            </h4>
                            <h4 class="text-muted">{{ isset($cart->product?->offer_price) ? $cart->product?->offer_price : $cart->product?->price }}
                                ر.س</h4>
                        </div>
                        <h5 class="font-semi-bold">@lang('constants.total'):
                            {{ $cart->final_price }}
                            ر.س</h5>
                    </div>
                </div>
                <div class="col-auto mt-3 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="s-quantity-input-container mx-3">
                            <button class="add s-quantity-input-button"><i class="fa-solid fa-plus"></i>
                            </button>
                            <input type="hidden" name="cart_update_url"
                                   value="{{ route('front.cart.update' , $cart->id) }}">
                            <input class="number s-quantity-input-input" name="qty" type="number"
                                   min="0" value="{{ $cart->quantity }}">
                            <button class="minus s-quantity-input-button"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <button class="btn btn-remove-cart">
                            <i class="fa-solid fa-xmark"> </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
<div class="col-lg-4">

    <div class="cart-summary bg-white p-4">
        <h5 class="mb-3 font-bold">{{ __('landing.order_summary') }}</h5>
        <div class="d-flex align-items-center justify-content-between py-2">
            <h5 class="text-muted">@lang('landing.total_products')</h5>
            <h5 class="text-black">{{ $carts->sum('final_price') }} ر.س</h5>
        </div>
        <div class="d-flex align-items-center justify-content-between py-2">
            <h4 class="text-muted">@lang('landing.final_total')</h4>
            <h4 class="text-black">{{ $carts->sum('final_price') }} ر.س</h4>
        </div>
        <button class="btn btn-primary w-100 mt-4" id="confirm_order">@lang('landing.confirm_order')</button>
    </div>
</div>
