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
                                <input type="text" class="form-control" name="number"
                                       value="{{isset($item)?@$item->number :''}}"
                                       required/>
                            </div>

                            @foreach(locales() as $key => $value)

                                <div class="form-group">
                                    <label>{{  __('constants.title') }} ({{ __($value) }} )<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="{{ 'title_'.$key }}"
                                           value="{{isset($item)?@$item->translate($key)->title:''}}"
                                           required/>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleTextarea">{{  __('constants.short_description') }}
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3"
                                              name="{{ 'short_description_'.$key }}"
                                              required>{{ isset($item)?@$item->translate($key)->short_description : '' }}</textarea>
                                </div>


                                <div class="form-group ">
                                    <label for="exampleTextarea">{{  __('constants.description') }}
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" id="kt_summernote_1" rows="3"
                                              name="{{ 'description_'.$key }}"
                                              required>{{ isset($item)?@$item->translate($key)->description : '' }}</textarea>
                                </div>

                            @endforeach

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{  __('constants.price') }}<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="price" value="{{isset($item)?@$item->price :''}}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{  __('constants.offer_price') }}</label>
                                        <input type="number" class="form-control" name="offer_price" value="{{isset($item)?@$item->offer_price :''}}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row" id="images_type">
                                <label class="col-md-2 col-form-label">{{__('constants.images')}}</label>

                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">{{__('constants.drag_files_or_click_to_upload')}}</h3>
                                            <span class="dropzone-msg-desc">{{__('constants.ten_max_files_upload')}}</span>
                                        </div>
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
    <script src="{{ asset('panelAssets/js/summernote.js') }}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>

    <script>

        @if(isset($images))
            window.images = JSON.parse('{!! json_encode(@$images , true) !!}');
        @else
            window.images = [];
        @endif
            Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone('#kt_dropzone_2', {
            url: "{{ route('upload.image') }}",
            paramName: "image",
            maxFilesize: 4, // MB
            acceptedFiles: "image/*,application/pdf",
            addRemoveLinks: true,
            autoProcessQueue: false,
            dictRemoveFile: '<i class="fas fa-trash"></i>',
            parallelUploads: 1,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            init: function () {
                this.on("success", function (file, response, formData) {
                    file.previewElement.classList.add("dz-success");
                    window.images.push(response);

                });
                this.on("error", function (file, response, formData) {
                    file.previewElement.classList.add("dz-error");
                });
                this.on("removedfile", function (file, response, formData) {
                    file.previewElement.remove();
                    removeFile(file);
                });
            },
            accept: function (file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
        });

        function removeFile(file) {
            var name = file.name;

            if (window.images !== undefined && window.images.length > 0) {
                window.images.forEach(function (currentValue, index, arr) {
                    if (name === currentValue.file_name) {
                        window.images.splice(index, 1);
                        console.log(window.images)
                    }
                });
            }
        }


        if (window.images.length > 0) {

            for (var i = 0; i <= window.images.length - 1; i++) {
                var file = {name: window.images[i].file_name, size: window.images[i].size, id: window.images[i].id};
                myDropzone.options.addedfile.call(myDropzone, file);
                myDropzone.options.thumbnail.call(myDropzone, file, '/image/150x150/' + window.images[i].file_name);
                myDropzone.emit("complete", file);
            }
        }

        $(document).on('click', '#m_login_signin_submit', function (e) {
            e.preventDefault();
            if (myDropzone.getQueuedFiles().length) {
                myDropzone.processQueue();
            } else {
                $('#form').submit();
            }
        });

        myDropzone.on("success", function (file) {


            if (myDropzone.getQueuedFiles().length) {
                myDropzone.processQueue();
            } else {
                $('#form').submit();
            }
        });

    </script>

@endpush
