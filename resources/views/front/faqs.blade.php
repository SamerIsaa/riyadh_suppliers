@extends('front.layout.master' , ['title' => __('landing.faqs') , 'show_header' => true])


@section('content')

    @include('front.components.page_header' , ['title' => __('landing.faqs')] )


    <!-- start:: section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0"><img src="{{ asset('frontAssets/images/image-faq.png') }}" alt=""/></div>
                <div class="col-lg-6">
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
    <!-- end:: section -->

@endsection
