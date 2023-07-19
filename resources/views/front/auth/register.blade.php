@extends('front.layout.master' , ['title' => __('auth.create_new_account'), 'show_header' => false])


@section('content')

    <section class="section section-login py-0">
        <div class="row gx-lg-0">
            <div class="col-lg-4 mx-auto py-4 ps-lg-5 px-4">
                <div class="logo mb-5"><img src="{{ asset('frontAssets/images/logo-dark.png') }}" alt=""/></div>
                <h2 class="section-title font-bold text-primary mb-4">@lang('auth.create_new_account')</h2>
                <form class="form-wizard" id="form-signup" action="{{ url()->current() }}" method="post">
                    <h2><span class="step-number"></span></h2>
                    <section>
                        <div class="inner">
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.company_name')</h5>
                                <input class="form-control" type="text" name="company_name"/>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.owner_name')</h5>
                                <input class="form-control" type="text" name="owner_name"/>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.owner_mobile')</h5>
                                <div class="input-icon icon-left">
                                    <input class="form-control" type="text" name="mobile_number"/>
                                    <input type="hidden" name="dial_code" value="+966">
                                    <div class="icon d-flex align-items-center">
                                        <h5 class="text-primary font-bold me-1">+966</h5><img
                                            src="{{ asset('frontAssets/images/svg/flag-sudia.svg') }}" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.commercial_registration_no')</h5>
                                <input class="form-control" type="text" name="commercial_registration_no"/>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.tax_no')</h5>
                                <input class="form-control" type="text" name="tax_no"/>
                            </div>
                        </div>
                    </section>
                    <h2><span class="step-number"></span></h2>
                    <section>
                        <div class="inner">
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.order_owner_name')</h5>
                                <input class="form-control" type="text" name="order_owner_name"/>
                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.order_owner_mobile')</h5>
                                <div class="input-icon icon-left">
                                    <input class="form-control" type="text" name="order_owner_mobile_number"/>
                                    <input type="hidden" name="order_owner_dial_code" value="+966">
                                    <div class="icon d-flex align-items-center">
                                        <h5 class="text-primary font-bold me-1">+966</h5><img
                                            src="{{ asset('frontAssets/images/svg/flag-sudia.svg') }}" alt=""/>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <h5 class="mb-2">@lang('constants.address')</h5>
                                <textarea class="form-control" rows="4" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <h5> @lang('constants.password')</h5>
                                <div class="input-icon icon-left">
                                    <input class="form-control" type="password" name="password"/>
                                    <div class="icon pointer toggle-pass"><i class="fa-solid fa-eye"></i></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
                <div class="form-group text-center mt-3">
                    <h5>
                        @lang('auth.have_account')<a class="font-bold"
                                                     href="{{ route('front.auth.login') }}">@lang('panel.login') </a>
                    </h5>
                </div>
            </div>
            <div class="col-lg-7 bg-login"
                 style="background: url('{{ asset('frontAssets/images/bg-login.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="row h-100 d-flex align-items-end">
                    <div class="col-lg-11">
                        <h2 class="title-login text-white font-bold py-lg-5 px-lg-5 p-4">@lang('landing.auth_desc')</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('front_js')

    <script>

        stepsWizard = $("#form-signup").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "fade",
            autoFocus: true,
            transitionEffectSpeed: 500,
            titleTemplate: '<div class="title">#title#</div>',
            labels: {
                next: `التالي`,
                current: "التالي",
                finish: "انشاء حساب جديد",
                previous: `Previous`,
            },
            onStepChanged: function (event, currentIndex, newIndex) {
                if (currentIndex == 0) {
                    // $('.actions ul li:first-child').fadeOut(0)
                }
                return true;
            },
            onFinished: function (event, currentIndex) {
                //- $('#form-signup').submit()
                submitForm();
            },
        });

        function submitForm() {
            let form = $('#form-signup');
            var formData = new FormData(form[0]);
            var url = form.attr('action');
            var redirectUrl = null;
            var _method = form.attr('method');
            var save_btn = $(form).find('a[role=menuitem]');

            save_btn.attr("disabled", !0)
            $.ajax({
                "url": url,
                "type": _method,
                "data": formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {

                    if (isJson(response)) {
                        response = jQuery.parseJSON(response);
                    }
                    save_btn.attr("disabled", !1);

                    if (response.redirectUrl) {
                        redirectUrl = response.redirectUrl;
                    }
                    if (response.status) {
                        customToasterAlert(response.status, response.message, function (event) {
                            if (redirectUrl) {
                                window.location = redirectUrl
                            } else {
                                location.reload();
                            }
                        });
                    } else {
                        customToasterAlert(false, response.message);
                    }


                },
                error: function (jqXhr) {
                    save_btn.attr("disabled", !1);
                    getErrors(jqXhr, '/');
                }
            });


        }


        function isJson(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
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

    </script>
 @endpush
