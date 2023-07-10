@extends('panel.layout.master',['title' => __('panel.clients'),'is_active'=>'users'])
@push('panel_css')
    <link rel="stylesheet" href="{{ asset('panelAssets/css/intlTelInput.min.css') }}">
@endpush
@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.clients')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')
    @php
        $item = isset($item) ? $item: null;
    @endphp
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            {!! Form::open(['method'=>isset($item) ? 'PUT' : 'POST', 'url'=> url()->current() , 'to'=> url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}

            <div class="row">
                <div class="col-md-8">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b ">

                        <!--begin::Form-->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('constants.company_name')<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang('constants.company_name')" name="company_name"
                                               value="{{@$item->company_name }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.email')
                                            <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="@lang('constants.email')"
                                               name="email"
                                               value="{{@$item->email}}" required/>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.owner_name')
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang('constants.owner_name')" name="owner_name"
                                               value="{{@$item->owner_name}}" required/>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.mobile')
                                            <span class="text-danger">*</span></label>

                                        <div class="tel-input-container">
                                            <div class="inputBox">
                                                <div class="inputBox-icon">
                                                    <i class="icon icon-call"></i>
                                                </div>
                                                <input type="text"
                                                       class="form-control custom-input phone-input-wrapper phone-input1"
                                                       id="phoneNumber1"
                                                       dir="ltr" name="mobile_number" value="{{@$item->mobile_number}}">
                                                <input type="hidden" name="dial_code" value="{{@$item->dial_code}}">
                                                <input type="hidden" name="mobile_country_code" value="{{@$item->mobile_country_code ?? "auto"}}">
                                                <span class="line"></span>
                                            </div>
                                            <span id="error-msg" class="hide" style=""></span>
                                        </div>


                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.commercial_registration_no')
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang('constants.commercial_registration_no')"
                                               name="commercial_registration_no"
                                               value="{{@$item->commercial_registration_no}}" required/>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.tax_no')
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="@lang('constants.tax_no')"
                                               name="tax_no"
                                               value="{{@$item->tax_no}}" required/>
                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.order_owner_name')
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang('constants.order_owner_name')" name="order_owner_name"
                                               value="{{@$item->order_owner_name}}" required/>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.order_owner_mobile')
                                            <span class="text-danger">*</span></label>


                                        <div class="tel-input-container">
                                            <div class="inputBox">
                                                <div class="inputBox-icon">
                                                    <i class="icon icon-call"></i>
                                                </div>
                                                <input type="text"
                                                       class="form-control custom-input phone-input-wrapper phone-input"
                                                       id="phoneNumber"
                                                       dir="ltr" name="order_owner_mobile_number" value="{{ @$item->order_owner_mobile_number }}">
                                                <input type="hidden" name="order_owner_dial_code" value="{{ @$item->order_owner_dial_code }}">
                                                <input type="hidden" name="order_owner_country_code" value="{{ @$item->order_owner_country_code }}">
                                                <span class="line"></span>
                                            </div>
                                            <span id="error-msg" class="hide" style=""></span>
                                        </div>

                                     </div>

                                </div>


                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>@lang('constants.address')
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control" placeholder="@lang('constants.address')"
                                                  name="address" required>{{@$item->address}}</textarea>
                                    </div>

                                </div>


                            </div>



                            <div class="form-group">
                                <label>@lang('constants.password')
                                    @if(!isset($item))
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <input type="password" class="form-control" placeholder="@lang('constants.password')"
                                       name="password"/>
                            </div>

                        </div>
                    </div>
                    <!--end::Card-->
                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2 w-100">@lang('constants.save')</button>
                        </div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}

        </div>
        <!--end::Container-->
    </div>

@endsection

@push('panel_js')

    <script type="text/javascript" src="{{ asset('panelAssets/js/intlTelInput.min.js') }}"></script>

    <script>
        initializeTeleInput(".phone-input", true);
        initializeTeleInput(".phone-input1", true);

        function initializeTeleInput(input_identifier, form_has_countries_select = false) {
            var input = document.querySelector(input_identifier);
            if (input) {
                let country_code =$(input).closest('.inputBox').find('input[name=mobile_country_code]').val() ?? $(input).closest('.inputBox').find('input[name=order_owner_country_code]').val();

                var iti = window.intlTelInput(input, {
                    initialCountry: country_code,
                    geoIpLookup: function (success, failure) {
                        $.get("https://ipinfo.io", function () {
                        }, "jsonp").always(function (resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "us";
                            success(countryCode);

                            if (form_has_countries_select) {
                                $(`select option[data-code=${countryCode.toLowerCase()}]`).attr('selected', true);
                                $(".counrtySelect").select2();
                            }
                        });
                    },
                    nationalMode: false,
                    autoHideDialCode: true,
                    separateDialCode: true,
                    utilsScript: "{{ asset('panelAssets/js/tel_input/utils.js') }}",
                });

                input.addEventListener("countrychange", function () {
                    $(input).closest('.inputBox').find('input[name=dial_code]').val(iti.getSelectedCountryData().dialCode)
                    $(input).closest('.inputBox').find('input[name=order_owner_dial_code]').val(iti.getSelectedCountryData().dialCode)
                    $(input).closest('.inputBox').find('input[name=mobile_country_code]').val(iti.getSelectedCountryData().iso2)
                    $(input).closest('.inputBox').find('input[name=order_owner_country_code]').val(iti.getSelectedCountryData().iso2)
                });

                input.addEventListener('keyup', function () {
                    var errorMsg = $(input).closest('.tel-input-container').find('#error-msg');
                    reset(input, errorMsg);
                    if (input.value.trim()) {
                        if (iti.isValidNumber()) {
                            $(errorMsg).removeClass("hide");
                        } else {
                            $(input).addClass("error");
                            var errorCode = iti.getValidationError();
                            if (errorCode == -99) {
                                errorCode = 5;
                            }
                            $(errorMsg).text(errorMap[errorCode]);
                            $(errorMsg).removeClass("hide");
                        }
                    }
                });
            }
            if (form_has_countries_select) {
                $(document).on('change', 'select[name=country_id]', function () {
                    var code = $(this).find('option:selected').attr('data-code');
                    iti.setCountry(code)
                })
            }
        }

        var errorMap;
        if (window.locale == "ar") {
            errorMap = [
                "رقم الجوال لايتوافق مع الدولة المختارة",
                "رمز الدولة غير صالح",
                "رقم الجوال قصير جداً بالنسبة الدولة المختارة",
                "رقم الجوال طويل جداً بالنسبة الدولة المختارة",
                "رقم الجوال لايتوافق مع الدولة المختارة",
                "صيغة رقم الهاتف خاطئة",
            ];
        } else {
            errorMap = [
                "Invalid number",
                "Invalid country code",
                "Too short",
                "Too long",
                "Invalid number",
                "Wrong phone number format",
            ];
        }

        var reset = function (input, errorMsg) {
            $(input).removeClass("error");
            $(errorMsg).html("");
            $(errorMsg).addClass("hide");
            $("button[type=submit]").prop("disabled", false);
        };
    </script>


    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>
@endpush
