@extends('panel.layout.master' , ['title' => __('panel.appointments'),'is_active'=>'appointments'])


@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            {!! Form::open(['method'=>'PUT', 'url'=> url()->current() , 'to'=> url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}

            <div class="row">
                <div class="col-md-8">
                    <!--begin::Card-->

                    <div class="card card-custom">

                        <div class="card-body">
                            <div class="tab-content">

                                <div class="card-body">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-12 my-2">

                                            @foreach(locales() as $key => $locale)
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-left">
                                                    @lang('panel.appointments_title') ({{ $locale }})
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           name="appointments_title_{{$key}}"  placeholder="@lang('panel.appointments_desc') ({{ $locale }})"
                                                           type="text" value="{{$settings->valueOf('appointments_title_' . $key)}}"
                                                            required/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-left">
                                                    @lang('panel.appointments_desc') ({{ $locale }})
                                                </label>
                                                <div class="col-9">
                                                    <textarea class="form-control form-control-lg form-control-solid"
                                                              name="appointments_desc_{{$key}}"  placeholder="@lang('panel.appointments_desc') ({{ $locale }})"
                                                              required>{{$settings->valueOf('appointments_desc_' . $key)}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-left text-right">
                                                    @lang('panel.worktime') ({{ $locale }})
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           name="worktime_{{$key}}" placeholder="@lang('panel.worktime') ({{ $locale }})"
                                                           type="text" value="{{$settings->valueOf('worktime_' . $key)}}"
                                                            required/>
                                                </div>
                                            </div>

                                            @endforeach




                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-left text-right">
                                                    @lang('panel.phone')
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           name="appointments_phone" placeholder=" @lang('panel.phone')"
                                                           type="text" value="{{$settings->valueOf('appointments_phone')}}" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-left text-right">
                                                    @lang('panel.email')
                                                </label>
                                                <div class="col-9">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           name="appointments_email" placeholder=" @lang('panel.email')"
                                                           type="text" value="{{$settings->valueOf('appointments_email')}}"  required/>
                                                </div>
                                            </div>







                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>

                            </div>
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--end::Card-->
                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit" class="btn btn-primary mr-2 w-100">@lang('panel.save')
                            </button>
                        </div>
                    </div>

                </div>

            </div>


        {!! Form::close() !!}

        <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


@endsection

@push('panel_js')

        <script src="{{ asset('panelAssets/js/post.js') }}"></script>

@endpush
