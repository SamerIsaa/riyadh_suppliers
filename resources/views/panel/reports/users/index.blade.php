@extends('panel.layout.master',['title' => __('panel.user_reports'),'is_active'=>'reports'])

@push('panel_css')
@endpush


@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.user_reports')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">

            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card-body mt-2">

                    <div class="mb-7">
                        <div class="row align-items-center d-flex justify-content-between">
                            <div class="col-lg-4 col-xl-4">
                                <div class="row align-items-center">
                                    <div class="col-md-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control"
                                                   placeholder="@lang('constants.search')..."
                                                   id="kt_datatable_search_query"/>
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xl-4">
                                <select class="form-control kt-selectpicker" name="category_id"
                                        title="{{ __('panel.categories')  }}">
                                    <option value="">{{ __('constants.all')  }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name    }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-xl-4 my-2">
                                <input type="text" class="form-control" name="started_at" id="kt_datepicker_1" readonly
                                       placeholder="{{ __('panel.started_at')}}"/>
                            </div>
                            <div class="col-lg-4 col-xl-4 my-2">
                                <input type="text" class="form-control" name="ended_at" id="kt_datepicker_2" readonly
                                       placeholder="{{ __('panel.ended_at')}}"/>
                            </div>
                            <div class="col-lg-4 col-xl-4 my-2">
                            </div>


                        </div>
                    </div>

                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('panel_js')

    <script src="{{ asset('panelAssets/js/data-ajax.js') }}"></script>
    <script src="{{ asset('panelAssets/js/date-picker.js') }}"></script>

    <script>

        window.data_url = '{{route('panel.reports.user_reports.datatable')}}';
        window.columns = [
            {
                field: ' ',
                title: "#",
                textAlign: "center",
                template: function (data, index, datatable) {
                    return ((datatable.getCurrentPage() - 1) * datatable.getPageSize()) + index + 1;
                },
                width: 50,
            },
            {
                field: 'avatar',
                title: '@lang('constants.image')',
                selector: false,
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'ssn_id',
                title: '@lang('SSN ID')',
                selector: false,
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'name',
                title: '@lang('constants.full_name')',
                selector: false,
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'email',
                title: '@lang('constants.email')',
                selector: false,
                autoHide: false,
                textAlign: 'center',
            }, {
                field: 'mobile',
                title: '@lang('constants.mobile')',
                selector: false,
                textAlign: 'center',
                autoHide: false,
            },
            {
                field: 'total_payments',
                title: '@lang('panel.total_payments')',
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'total_subscription_arrears',
                title: '@lang('panel.total_subscription_arrears')',
                sortable: false,
                width: 120,
            },

        ];
    </script>


    <script>
        $('.kt-selectpicker').selectpicker();


        $('input[name=started_at]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'started_at');
        });
        $('input[name=ended_at]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'ended_at');
        });

        $('select[name=user_id]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'user_id');
        });
        $('select[name=category_id]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'category_id');
        });

    </script>

@endpush
