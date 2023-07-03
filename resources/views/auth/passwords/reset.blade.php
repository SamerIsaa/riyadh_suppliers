<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head>
    <link href="{{ asset('panelAssets/css/login-3.css') }}" rel="stylesheet" type="text/css"/>
    @include('panel.layout.head')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="login-logo text-center pt-lg-25 pb-10">
                    <img src="{{ asset('panel/images/logo.png') }}" class="max-h-70px" alt=""/>
                </a>
                <!--end::Aside header-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
                 style="background-position-y: calc(100% + 5rem); background-image: url('{{ asset('panelAssets/svg/login-visual-5.svg') }}')"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column p-10">

            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="kt-form" id="kt_reset_password_form" method="POST"
                          action="{{ route('password.update') }}">
                    @csrf
                    <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                                {{trans('auth.reset_password')}}
                            </h3>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <input type="hidden" name="token" value=" {{ $token }} ">
                        <input type="hidden" name="ssn" value=" {{ @$ssn }} ">
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">   {{trans('panel.email')}}</label>
                            <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="email" name="email"
                                   autocomplete="off" value="{{ $email }}"/>

                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label
                                    class="font-size-h6 font-weight-bolder text-dark pt-5">  {{trans('panel.password')}}</label>
                            </div>
                            <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password"
                                   id="password"
                                   name="password" autocomplete="off"/>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label
                                    class="font-size-h6 font-weight-bolder text-dark pt-5">   {{trans('panel.password_confirmation')}} </label>
                            </div>
                            <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password"
                                   name="password_confirmation" autocomplete="off"/>
                        </div>


                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                {{trans('auth.reset_password')}}
                            </button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>

{{--@include('panel.layouts.scripts')--}}
@include('panel.layout.scripts')

<script src="{{ asset('panelAssets/js/login-3.js') }}"></script>

</body>
<!--end::Body-->
</html>
