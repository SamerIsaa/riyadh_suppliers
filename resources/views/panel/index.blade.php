@extends('panel.layout.master' , ['title' => __('translate.app_name') , 'is_active' => 'home'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('main')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')
    <!--begin::Content-->
{{--    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">--}}
{{--        <!--begin::Subheader-->--}}
{{--        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">--}}
{{--            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">--}}
{{--                <!--begin::Info-->--}}
{{--                <div class="d-flex align-items-center flex-wrap mr-2">--}}
{{--                    <!--begin::Page Title-->--}}
{{--                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('vendors.dashboard')</h5>--}}
{{--                    <!--end::Page Title-->--}}
{{--                </div>--}}
{{--                <!--end::Info-->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--end::Subheader-->--}}
{{--        <!--begin::Entry-->--}}

{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}


{{--                <div class="col-lg-6 col-xl-3 mb-5">--}}
{{--                    <div class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center p-5">--}}
{{--                                <div class="mr-6">--}}
{{--<span class="svg-icon svg-icon-7x svg-icon-primary svg-icon-2x">--}}
{{--    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg--}}
{{--        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--        viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--        <path--}}
{{--            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"--}}
{{--            fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"--}}
{{--            fill="#000000" fill-rule="nonzero"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon-->--}}
{{--</span>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-column">--}}
{{--                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">--}}
{{--                                        @lang('panel.all_users')--}}
{{--                                    </a>--}}
{{--                                    <div class="text-dark-75 font-size-h1">--}}
{{--                                        {{@$users_count}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-xl-3 mb-5">--}}
{{--                    <div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center p-5">--}}
{{--                                <div class="mr-6">--}}
{{--                                <span class="svg-icon svg-icon-success svg-icon-7x svg-icon-2x">--}}
{{--                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                     viewBox="0 0 484.184 484.184" style="enable-background:new 0 0 484.184 484.184;"--}}
{{--                                     xml:space="preserve">--}}
{{--                                <g>--}}
{{--                                    <path d="M309.43,219.944c-19-10.5-39.2-18.5-59.2-26.8c-11.6-4.8-22.7-10.4-32.5-18.2c-19.3-15.4-15.6-40.4,7-50.3--}}
{{--                                        c6.4-2.8,13.1-3.7,19.9-4.1c26.2-1.4,51.1,3.4,74.8,14.8c11.8,5.7,15.7,3.9,19.7-8.4c4.2-13,7.7-26.2,11.6-39.3--}}
{{--                                        c2.6-8.8-0.6-14.6-8.9-18.3c-15.2-6.7-30.8-11.5-47.2-14.1c-21.4-3.3-21.4-3.4-21.5-24.9c-0.1-30.3-0.1-30.3-30.5-30.3--}}
{{--                                        c-4.4,0-8.8-0.1-13.2,0c-14.2,0.4-16.6,2.9-17,17.2c-0.2,6.4,0,12.8-0.1,19.3c-0.1,19-0.2,18.7-18.4,25.3c-44,16-71.2,46-74.1,94--}}
{{--                                        c-2.6,42.5,19.6,71.2,54.5,92.1c21.5,12.9,45.3,20.5,68.1,30.6c8.9,3.9,17.4,8.4,24.8,14.6c21.9,18.1,17.9,48.2-8.1,59.6--}}
{{--                                        c-13.9,6.1-28.6,7.6-43.7,5.7c-23.3-2.9-45.6-9-66.6-19.9c-12.3-6.4-15.9-4.7-20.1,8.6c-3.6,11.5-6.8,23.1-10,34.7--}}
{{--                                        c-4.3,15.6-2.7,19.3,12.2,26.6c19,9.2,39.3,13.9,60,17.2c16.2,2.6,16.7,3.3,16.9,20.1c0.1,7.6,0.1,15.3,0.2,22.9--}}
{{--                                        c0.1,9.6,4.7,15.2,14.6,15.4c11.2,0.2,22.5,0.2,33.7-0.1c9.2-0.2,13.9-5.2,13.9-14.5c0-10.4,0.5-20.9,0.1-31.3--}}
{{--                                        c-0.5-10.6,4.1-16,14.3-18.8c23.5-6.4,43.5-19,58.9-37.8C386.33,329.544,370.03,253.444,309.43,219.944z"/>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                <g>--}}
{{--                                </g>--}}
{{--                                </svg>--}}
{{--                                </span>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-column">--}}
{{--                                    <a href="#"--}}
{{--                                       class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">--}}
{{--                                        {{ __('constants.total_income') }}--}}
{{--                                    </a>--}}
{{--                                    <div class="text-dark-75 font-size-h1">--}}
{{--                                        {{@$total_incomes}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-xl-3 mb-5">--}}
{{--                    <div class="card card-custom wave wave-animate wave-warning mb-8 mb-lg-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center p-5">--}}
{{--                                <div class="mr-6">--}}
{{--                                    <span class="svg-icon svg-icon-success svg-icon-7x svg-icon-2x">--}}
{{--                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                         viewBox="0 0 484.184 484.184"--}}
{{--                                         style="enable-background:new 0 0 484.184 484.184;" xml:space="preserve">--}}
{{--                                    <g>--}}
{{--                                        <path d="M309.43,219.944c-19-10.5-39.2-18.5-59.2-26.8c-11.6-4.8-22.7-10.4-32.5-18.2c-19.3-15.4-15.6-40.4,7-50.3--}}
{{--                                            c6.4-2.8,13.1-3.7,19.9-4.1c26.2-1.4,51.1,3.4,74.8,14.8c11.8,5.7,15.7,3.9,19.7-8.4c4.2-13,7.7-26.2,11.6-39.3--}}
{{--                                            c2.6-8.8-0.6-14.6-8.9-18.3c-15.2-6.7-30.8-11.5-47.2-14.1c-21.4-3.3-21.4-3.4-21.5-24.9c-0.1-30.3-0.1-30.3-30.5-30.3--}}
{{--                                            c-4.4,0-8.8-0.1-13.2,0c-14.2,0.4-16.6,2.9-17,17.2c-0.2,6.4,0,12.8-0.1,19.3c-0.1,19-0.2,18.7-18.4,25.3c-44,16-71.2,46-74.1,94--}}
{{--                                            c-2.6,42.5,19.6,71.2,54.5,92.1c21.5,12.9,45.3,20.5,68.1,30.6c8.9,3.9,17.4,8.4,24.8,14.6c21.9,18.1,17.9,48.2-8.1,59.6--}}
{{--                                            c-13.9,6.1-28.6,7.6-43.7,5.7c-23.3-2.9-45.6-9-66.6-19.9c-12.3-6.4-15.9-4.7-20.1,8.6c-3.6,11.5-6.8,23.1-10,34.7--}}
{{--                                            c-4.3,15.6-2.7,19.3,12.2,26.6c19,9.2,39.3,13.9,60,17.2c16.2,2.6,16.7,3.3,16.9,20.1c0.1,7.6,0.1,15.3,0.2,22.9--}}
{{--                                            c0.1,9.6,4.7,15.2,14.6,15.4c11.2,0.2,22.5,0.2,33.7-0.1c9.2-0.2,13.9-5.2,13.9-14.5c0-10.4,0.5-20.9,0.1-31.3--}}
{{--                                            c-0.5-10.6,4.1-16,14.3-18.8c23.5-6.4,43.5-19,58.9-37.8C386.33,329.544,370.03,253.444,309.43,219.944z"/>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    <g>--}}
{{--                                    </g>--}}
{{--                                    </svg>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-column">--}}
{{--                                    <a href="#"--}}
{{--                                       class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">--}}
{{--                                        {{ __('constants.total_expense') }}--}}
{{--                                    </a>--}}
{{--                                    <div class="text-dark-75 font-size-h1">--}}
{{--                                        {{@$total_expense}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-xl-3 mb-5">--}}
{{--                    <div class="card card-custom wave wave-animate wave-danger mb-8 mb-lg-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center p-5">--}}
{{--                                <div class="mr-6">--}}
{{--<span class="svg-icon svg-icon-success svg-icon-7x svg-icon-2x">--}}
{{--    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg--}}
{{--        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--        viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--        <path--}}
{{--            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"--}}
{{--            fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"--}}
{{--            fill="#000000" fill-rule="nonzero"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-column">--}}
{{--                                    <a href="#"--}}
{{--                                       class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">--}}
{{--                                        {{ __('constants.new_users') }}--}}
{{--                                    </a>--}}
{{--                                    <div class="text-dark-75 font-size-h1">--}}
{{--                                        {{@$new_users}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="col-lg-12 col-xl-12">--}}
{{--                    <!--begin::Card-->--}}
{{--                    <div class="card card-custom card-custom gutter-t">--}}
{{--                        <div class="card-header py-3">--}}
{{--                            <div class="card-title">--}}
{{--                                <h3 class="card-label">{{ __('constants.last_bank_transfers') }}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <!--begin: Datatable-->--}}
{{--                            <table class="table table-separate table-head-custom table-checkable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>@lang('panel.user')</th>--}}
{{--                                    <th>@lang('panel.bank_account')</th>--}}
{{--                                    <th>@lang('panel.sender_name')</th>--}}
{{--                                    <th>@lang('panel.sender_bank')</th>--}}
{{--                                    <th>@lang('panel.sender_iban')</th>--}}
{{--                                    <th>@lang('panel.sender_account_no')</th>--}}
{{--                                    <th>@lang('panel.amount')</th>--}}
{{--                                 </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($last_bank_transfers as $last_bank_transfer)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{@$last_bank_transfer->user->name}}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->bankAccount->bank_name . ' | ' . $last_bank_transfer->bankAccount->iban }}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->name }}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->bank }}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->iban }}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->account_no }}</td>--}}
{{--                                            <td>{{@$last_bank_transfer->amount }}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <!--end: Datatable-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Card-->--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
    <!--end::Entry-->


@endsection

@push('panel_js')
    <script src="{{ asset('panelAssets/js/widgets.js') }}"></script>

@endpush
