@extends('panel.layout.master',['title' => __('panel.complaints'),'is_active'=>'help_center'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.complaints')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex">
                    <!--begin::Pic-->
                    <div class="flex-shrink-0 mr-7">
                        <div class="symbol symbol-50 symbol-lg-120">
                            <img alt="Pic" src="{{ asset('default.jpg') }}"/>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin: Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::User-->
                            <div class="mr-3">
                                <div class="d-flex align-items-center mr-3">
                                    <!--begin::Name-->
                                    <a href="#"
                                       class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                        {{ $complaint->sender->getFullName() }}
                                    </a>
                                    <!--end::Name-->
                                    <span class="label label-light-success label-inline font-weight-bolder mr-1">
                                        {{ $complaint->getSenderType() }}
                                    </span>

                                </div>
                                <!--begin::Contacts-->
                                <div class="d-flex flex-wrap my-2">
                                    <a href="#"
                                       class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 width="24px" height="24px" viewBox="0 0 24 24"
                                                 version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                   fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                        fill="#000000"/>
                                                    <circle fill="#000000" opacity="0.3" cx="19.5"
                                                            cy="17.5" r="2.5"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>
                                        {{ $complaint->sender->email }}</a>
                                </div>
                                <!--end::Contacts-->
                            </div>
                            <!--begin::User-->
                            <!--begin::Actions-->

                            {{--                            <div class="mb-10">--}}
                            {{--                                <div class="dropdown">--}}
                            {{--                                    <button class="btn btn-secondary dropdown-toggle" type="button"--}}
                            {{--                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                            {{--                                            aria-expanded="false">--}}
                            {{--                                        @lang('constants.status')--}}
                            {{--                                    </button>--}}
                            {{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                            {{--                                        <a class="dropdown-item" href="#">Action</a>--}}
                            {{--                                        <a class="dropdown-item" href="#">Another action</a>--}}
                            {{--                                        <a class="dropdown-item" href="#">Something else here</a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                --}}{{--                                <a href="#" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">STATUS</a>--}}
                            {{--                            </div>--}}

                            <div class="mb-10">
                                @if($complaint->status != "pending")
                                    <a href="#"
                                       data-url="{{ route('panel.help-center.complaints.operation' , ['id' => $complaint->id,'status' => 'pending']) }}"
                                       class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase mr-2 operation">Pending</a>
                                @endif

                                @if($complaint->status != "canceled")
                                    <a href="#"
                                       data-url="{{ route('panel.help-center.complaints.operation' ,['id' => $complaint->id,'status' => 'canceled']) }}"
                                       class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2 operation">Canceled</a>
                                @endif

                                @if($complaint->status != "solved")
                                    <a href="#"
                                       data-url="{{ route('panel.help-center.complaints.operation' , ['id' => $complaint->id,'status' => 'solved']) }}"
                                       class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-2 operation">Solved</a>
                                @endif
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class=" align-items-center flex-wrap">
                            <!--begin::Description-->


                            <span class="label label-light-warning label-inline font-weight-bolder font-size-h5 p-3">
                                {{ $complaint->subject }}
                            </span>

                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                {{ $complaint->description }}
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Info-->
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">

            <div class="col-xl-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body px-0">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                <div class="container">
                                    @if($complaint->status != "solved")
                                        {!! Form::open(['method'=>'POST', 'url'=>route('panel.help-center.complaints.add-replay'),'to'=> url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}
                                        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                                        <div class="form-group">
                                            <textarea class="form-control form-control-lg form-control-solid"
                                                      name="message" id="exampleTextarea" rows="3"
                                                      placeholder="Type notes"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit"
                                                        class="btn btn-light-primary font-weight-bold">@lang('constants.send_now')</button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif

                                    @if(isset($complaint) && $complaint->replies->count())
                                        <div class="separator separator-dashed my-10"></div>
                                        <!--begin::Timeline-->
                                        <div class="timeline timeline-3">
                                            <div class="timeline-items">
                                                @foreach($complaint->replies as $reply)
                                                    <div class="timeline-item">
                                                        <div class="timeline-media">
                                                            <img alt="Pic" src="{{ asset('default.jpg') }}"/>
                                                        </div>
                                                        <div class="timeline-content">
                                                            @if($reply->sender == auth('admin')->user())
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mb-3">
                                                                    <div class="mr-2">
                                                                        <a href="#"
                                                                           class="text-dark-75 text-hover-primary font-weight-bold ">{{ ucfirst($reply->sender->getFullName()) }}</a>
                                                                        <span
                                                                            class="text-muted ml-2">{{ diff_for_humans($reply->created_at)  }}</span>
                                                                    </div>
                                                                </div>
                                                                <p class="p-0">{{ $reply->message }}</p>
                                                        </div>

                                                        @else
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-3">
                                                                <div class="mr-3">
                                                                    <a href="#"
                                                                       class="text-dark-75 text-hover-primary font-weight-bolder ">{{ ucfirst($reply->sender->getFullName()) }}</a>
                                                                    <span
                                                                        class="text-muted ml-2">{{ diff_for_humans($reply->created_at)  }}</span>
                                                                </div>
                                                            </div>
                                                            <p class="p-0 text-primary font-weight-bolder">{{ $reply->message }}</p>
                                                    </div>
                                                    @endif
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            @endif
                            <!--end::Timeline-->
                            </div>
                        </div>
                        <!--end::Tab Content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Row-->
    </div>

@endsection

@push('panel_js')
    <script src="{{asset('panelAssets/js/post.js')}}"></script>
@endpush
