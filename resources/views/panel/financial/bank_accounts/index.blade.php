@extends('panel.layout.master',['title' => __('panel.bank_accounts'),'is_active'=>'financial'])

@push('panel_css')
@endpush


@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.bank_accounts')</h5>
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
                            <div class="col-lg-4 col-xl-4 d-flex justify-content-end">
                                <a href="{{ route('panel.banks-accounts.create.index') }}"
                                   class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<i class="fa fa-plus"></i>
											</span>@lang('panel.add')
                                </a>
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
        window.data_url = '{{route('panel.banks-accounts.datatable')}}';
        window.columns = [
            {
                field: ' ',
                title: "#",
                width: 80,
                textAlign: "center",
                template: function (data, index, datatable) {
                    return ((datatable.getCurrentPage() - 1) * datatable.getPageSize()) + index + 1;
                },
            },
            {
                field: 'bank_name',
                title: '@lang('panel.bank_name')',
                selector: false,
                textAlign: 'center',
                class: "d-flex justify-content-center",
                width: 100,
            },
            {
                field: 'owner_name',
                title: "@lang('constants.full_name')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'number',
                title: "@lang('constants.account_number')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'iban',
                title: "@lang('vendors.iban')",
                textAlign: "center",
                width: 200,
            },
            {
                field: 'swift',
                title: "@lang('constants.swift')",
                textAlign: "center",
                width: 200,
            },
            {
                field: 'active',
                title: "@lang('constants.status')",
                textAlign: "center",
                width: 200,
            },
            {
                field: 'options',
                title: '@lang('constants.actions')',
                sortable: false,
                overflow: 'visible',
                width: 120,
            }];

    </script>


@endpush
