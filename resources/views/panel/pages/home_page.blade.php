@extends('panel.layout.master' , ['title' => __('panel.home_page') , 'is_active' => 'home_page'])




@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.home_page')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            {!! Form::open(['method'=>'PUT', 'url'=> url()->current() , 'to'=> url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}
            {{--{{method_field('PUT')}}--}}

            <div class="row">
                <div class="col-md-8">
                    <!--begin::Card-->

                    <div class="card card-custom">
                        <!--begin::Card header-->
                        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">

                                    <li class="nav-item mr-3">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                            <span class="nav-text font-size-lg">@lang('panel.slider')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                                            <span class="nav-text font-size-lg">@lang('panel.about_company')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                            <span class="nav-text font-size-lg">@lang('panel.why_us')</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-12 my-2">


                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">@lang('constants.image')</label>

                                                <div class="col-9">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_user_edit_avatar"
                                                         style="background-image: url('{{ $settings->valueOf('slider_image') ? image_url($settings->valueOf('slider_image')) :  image_url('avatar.png') }}')">
                                                        <div class="image-input-wrapper"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="Change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="slider_image" accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip" title="Cancel">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="remove" data-toggle="tooltip" title="Remove">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                            @foreach(locales() as $key => $locale)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.title') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="slider_title_{{$key}}"
                                                               type="text"
                                                               value="{{$settings->valueOf('slider_title_'.$key)}}"/>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.description') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="slider_description_{{$key}}" type="text"
                                                               value="{{$settings->valueOf('slider_description_'.$key)}}"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('panel.button_title') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="slider_button_title_{{$key}}" type="text"
                                                               value="{{$settings->valueOf('slider_button_title_'.$key)}}"/>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>

                                <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-12 my-2">


                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">@lang('constants.image')</label>

                                                <div class="col-9">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_user_edit_avatar"
                                                         style="background-image: url('{{ $settings->valueOf('about_company_image') ? image_url($settings->valueOf('about_company_image')) :  image_url('avatar.png') }}')">
                                                        <div class="image-input-wrapper"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="Change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="about_company_image" accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip" title="Cancel">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="remove" data-toggle="tooltip" title="Remove">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                            @foreach(locales() as $key => $locale)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.title') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="about_title_{{$key}}"
                                                               type="text"
                                                               value="{{$settings->valueOf('about_title_'.$key)}}"/>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.description') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="about_description_{{$key}}" type="text"
                                                               value="{{$settings->valueOf('about_description_'.$key)}}"/>
                                                    </div>
                                                </div>


                                            @endforeach


                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>

                                <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-12 my-2">


                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">@lang('constants.image')</label>

                                                <div class="col-9">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_user_edit_avatar"
                                                         style="background-image: url('{{ $settings->valueOf('why_us_image') ? image_url($settings->valueOf('why_us_image')) :  image_url('avatar.png') }}')">
                                                        <div class="image-input-wrapper"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="Change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="why_us_image" accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip" title="Cancel">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="remove" data-toggle="tooltip" title="Remove">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                            @foreach(locales() as $key => $locale)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.title') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="why_us_title_{{$key}}"
                                                               type="text"
                                                               value="{{$settings->valueOf('why_us_title_'.$key)}}"/>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-left text-right">
                                                        @lang('constants.description') ({{ $locale }})
                                                    </label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="why_us_description_{{$key}}" type="text"
                                                               value="{{$settings->valueOf('why_us_description_'.$key)}}"/>
                                                    </div>
                                                </div>


                                            @endforeach


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
                            <button type="submit" id="m_login_signin_submit"
                                    class="btn btn-primary mr-2 w-100">@lang('panel.save')
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
