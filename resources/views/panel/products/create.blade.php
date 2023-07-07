@extends('panel.layout.master',['title' => __('panel.products'),'is_active'=>'products'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.products')</h5>
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

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">@lang('constants.image')</label>

                                    <div class="col-9">
                                        <div class="image-input image-input-empty image-input-outline"
                                             id="kt_user_edit_avatar"
                                             style="background-image: url('{{ isset($item) ? image_url(@$item->image) :  image_url('avatar.png') }}')">
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

                            </div>

                            <div class="form-group">
                                <label>{{  __('constants.product_number') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="number" value="{{isset($item)?@$item->number :''}}"
                                       required/>
                            </div>

                        @foreach(locales() as $key => $value)

                                <div class="form-group">
                                    <label>{{  __('constants.title') }} ({{ __($value) }} )<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="{{ 'title_'.$key }}" value="{{isset($item)?@$item->translate($key)->title:''}}"
                                           required/>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleTextarea">{{  __('constants.description') }}
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" id="kt_summernote_1" rows="3"
                                              name="{{ 'description_'.$key }}" required>{{ isset($item)?@$item->translate($key)->description : '' }}</textarea>
                                </div>


                            @endforeach


                        </div>
                    </div>

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
    </div>

@endsection

@push('panel_js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script src="{{ asset('panelAssets/js/summernote.js') }}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>
@endpush
