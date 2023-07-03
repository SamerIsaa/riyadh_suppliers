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


                            <div class="form-group">
                                <label>@lang('panel.users')<span class="text-danger">*</span></label>
                                <select class="form-control " name="user_id" id="kt_select2_1">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->ssn_id . ' | ' . $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>@lang('panel.categories')<span class="text-danger">*</span></label>
                                <select class="form-control kt-selectpicker" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name    }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('constants.type') }}<span class="text-danger">*</span></label>
                                <select class="form-control kt-selectpicker" name="type">
                                    <option value="income">{{ __('constants.income') }}</option>
                                    <option value="expense">{{ __('constants.expense') }}</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>{{ __('panel.amount')}}<span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" name="amount"
                                       placeholder="{{ __('panel.amount')}}"
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
        $('.kt-selectpicker').selectpicker();

        // Class definition
        var KTSelect2 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "{{ __('panel.users') }}",
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

        $(document).on('change' , 'select[name=type]' , function (){
             if ($(this).val() == "expense"){
                 $('#kt_select2_1').attr('disabled' , 1);
             }else{
                 $('#kt_select2_1').attr('disabled' , !1);
             }
        });
    </script>
@endpush
