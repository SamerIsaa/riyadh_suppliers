@extends('panel.layout.master',['title' => __('panel.site_sliders'),'is_active'=>'sliders'])

@section('content')
    @php
        $item = isset($item) ? $item: null;
    @endphp
    <!--begin::Container-->
    <div class="container">
        {!! Form::open(['method'=>isset($item) ? 'PUT' : 'POST', 'url'=> url()->current() , 'to'=> route('panel.sliders.all.index') ,  'class'=>'form-horizontal','id'=>'form','files'=>true]) !!}
        <div class="row">
            <div class="col-lg-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{{__('panel.site_sliders')}}</h3>

                    </div>

                    <div class="card-body">


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">{{__('constants.image')}}</label>

                            <div class="col-md-9">
                                <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                                     style="background-image: url('{{ isset($item) ? image_url($item->image) :  asset('panelAssets/images/placeholder.png') }}')">
                                    <div class="image-input-wrapper"></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
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


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">{{__('constants.mobile_image')}}</label>

                            <div class="col-md-9">
                                <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                                     style="background-image: url('{{ isset($item) ? image_url($item->mobile_image) :  asset('panelAssets/images/placeholder.png') }}')">
                                    <div class="image-input-wrapper"></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="mobile_image" accept=".png, .jpg, .jpeg"/>
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


                        @foreach(locales() as $key=>$language)


                            <div class="form-group row">
                                <label
                                    class="col-md-2 col-form-label">{{__('panel.title')}}  {{ " ( $language ) " }}</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text"
                                           name="title_{{$key}}"
                                           placeholder="{{__('panel.title')}}  {{ " ( $language ) " }}"
                                           value="{{isset($item)?@$item->translate($key)->title:''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                       class="col-md-2 col-form-label">{{ __('panel.content') }}  {{ " ( $language ) " }}</label>
                                <div class="col-md-10">
                                <textarea class="form-control" name="content_{{$key}}"
                                          placeholder="{{__('panel.content')}}  {{ " ( $language ) " }}"
                                          rows="3">{{isset($item)?@$item->translate($key)->content:''}}</textarea>
                                </div>
                            </div>

                        @endforeach


                    </div>

                </div>
                <!--end::Card-->

            </div>

            <div class="col-md-4">

                <div class="card card-custom gutter-b">
                    <div class="card-footer">
                        <button type="submit" id="m_login_signin_submit" class="btn btn-primary mr-2 w-100">{{  __('constants.save') }}</button>
                    </div>
                </div>
            </div>


        </div>
        {!! Form::close() !!}
    </div>
    <!--end::Container-->
@stop

@push('panel_js')

    <script src="{{asset('panelAssets/js/post.js')}}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>

@endpush
