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
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">

                <!--begin::Layout-->
                <div class="flex-row-fluid ml-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body p-0">
                            <!-- begin: Invoice-->

                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="pl-0 text-center font-weight-bold text-muted text-uppercase">@lang('landing.product')</th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">@lang('landing.result')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 0 ; $i < count($list) ; $i += 2 )
                                                <tr class="font-weight-boldest ">
                                                    <td class=" pl-0 pt-7  text-center">
                                                        {{ @$list[$i] }}
                                                    </td>
                                                    <td class="text-center pt-7 align-middle">

                                                        @if(isset($list[$i+1]))

                                                            {{@$list[$i+1]}}
                                                        @endif
                                                    </td>


                                                </tr>

                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- end: Invoice body-->


                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Page Layout-->
        </div>
        <!--end::Container-->
    </div>

@endsection


