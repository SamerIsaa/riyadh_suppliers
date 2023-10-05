@extends('front.layout.master' , ['title' => __('landing.create_order') , 'show_header' => true])


@section('content')

    @include('front.components.page_header' , ['title' => __('panel.profile')  ] )


    <section class="section">
        <div class="container">
            <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="col-12">
                    <h2 class="section-title font-bold">@lang('landing.create_order')</h2>
                </div>
            </div>
            <div class="row">
                @include('front.user.partials.sidebar' , ['sub_active' => 'orders'])
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <div class="box-shadow p-4 p-lg-5 rounded-15">
                        <div id="app">
                            <create-order :action="'{{ url()->current() }}'"></create-order>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @vite('resources/js/app.js')

@endsection

@push('front_js')
    <script src="{{ asset('frontAssets/js/post.js') }}"/>
@endpush