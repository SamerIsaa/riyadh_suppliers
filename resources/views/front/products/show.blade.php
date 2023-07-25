@extends('front.layout.master' , ['title' => __('landing.products') , 'show_header' => true])
@push('front_css')
    <style>
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
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
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

        .btn-add-cart {
            background-color: #EF3250;
            color: #FFF;
            padding: 12px 10px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 16px;
            transition: all .2s ease-in-out;
        }

        .btn-add-cart:hover {
            background-color: #ce2742;
            color: #FFF;
        }

        .btn-add-fav {
            width: 40px;
            height: 40px;
            border: 1px solid #cdcdcd;
            background-color: #FFF;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #000;
            transition: all .2s ease-in-out;
        }

        .btn-add-fav:hover {
            background-color: #EF3250;
            color: #FFF;
        }
    </style>

@endpush
@section('content')
    @include('front.components.page_header' , ['title' => __('landing.products') , 'main_route' => route('front.products.index') , 'sub_title' => @$item->title ])

    <section class="section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="slider mb-3">
                        <div class="slider__flex">
                            <div class="slider__col">
                                <div class="slider__thumbs">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="slider__image"><img
                                                        src="{{ image_url($item['image']) }}" alt=""/></div>
                                            </div>

                                            @if(isset($images))
                                                @foreach($images as $image)
                                                    <div class="swiper-slide">
                                                        <div class="slider__image"><img
                                                                src="{{ image_url($image['file_name']) }}" alt=""/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider__images">
                                <div class="slider__images">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="slider__image"><img
                                                        src="{{ image_url($item['image']) }}" alt=""/></div>
                                            </div>

                                            @if(isset($images))
                                                @foreach($images as $image)

                                                    <div class="swiper-slide">
                                                        <div class="slider__image"><img
                                                                src="{{ image_url($image['file_name']) }}" alt=""/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 px-lg-4 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <div class="d-flex align-items-center mb-2">
                        <h4>{{ __('constants.product_number') }} :</h4>
                        <div class="bg-light-primary px-4 pt-2 rounded-pill font-medium text-primary pb-1 ms-4">
                            {{ $item->number }}
                        </div>
                    </div>
                    <h2 class="font-bold section-title mb-3">{{ $item->title }}</h2>
                    <h5 class="font-medium mb-4">{{ $item->short_description }}</h5>
                    <div class="d-flex align-items-center mb-5 pb-lg-4">
                        <h4 class="me-2">{{__('constants.price')}} :</h4>
                        @if(isset($item->offer_price) && $item->offer_price > 0)
                            <h3 class="font-bold text-primary">{{ $item->offer_price }}  {{ __('landing.r.s') }}</h3>
                            <h4 class="text-muted ms-2 widget_item-oldPrice">{{ __('landing.instead_of') }} {{ $item->price }} {{ __('landing.r.s') }}</h4>
                        @else
                            <h3 class="font-bold text-primary">{{ $item->price }}  {{ __('landing.r.s') }}</h3>
                        @endif
                    </div>

                    @if(auth()->check())
                        <div class="mb-3">
                            <label class="font-bold mb-2">@lang('landing.pricing')</label>
                            <div class="s-quantity-input-container">
                                <button class="add s-quantity-input-button"><i class="fa-solid fa-plus"></i></button>
                                <input class="number s-quantity-input-input" name="qty" type="number" value="1">
                                <button class="minus s-quantity-input-button"><i class="fa-solid fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <div class="col">
                                <button class="btn-add-cart w-100">@lang('landing.add_to_cart')</button>
                            </div>
                            <div class="col-auto ms-2">
                                <button class="btn-add-fav"><i class="fa-regular fa-heart"></i></button>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>


    <!-- start:: section -->
    <section class="section pb-4 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-bold text-primary border-bottom pb-3 mb-3">{{ __('panel.product_description') }}</h2>
                </div>
                <div class="col-lg-8">
                    {!! $item->description !!}
                </div>
            </div>
        </div>
    </section>
    <!-- end:: section -->
    <!-- start:: section -->
    @if(isset($similar_products) && $similar_products->count())
        <section class="section pt-4">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="font-bold">{{ __('landing.similar_products') }}</h2>
                    </div>
                </div>
                <div class="row">

                    @foreach($similar_products as $similar_product)
                        @include('front.components.product' , ['item' => $similar_product])
                    @endforeach

                </div>
            </div>
        </section>

    @endif


    <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border rounded-30">
                <div class="modal-body p-5 text-center">
                    <div class="mb-4"><img src="{{ asset('frontAssets/images/svg/check.svg') }}" alt=""/></div>
                    <h3 class="font-bold">{{ __('landing.request_pricing_sended') }}</h3>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('front_js')
    <script>
        $(".minus,.add").on("click", function () {
            var $qty = $(this).closest(".s-quantity-input-container").find(".number"),
                currentVal = parseInt($qty.val()),
                isAdd = $(this).hasClass("add");
            !isNaN(currentVal) && $qty.val(isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal);
        });


        $(document).on('click', '.btn-add-cart', function (e) {
            e.preventDefault();
            let qty = $('input[name=qty]').val() ?? 1;
            $.ajax({
                url: "{{ route('front.cart.store') }}",
                method: "POST",
                data: {
                    "product_id": "{{ $item->id }}",
                    "quantity": qty,
                },
                success: function (response) {
                    customToasterAlert(response.status, response.message);

                },
                error: function (jqXhr) {
                    getErrors(jqXhr, '/');
                }
            })
        })


        function getErrors(jqXhr, path) {
            // hideLoader();
            switch (jqXhr.status) {
                case 401 :
                    $(location).prop('pathname', path);
                    break;
                case 400 :
                    customSweetAlert(
                        'error',
                        jqXhr.responseJSON.message,
                        ''
                    );
                    break;
                case 422 :
                    (function ($) {
                        var $errors = jqXhr.responseJSON.errors;
                        var errorsHtml = '<ul style="list-style-type: none">';
                        $.each($errors, function (key, value) {
                            errorsHtml += '<li style="font-family: \'Droid Arabic Kufi\' !important">' + value[0] + '</li>';
                        });
                        errorsHtml += '</ul>';
                        customToasterAlert(false, (window.errorMessage ?? window.error_message) + errorsHtml);

                    })(jQuery);

                    break;
                default:
                    errorCustomSweet();
                    break;
            }
            return false;
        }

        function isJson(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }

    </script>
@endpush
