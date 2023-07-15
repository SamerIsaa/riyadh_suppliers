@extends('panel.layout.master',['title' => __('panel.categories'),'is_active'=>'categories'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.categories')</h5>
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

                    <div class="card card-custom gutter-b ">

                        <!--begin::Form-->
                        <div class="card-body">


                            @foreach(locales() as $key => $value)

                                <div class="form-group">
                                    <label>{{  __('constants.name') }} ({{ __($value) }} )<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="{{ 'name_'.$key }}"
                                           value="{{isset($item)?@$item->translate($key)->name:''}}"
                                           required/>
                                </div>

                            @endforeach


                        </div>
                    </div>




                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit"
                                    class="btn btn-primary mr-2 w-100">{{  __('constants.save') }}</button>
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
@endpush
