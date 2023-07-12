@extends('panel.layout.master',['title' => __('panel.properties'),'is_active'=>'properties'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.properties')</h5>
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


                    <div class="card card-custom gutter-b ">

                        <!--begin::Form-->
                        <div class="card-body">


                            <div id="kt_repeater_1">
                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                    <label class="col-lg-2 col-form-label">{{ __('panel.options') }}</label>
                                    <div data-repeater-list="options" class="col-lg-10">
                                        @if (isset($item) && isset($item->options))
                                            @foreach($item->options as $option)
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <input type="hidden" name="id" value="{{ $option->id }}">
                                                    @foreach(locales() as $key => $value)

                                                        <div class="col-md-5">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__control">
                                                                    <input type="text" class="form-control length"
                                                                           value="{{@$option->translate($key)->name}}"
                                                                           name="{{ 'name_'.$key }}"
                                                                           placeholder="{{  __('constants.name') . "( " . __($value). " )" }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none kt-margin-b-10"></div>
                                                        </div>


                                                    @endforeach



                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-delete=""
                                                           class="btn-sm btn btn-light-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            {{__('constants.delete')}}
                                                        </a>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="form-group row align-items-center">

                                                @foreach(locales() as $key => $value)

                                                    <div class="col-md-5">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                <input type="text" class="form-control length" value=""
                                                                       name="{{ 'name_'.$key }}"
                                                                       placeholder="{{  __('constants.name') . "( " . __($value). " )" }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>


                                                @endforeach




                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete=""
                                                       class="btn-sm btn btn-light-danger btn-bold">
                                                        <i class="la la-trash-o"></i>
                                                        {{__('constants.delete')}}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <label class="col-lg-2 col-form-label"></label>
                                    <div class="col-lg-4">
                                        <a href="javascript:;"  data-repeater-create=""
                                           class="btn btn-bold btn-sm btn-light-primary btn-add-new-prod">
                                            <i class="la la-plus"></i> {{__('constants.add')}}
                                        </a>
                                    </div>
                                </div>
                            </div>


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
    <script src="{{asset('panelAssets/js/repeater.js')}}"></script>
    <script src="{{asset('panelAssets/js/form-repeater.js')}}"></script>

@endpush
