@extends('panel.layout.master',['title' => __('panel.notifications'),'is_active'=>'notifications'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">الاسئلة الشائعة</h5>
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
                                <select class="form-control " name="user_id[]" id="kt_select2_1" multiple>
                                    @foreach($users as $user)
                                        <option
                                            value="{{ $user->id }}">{{ $user->ssn_id . ' | ' . $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>العنوان
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="{{ 'title' }}" required/>
                            </div>

                            <div class="form-group ">
                                <label for="exampleTextarea">الوصف
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="3"
                                          name="{{ 'description' }}" required></textarea>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit" class="btn btn-primary mr-2 w-100">حفظ
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

    </script>
@endpush
