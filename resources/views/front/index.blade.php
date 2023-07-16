@extends('front.layout.master' , ['title' => __('landing.home')  , 'active' =>'home'])

@section('content')

    <!-- start:: section -->
    <section class="section section-home"
             style="background: url('{{ $settings->valueOf('slider_image') ? image_url($settings->valueOf('slider_image')) : asset('frontAssets/images/bg-home.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="home-content text-center">
                        <h1 class="text-white mb-3 font-bold home-title px-lg-4 wow fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1500ms">
                            {{ $settings->valueOf('slider_title_' . $locale) }}
                        </h1>
                        <h3 class="text-white mb-3 mb-lg-5 home-text wow fadeInUp" data-wow-delay="0.2s"
                            data-wow-duration="1500ms">
                            {{ $settings->valueOf('slider_description_' . $locale) }}
                        </h3>
                        <div class="home-action wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <a class="btn btn-primary rounded-pill font-bold" href="{{ route('front.products.index') }}">
                                {{ $settings->valueOf('slider_button_title_' . $locale) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: section -->
    <!-- start:: section -->
    <section class="section section-about" id="section-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <img src="{{ image_url($settings->valueOf('about_company_image')) }}" alt=""/>
                </div>
                <div class="col-lg-6 wow fadeInUp ps-lg-5" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <h6 class="entry-title font-bold">{{ __('panel.about_company') }}</h6>
                    <h2 class="section-title font-bold mb-2">{{ $settings->valueOf('about_title_' . $locale) }} </h2>
                    <h4>{{ $settings->valueOf('about_description_' . $locale) }}</h4>
                </div>
            </div>
        </div>
    </section><!-- end:: section -->
    <!-- start:: section -->
    <section class="section section-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp pe-lg-5 mb-4 mb-lg-0" data-wow-delay="0.2s"
                     data-wow-duration="1500ms">
                    <h6 class="entry-title">{{ __('panel.why_us') }}</h6>
                    <h2 class="section-title font-bold mb-2">{{ $settings->valueOf('why_us_title_' . $locale) }}</h2>
                    <h4>{{ $settings->valueOf('why_us_description_' . $locale) }}</h4>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <img src="{{ image_url($settings->valueOf('why_us_image')) }}" alt=""/>
                </div>
            </div>
        </div>
    </section><!-- end:: section -->
    <!-- start:: section -->
    @if(isset($services) && $services->count())
        <section class="section section-service" id="section-service">
            <div class="container">
                <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="col-lg-5 mx-auto text-center">
                        <h6 class="entry-title mb-2">{{ __('landing.our_services') }}</h6>
                        <h2 class="section-title font-bold mb-2">{{ __('landing.our_services_desc') }}</h2>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">

                    @foreach($services as $service)
                        <div class="col-lg-3 col-md-6 h-100 mb-4 mb-lg-0">
                            <div class="widget_item-service bg-white h-100">
                                <div class="widget_item-icon d-inline-flex align-items-center justify-content-center"><a
                                        href="">
                                        <img src="{{ image_url($service->image) }}" alt=""/></a>
                                </div>
                                <div class="widget__item-content">
                                    <h3 class="widget_item-title mb-3 font-bold"><a href="">{{ $service->title }}</a>
                                    </h3>
                                    <h6 class="text-muted mb-4 pb-lg-2 widget_item-desc">{{ str_limit(strip_tags($service->description) , 100 ) }}</h6>
                                    <h5 class="font-bold"><a class="text-primary"
                                                             href="">{{ __('constants.read_more') }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- end:: section -->
    <!-- start:: section -->
    @if(isset($offers) && $offers->count())
        <section class="section" id="offers">
            <div class="container">
                <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="section-title font-bold mb-2">{{ __('landing.last_offers') }}</h2>
                            <a class="btn btn-primary rounded-pill"
                               href="{{ route('front.products.index' , ['is-offer' => true]) }}">
                                {{ __('landing.show_all') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">

                    @foreach($offers as $offer)
                        @include('front.components.product' , ['item' => $offer])
                    @endforeach

                </div>
            </div>
        </section>

    @endif
    <!-- end:: section -->
    <!-- start:: section -->

    @if(isset($sliders) && $sliders->count())
        <section class="section bg-primary py-5">
            <div class="container wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="slider-product wow fadeInUp position-relative" data-wow-delay="0.1s"
                     data-wow-duration="1500ms">
                    <div class="swiper-container swiper-product">
                        <div class="swiper-wrapper py-4">
                            @foreach($sliders as $slider)
                                <div class="swiper-slide">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8 mb-4 mb-lg-0">
                                            <div class="image text-center"><img
                                                    src="{{ image_url($slider->image) }}" alt=""/></div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <h2 class="h1 text-white font-bold lh-sm mb-3">{{ $slider->title }}</h2>
                                                <h6 class="text-white">{{ $slider->content }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="text-center">
                        <div class="swiper--pagination"></div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between action-swiper">
                        <div class="swiper-prev text-white"><i class="fa-solid fa-chevron-right fa-xl"></i></div>
                        <div class="swiper-next text-white"><i class="fa-solid fa-chevron-left fa-xl"></i></div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!-- end:: section -->
    <!-- start:: section -->
    @if(isset($products) && $products->count())
        <section class="section" id="products">
            <div class="container">
                <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="section-title font-bold mb-2">{{ __('landing.products') }}</h2>
                            <a class="btn btn-primary rounded-pill"
                               href="{{ route('front.products.index') }}">{{ __('landing.show_all') }}</a>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    @foreach($products as $product)
                        @include('front.components.product' , ['item' => $product])
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- end:: section -->
    <!-- start:: section -->
    <section class="section section-contct">
        <div class="container">
            <div class="content-contact">
                <div class="row align-items-end">
                    <div class="col-lg-4 wow fadeInUp mb-4 mb-lg-0" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h6 class="entry-title font-bold mb-2">{{ __('landing.contact_us') }}</h6>
                        <h2 class="section-title font-bold text-white">{{ __('landing.contact_us_desc') }}</h2>
                    </div>
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                        <form action="{{ route('front.contacts.store') }}" method="post" id="form">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input class="form-control rounded-pill bg-transparent" type="text"
                                               name="name" placeholder="{{ __('constants.name') }}"/>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input class="form-control rounded-pill bg-transparent" type="email"
                                               name="email" placeholder="{{ __('constants.email') }}"/>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <button class="btn btn-primary rounded-pill">{{ __('constants.send') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end:: section -->
    <!-- start:: section -->
    @if(isset($faqs) && $faqs->count() )
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp mb-4 mb-lg-0" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <img src="{{ asset('frontAssets/images/image-faq.png') }}" alt=""/></div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                        <h6 class="entry-title font-bold mb-2">{{ __('landing.faqs') }}</h6>
                        <h2 class="section-title font-bold mb-4">{{ __('landing.faq_desc') }}</h2>
                        <div class="accordion" id="accordion">
                            @foreach($faqs as $faq)
                                <div class="widget__item-faq">
                                    <div
                                        class="widget__item-head d-flex align-items-center justify-content-between collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{$faq->id}}">
                                        <h5 class="widget__item-title font-bold">{{ $faq->title }}</h5><i
                                            class="fa-solid fa-plus"></i>
                                    </div>
                                    <div class="collapse accordion-collapse widget__item-body"
                                         id="collapse-{{$faq->id}}" data-bs-parent="#accordion">
                                        <div class="widget__item-content">
                                            <h5 class="text-muted">{!!  $faq->description  !!}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end:: section -->

@endsection

@push('front_js')
    <script src="{{ asset('frontAssets/js/post.js') }}"></script>
@endpush
