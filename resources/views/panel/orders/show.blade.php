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
                            <!-- begin: Invoice header-->
                            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                        <h1 class="display-4 font-weight-boldest mb-10">@lang('landing.order_details')</h1>

                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <!--begin::Logo-->

                                            <div class="form-group">
                                                <label for="exampleSelect1">@lang('constants.status')</label>
                                                <select class="form-control selectpicker status_operation" name="status"
                                                        title="@lang('constants.status')">

                                                    @foreach($statuses as $status)
                                                        <option
                                                            value="{{ $status }}" {{ isset($item) && @$item->status ==$status ? 'selected' :'' }} >
                                                            {{ __('landing.order_statuses.'.$status) }}
                                                        </option>

                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="border-bottom w-100"></div>
                                    <div class="d-flex justify-content-between pt-6">
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">@lang('landing.order_date')</span>
                                            <span class="opacity-70">{{ format_date($item->created_at) }}</span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">@lang('landing.order_no').</span>
                                            <span class="opacity-70">{{ "#$item->id" }}</span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">@lang('panel.user')</span>
                                            <span class="opacity-70">{{ $item->user->owner_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="pl-0 font-weight-bold text-muted text-uppercase">@lang('landing.product')</th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">@lang('landing.quantity')</th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">@lang('constants.init_price')</th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">@lang('constants.final_price')</th>
                                                <th class="text-center pr-0 font-weight-bold text-muted text-uppercase">@lang('landing.final_total')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->items as $order_item)
                                                <tr class="font-weight-boldest">
                                                    <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                            <div class="symbol-label"
                                                                 style="background-image: url('{{image_url($order_item->product->image)}}')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        {{ @$order_item->product->title }}
                                                    </td>
                                                    <td class="text-center pt-7 align-middle">{{ $order_item->quantity }}</td>
                                                    <td class="text-center pt-7 align-middle">{{ $order_item->init_price }} @lang('landing.r.s')</td>
                                                    <td class="text-center pt-7 align-middle mx-4">

                                                        <div class="d-flex justify-content-center">
                                                            <input class="form-control w-150px" type="number"
                                                                   name="final_price"
                                                                   value="{{ $order_item->final_price }}">
                                                            <button type="button"
                                                                    class="btn btn-primary font-weight-bold mx-2 save_final_price"
                                                                    data-url="{{route('panel.orders.updateFinalPrice' , [$item->id , $order_item->id ])}}">@lang('constants.save')</button>
                                                        </div>

                                                    </td>
                                                    <td class="text-primary pr-0 pt-7 text-right align-middle">{{ $order_item->getFinalPrice() ? $order_item->getFinalPrice() . " " . __('landing.r.s') : __('landing.order_not_determined')  }}</td>
                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- end: Invoice body-->
                            <!-- begin: Invoice footer-->
                            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="font-weight-bold text-muted text-uppercase text-right">@lang('landing.final_total')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="font-weight-bolder">
                                                <td class="text-primary font-size-h3 font-weight-boldest text-right">
                                                    {{ $item->total ? $item->total . " " . __('landing.r.s') : __('landing.order_not_determined')  }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice footer-->
                            {{--                            <!-- begin: Invoice action-->--}}
                            {{--                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">--}}
                            {{--                                <div class="col-md-10">--}}
                            {{--                                    <div class="d-flex justify-content-between">--}}
                            {{--                                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Order Details</button>--}}
                            {{--                                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Order Details</button>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <!-- end: Invoice action-->--}}
                            {{--                            <!-- end: Invoice-->--}}
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

@push('panel_js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>

    <script>

        $(document).on('click', '.save_final_price', function (e) {
            e.preventDefault();
            let url = $(this).attr('data-url');
            let final_price = $(this).closest('div').find('input').val();

            $.ajax({
                "url": url,
                "type": "POST",
                "data": {
                    'final_price': final_price
                },

                success: function (response) {

                    if (isJson(response)) {
                        response = jQuery.parseJSON(response);
                    }


                    if (response.status) {

                        customSweetAlert(
                            'success',
                            response.message,
                            response.item,
                            function (event) {
                                location.reload();
                            }
                        );

                    } else {
                        customSweetAlert(
                            'error',
                            response.message,
                        );
                    }


                },
                error: function (jqXhr) {
                    getErrors(jqXhr, '/panel/login');
                }
            });

        })

        $(document).on('change', '.status_operation', function (event) {
            var url = "{{ route('panel.orders.change_status' , $item->id) }}";
            var status = $('select[name=status]').val();

            event.preventDefault();
            swal.fire({
                title: '{{ __('constants.are_you_sure_of_this_process') }}',
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: '{{ __('constants.confirm') }}',
                cancelButtonText: '{{ __('constants.cancel') }}',
                confirmButtonColor: '#56ace0',
                allowOutsideClick: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data : {
                            'status' : status
                        },
                        success: function (response) {
                            if (response.status) {
                                toastr.success(response.message);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function (response) {
                            errorCustomSweet();
                        }
                    });
                }
            });
        });

    </script>
@endpush
