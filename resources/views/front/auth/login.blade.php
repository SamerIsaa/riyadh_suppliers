@extends('front.layout.master' , ['title' => __('panel.login'), 'show_header' => false])


@section('content')

    <section class="section section-login py-0">
        <div class="row gx-lg-0">
            <div class="col-lg-4 mx-auto py-4 ps-lg-5 px-4 wow fadeInUp" data-wow-delay="0.1s"
                 data-wow-duration="1500ms">
                <div class="logo mb-5">
                    <img src="{{ asset('frontAssets/images/logo-dark.png') }}" alt=""/>
                </div>
                <h2 class="section-title font-bold text-primary mb-4">@lang('panel.login')</h2>
                <form action="{{ url()->current() }}" method="post" id="form">
                    @csrf
                    <div class="form-group">
                        <h5 class="mb-2">@lang('constants.mobile')</h5>
                        <div class="input-icon icon-left">
                            <input class="form-control" type="text" name="mobile_number"/>
                            <input type="hidden" name="dial_code" value="+966">

                            <div class="icon d-flex align-items-center">
                                <h5 class="text-primary font-bold me-1">+966</h5>
                                <img src="{{ asset('frontAssets/images/svg/flag-sudia.svg') }}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="mb-2"> @lang('constants.password')</h5>
                        <div class="input-icon icon-left">
                            <input class="form-control" type="password" name="password"/>
                            <div class="icon pointer toggle-pass"><i class="fa-solid fa-eye"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="font-bold text-end"><a href="">@lang('auth.forget_password') </a></h5>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100 font-bold rounded-pill">@lang('panel.login')</button>
                    </div>
                    <div class="form-group text-center">
                        <h5>
                            @lang('auth.dont_have_account')
                            <a href="{{ route('front.auth.register') }}"> @lang('auth.create_new_account')</a>
                        </h5>
                    </div>
                </form>
            </div>
            <div class="col-lg-7 bg-login"
                 style="background: url('{{ asset('frontAssets/images/bg-login.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="row h-100 d-flex align-items-end">
                    <div class="col-lg-11 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                        <h2 class="title-login text-white font-bold py-lg-5 px-lg-5 p-4">@lang('landing.auth_desc')</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('front_js')
    <script src="{{ asset('frontAssets/js/post.js') }}"/>
@endpush
