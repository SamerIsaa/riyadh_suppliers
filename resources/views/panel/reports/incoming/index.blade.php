@extends('panel.layout.master',['title' => __('panel.incoming_reports'),'is_active'=>'reports'])

@push('panel_css')
@endpush


@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.incoming_reports')</h5>
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
                                <select class="form-control " name="user_id" id="kt_select2_1" title="{{ __('panel.users')  }}">
                                    <option value="">{{ __('constants.all')  }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->ssn_id . ' | ' . $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-xl-4">
                                <select class="form-control kt-selectpicker" name="category_id" title="{{ __('panel.categories')  }}">
                                    <option value="">{{ __('constants.all')  }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name    }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-xl-4 my-3">
                                <select class="form-control kt-selectpicker" name="payment_method" title="{{ __('constants.payment_method')  }}">
                                    <option value="">{{ __('constants.all')  }}</option>
                                    <option value="cash">{{ __('constants.cash')  }}</option>
                                    <option value="bank_transfer">{{ __('constants.bank_transfer')  }}</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-xl-4 my-2">
                                <input type="text" class="form-control" name="started_at" id="kt_datepicker_1" readonly placeholder="{{ __('panel.started_at')}}" />
                            </div>
                            <div class="col-lg-4 col-xl-4 my-2">
                                <input type="text" class="form-control" name="ended_at" id="kt_datepicker_2" readonly placeholder="{{ __('panel.ended_at')}}" />
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
        window.data_url = '{{route('panel.reports.incoming_reports.datatable')}}';
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
                field: 'user',
                title: '@lang('panel.user')',
                selector: false,
                textAlign: 'center',
                class: "d-flex justify-content-center",
                width: 100,
            },
            {
                field: 'category',
                title: "@lang('panel.category')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'status',
                title: "@lang('constants.status')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'amount',
                title: "@lang('panel.amount')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'options',
                title: '@lang('constants.actions')',
                sortable: false,
                overflow: 'visible',
                width: 120,
            }];

    </script>

    <script>
        $('.kt-selectpicker').selectpicker();

        // Class definition
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

    <script>

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
        $('select[name=payment_method]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'payment_method');
        });
    </script>

@endpush
