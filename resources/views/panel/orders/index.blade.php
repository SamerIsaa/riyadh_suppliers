@extends('panel.layout.master',['title' => __('panel.orders'),'is_active'=>'orders'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.orders')</h5>
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
            <div class="card card-custom">

                <div class="card-body mt-2">

                    <div class="mb-7">
                        <div class="row align-items-center d-flex justify-content-between">
                            <div class="col-lg-4 col-xl-4">
                                <div class="row align-items-center">
                                    <div class="col-md-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="@lang('constants.search')..."
                                                   id="kt_datatable_search_query"/>
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        window.data_url = '{{route('panel.orders.data')}}';
        window.columns = [
            {
                field: ' ',
                title: "#",
                width: 30,
                textAlign: "center",
                template: function (data, index, datatable) {
                    return ((datatable.getCurrentPage() - 1) * datatable.getPageSize()) + index + 1;
                },
            },
            {
                field: 'user_name',
                title: '{{ __('panel.user') }}',
                sortable: false,
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'status',
                title: '{{ __('constants.status') }}',
                sortable: false,
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'total',
                title: '{{ __('constants.total') }}',
                sortable: false,
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'created_at',
                title: '{{ __('constants.created_at') }}',
                sortable: false,
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'options',
                title: '{{ __('constants.actions') }}',
                sortable: false,
                overflow: 'visible',
                autoHide: false,
                width: 120,
            }
        ];

    </script>


@endpush
