@extends('front.layout.master' , ['title' => __('landing.cart') , 'show_header' => true])

@push('front_css')
    <style>
        .btn-remove-cart {
            color: #FFF !important;
            background-color: #ef4444 !important;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .cart-summary {
            box-shadow: 5px 10px 30px rgba(43, 45, 52, 0.0509803922);
        }
        .cart-image {
            width: 96px;
            height: 80px;
        }
        .s-quantity-input-container {
            display: flex;
            height: 2.5rem;
            width: 130px;
            align-items: stretch;
            justify-content: space-around;
            border-radius: 0.375rem;
            border-width: 1px;
            font-size: .875rem;
            line-height: 1.25rem;
            border: 1px solid #eee;
        }
        .s-quantity-input-button {
            width: 2.75rem;
            color: #9ca3af;
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            transition-duration: 300ms;
            background-color: transparent;
        }
        .s-quantity-input-input {
            width: 3rem;
            border-width: 1px;
            border-top-width: 0;
            border-bottom-width: 0;
            border-left: 1px solid #e5e7eb;
            border-right: 1px solid #e5e7eb;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            text-align: center;
            font-weight: 700;
        }
        .s-quantity-input-input::-webkit-outer-spin-button,
        .s-quantity-input-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        .s-quantity-input-input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@section('content')

    @include('front.components.page_header' , ['title' => __('landing.cart')  ] )


    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($carts as $cart)
                        <div class="item-cart bg-white p-3 mb-3">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <a href="{{ route('front.products.show' , $cart->product_id) }}">
                                        <img class="rounded cart-image" src="{{ image_url($cart->product?->image , '96x80') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-auto col-lg">
                                    <div class="d-lg-flex align-items-center justify-content-between px-lg-2">
                                        <div class="d-flex flex-column">
                                            <h4 class="font-semi-bold">
                                                <a class="text-dark" href="{{ route('front.products.show' , $cart->product_id) }}">{{ $cart->product?->title }}</a>
                                            </h4>
                                            <h4 class="text-muted">{{ isset($cart->product?->offer_price) ? $cart->product?->offer_price : $cart->product?->price }} ر.س</h4>
                                        </div>
                                        <h5 class="font-semi-bold">@lang('constants.total'):
                                            {{ (isset($cart->product?->offer_price) ? $cart->product?->offer_price : $cart->product?->price) * $cart->quantity }} ر.س</h5>
                                    </div>
                                </div>
                                <div class="col-auto mt-3 mt-lg-0">
                                    <div class="d-flex align-items-center">
                                        <div class="s-quantity-input-container mx-3">
                                            <button class="add s-quantity-input-button"><i class="fa-solid fa-plus"></i></button>
                                            <input class="number s-quantity-input-input" name="qty" type="number" value="{{ $cart->quantity }}">
                                            <button class="minus s-quantity-input-button"><i class="fa-solid fa-minus"></i></button>
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
                        <h5 class="mb-3 font-bold">ملخص الطلب</h5>
                        <div class="d-flex align-items-center justify-content-between py-2">
                            <h5 class="text-muted">ملمجموع المنتجات</h5>
                            <h5 class="text-black">17.39 ر.س</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-2">
                            <h4 class="text-muted">الإجمالي</h4>
                            <h4 class="text-black">0 ر.س</h4>
                        </div>
                        <button class="btn btn-primary w-100 mt-4">اتمام الطلب</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('front_js')
    <script src="{{ asset('frontAssets/js/post.js') }}"></script>
    <script>
        $(".minus,.add").on("click", function () {
            var $qty = $(this).closest(".s-quantity-input-container").find(".number"),
                currentVal = parseInt($qty.val()),
                isAdd = $(this).hasClass("add");
            !isNaN(currentVal) && $qty.val(isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal);
        });
    </script>
@endpush
