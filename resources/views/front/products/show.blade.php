@extends('front.layout.master' , ['title' => __('landing.products') ])

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

                                            @foreach($images as $image)
                                                <div class="swiper-slide">
                                                    <div class="slider__image"><img
                                                            src="{{ image_url($image['file_name']) }}" alt=""/></div>
                                                </div>
                                            @endforeach


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

                                            @foreach($images as $image)

                                                <div class="swiper-slide">
                                                    <div class="slider__image"><img
                                                            src="{{ image_url($image['file_name']) }}" alt=""/></div>
                                                </div>
                                            @endforeach

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

                    <button class="btn btn-primary w-100 font-bold rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#Modal">
                        {{ __('landing.request_pricing') }}
                    </button>

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
