@extends('panel.layout.master',['title' => __('panel.bank_accounts'),'is_active'=>'banks'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.bank_accounts')</h5>
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


                            @foreach(locales() as $key => $value)

                                <div class="form-group">
                                    <label>@lang('panel.bank_name')
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="{{ 'bank_name_'.$key }}"
                                           value="{{isset($item)?@$item->translate($key)->bank_name:''}}" required/>
                                </div>
                            @endforeach

                                <div class="form-group">
                                    <label>
                                        {{trans('constants.full_name')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="owner_name"
                                           value="{{isset($item)?@$item->owner_name :''}}" placeholder=""
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label> IBAN<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="iban"
                                           value="{{isset($item)?@$item->iban :''}}" placeholder=""
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('constants.account_number')}}<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="number"
                                           value="{{isset($item)?@$item->number :''}}" placeholder=""
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('constants.swift')}}<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="soft"
                                           value="{{isset($item)?@$item->soft :''}}" placeholder=""
                                           required/>
                                </div>


                        </div>
                    </div>
                    <!--end::Card-->
                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit"
                                    class="btn btn-primary mr-2 w-100">@lang('panel.save')
                            </button>
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

    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script>
        // Class definition
        var KTSelect2 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "{{ __('panel.country') }}",
                    allowClear: true,
                });
            }

            return {
                init: function () {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTSelect2.init();
        });
    </script>
@endpush
