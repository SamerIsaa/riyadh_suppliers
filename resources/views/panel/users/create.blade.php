@extends('panel.layout.master',['title' => __('panel.clients'),'is_active'=>'users'])

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
                                        <label>@lang('constants.name')<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="@lang('constants.name')" name="name"
                                               value="{{@$item->name}}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.email')
                                            <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="@lang('constants.email')" name="email"
                                               value="{{@$item->email}}" required/>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('constants.company_name')<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="@lang('constants.company_name')" name="company_name"
                                               value="{{@$item->company_name}}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>@lang('constants.owner_name')
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="@lang('constants.owner_name')" name="owner_name"
                                               value="{{@$item->owner_name}}" required/>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <div class="form-group">
                                <label>@lang('constants.ssn_id')<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('constants.name')" name="ssn_id"
                                       value="{{@$item->ssn_id}}" required/>
                            </div>






{{--                            <div class="form-group">--}}
{{--                                <label>@lang('constants.mobile')<span class="text-danger">*</span></label>--}}
{{--                                <input type="text" class="form-control" placeholder="@lang('constants.mobile')" name="mobile"--}}
{{--                                       value="{{@$item->mobile}}" required/>--}}
{{--                            </div>--}}


                            <div class="form-group">
                                <label>@lang('constants.password')
                                    @if(!isset($item))
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <input type="password" class="form-control" placeholder="@lang('constants.password')" name="password"/>
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
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>
@endpush
