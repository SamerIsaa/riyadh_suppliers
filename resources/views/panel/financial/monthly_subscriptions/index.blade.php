@extends('panel.layout.master',['title' => __('panel.monthly_subscriptions'),'is_active'=>'financial'])

@push('panel_css')
@endpush


@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.monthly_subscriptions')</h5>
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

            <div class="row">

                <div class="col-lg-6 col-xl-6 mb-5">
                    <div class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
                                <span class="svg-icon svg-icon-7x svg-icon-primary svg-icon-2x">
                                <svg height="512pt" viewBox="0 -20 512.00788 512" width="512pt"
                                     xmlns="http://www.w3.org/2000/svg"><path
                                        d="m481.128906 247.324219c-8.21875-.992188-15.691406 4.890625-16.671875 13.117187-12.328125 103.289063-100.296875 181.183594-204.621093 181.183594-47.984376 0-94.703126-16.828125-131.550782-47.378906-32.460937-26.914063-55.90625-63.230469-67.078125-103.441406l17.921875 9.84375c7.261719 3.988281 16.378906 1.335937 20.367188-5.925782 3.988281-7.261718 1.335937-16.382812-5.925782-20.371094l-46.03125-25.28125c-7.253906-3.984374-16.367187-1.339843-20.359374 5.910157l-25.316407 45.972656c-3.996093 7.257813-1.351562 16.378906 5.902344 20.375 9.359375 4.289063 16.636719.339844 20.375-5.902344l5.886719-10.691406c13.402344 43.730469 39.53125 83.105469 75.109375 112.605469 42.21875 35.003906 95.738281 54.28125 150.695312 54.28125 119.511719 0 220.285157-89.257813 234.410157-207.628906.984374-8.222657-4.890626-15.6875-13.113282-16.667969zm0 0"/><path
                                        d="m502.933594 128.09375c-7.601563-3.277344-16.433594.226562-19.710938 7.832031l-4.722656 10.953125c-15.402344-37.597656-40.539062-71.121094-72.742188-96.445312-41.953124-32.992188-92.414062-50.42968775-145.921874-50.42968775-54.476563 0-107.625 18.97265575-149.660157 53.42968775-41.457031 33.976562-70.347656 81.398437-81.347656 133.523437-1.710937 8.105469 3.476563 16.0625 11.582031 17.773438 10.015625.328125 16.28125-4.519531 17.769532-11.578125 9.597656-45.472656 34.816406-86.851563 71.011718-116.519532 36.6875-30.070312 83.085938-46.628906 130.644532-46.628906 46.714843 0 90.765624 15.21875 127.378906 44.007813 29.683594 23.34375 52.488281 54.648437 65.667968 89.679687l-18.988281-8.167968c-7.605469-3.269532-16.433593.242187-19.707031 7.851562s.242188 16.433594 7.851562 19.707031l48.25 20.753907c8.667969 2.675781 16.007813 1.183593 19.703126-7.839844l20.777343-48.191406c3.28125-7.605469-.226562-16.429688-7.835937-19.710938zm0 0"/><path
                                        d="m168.539062 269.246094c-8.28125 0-15 6.714844-15 15v6.011718c0 31.511719 25.664063 57.148438 57.207032 57.148438h6.234375v26.699219c0 8.285156 6.71875 15 15 15 8.285156 0 15-6.714844 15-15v-26.699219h18.035156v26.699219c0 8.285156 6.714844 15 15 15 8.28125 0 15-6.714844 15-15v-26.699219h6.234375c31.542969 0 57.207031-25.636719 57.207031-57.148438v-8.695312c0-22.453125-15.117187-42.351562-36.761719-48.394531l-26.683593-7.449219v-73.628906h6.238281c15 0 27.207031 12.179687 27.207031 27.152344v2.414062c0 8.28125 6.714844 15 14.996094 15 8.285156 0 15-6.71875 15-15v-2.414062c0-31.515626-25.660156-57.152344-57.203125-57.152344h-6.238281v-24.566406c0-8.285157-6.714844-15-14.996094-15-8.285156 0-15 6.714843-15 15v24.566406h-18.035156v-24.566406c0-8.285157-6.714844-15-15-15-8.285157 0-15 6.714843-15 15v24.566406h-6.238281c-31.539063 0-57.203126 25.636718-57.203126 57.152344 0 22.449218 15.117188 42.347656 36.757813 48.390624l26.683594 7.449219v82.324219h-6.234375c-15 0-27.207032-12.179688-27.207032-27.148438v-6.011718c0-8.285156-6.714843-15-15-15zm145.09375-7.183594c8.726563 2.4375 14.824219 10.453125 14.824219 19.496094v8.699218c0 14.96875-12.203125 27.148438-27.203125 27.148438h-6.238281v-60.542969zm-48.617187-109.972656v65.253906l-18.035156-5.035156v-60.21875zm-66.652344 46.648437c-8.726562-2.4375-14.824219-10.453125-14.824219-19.5 0-14.96875 12.207032-27.148437 27.207032-27.148437h6.234375v51.84375zm48.617188 44.71875 18.035156 5.03125v68.917969h-18.035156zm0 0"/></svg>
                                </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        @lang('panel.total_monthly_subscriptions')
                                    </a>
                                    <div class="text-dark-75 font-size-h1">
                                        {{@$total_monthly_subscriptions}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6 mb-5">
                    <div class="card card-custom wave wave-animate wave-success mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-success svg-icon-7x svg-icon-2x">
                                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
                                             xmlns="http://www.w3.org/2000/svg"><g><path
                                                    d="m369.071 62.929c-1.876-1.875-4.419-2.929-7.071-2.929h-102.013c-18.711-36.653-56.466-60-97.987-60-60.654 0-110 49.346-110 110s49.346 110 110 110c30.337 0 58.517-12.104 79.155-33.601 20.388 28.473 46.111 53.601 94.365 53.601h42.338l117.071 117.071c2.861 2.861 7.161 3.714 10.898 2.168 3.736-1.548 6.173-5.194 6.173-9.239v-140c0-2.652-1.054-5.195-2.929-7.071zm-207.071 137.071c-49.626 0-90-40.374-90-90s40.374-90 90-90c35.795 0 68.185 21.197 82.516 54.003 3.631 8.313 5.947 17.023 6.933 25.997h-29.449c-5.522 0-10 4.478-10 10 0 19.368 11.252 36.667 28.013 44.905-16.02 27.764-45.23 45.095-78.013 45.095zm330 125.857-86.5-86.5c3.794-1.42 6.5-5.068 6.5-9.358 0-5.522-4.478-10-10-10h-66.48c-41.75 0-62.286-22.104-81.385-49.905 2.14-3.274 4.102-6.663 5.879-10.145.661.026 1.323.05 1.986.05h16.734c11.483 24.192 36.074 40 63.266 40 5.522 0 10-4.478 10-10s-4.478-10-10-10c-21.157 0-40.11-13.396-47.162-33.334-1.413-3.995-5.19-6.666-9.428-6.666h-23.41c-12.877 0-24.065-8.158-28.275-20h108.275c5.522 0 10-4.478 10-10s-4.478-10-10-10h-70.454c-.609-6.796-1.84-13.475-3.689-20h90.001l134.142 134.144z"/><path
                                                    d="m162.17 99.58c-5.514 0-10-4.486-10-10 0-5.47 4.446-9.955 9.9-10 .024 0 .049-.001.073-.001 3.561 0 7.309 1.807 10.843 5.227 3.968 3.843 10.301 3.739 14.14-.231 3.841-3.969 3.737-10.299-.231-14.14-5.13-4.965-10.269-7.757-14.895-9.263v-11.172c0-5.522-4.478-10-10-10s-10 4.478-10 10v11.368c-11.541 4.19-19.83 15.282-19.83 28.212 0 16.542 13.458 30 30 30 5.514 0 10 4.486 10 10 0 5.553-4.503 10.001-9.986 10.001-.03 0-.061 0-.092-.001-4.328-.039-8.788-2.651-12.897-7.554-3.549-4.234-9.854-4.788-14.088-1.239-4.232 3.548-4.788 9.854-1.24 14.087 5.287 6.307 11.518 10.723 18.134 12.979v12.147c0 5.522 4.478 10 10 10s10-4.478 10-10v-12.061c11.515-3.982 20.17-14.992 20.17-28.359-.001-16.542-13.459-30-30.001-30z"/><path
                                                    d="m156 246c-5.522 0-10 4.478-10 10v41.857l-2.929-2.929c-3.906-3.904-10.236-3.904-14.143 0-3.905 3.905-3.905 10.237 0 14.143l20 20c1.954 1.952 4.512 2.929 7.072 2.929s5.118-.977 7.071-2.929l20-20c3.905-3.905 3.905-10.237 0-14.143-3.906-3.904-10.236-3.904-14.143 0l-2.928 2.929v-41.857c0-5.522-4.478-10-10-10z"/><circle
                                                    cx="146" cy="502" r="10"/><path
                                                    d="m72.748 392h-62.748c-5.522 0-10 4.478-10 10v100c0 5.522 4.478 10 10 10h91c5.522 0 10-4.478 10-10s-4.478-10-10-10h-81v-80.01h46.723c-.472 3.307-.723 6.644-.723 10.01 0 5.522 4.478 10 10 10s10-4.478 10-10c0-5.725.955-11.334 2.838-16.667 7.049-19.937 26.002-33.333 47.162-33.343h68.286c-4.127 11.651-15.249 20.01-28.286 20.01h-40c-5.522 0-10 4.478-10 10 0 27.57 22.43 50 50 49.99h95.276c.068.011.136.02.205.02 2.56 0 5.118-.977 7.071-2.929l48.3-48.3c.04-.039.073-.084.112-.124 9.485-9.165 23.638-10.811 34.807-4.966l-78.492 96.309h-92.279c-5.522 0-10 4.478-10 10s4.478 10 10 10h97.03c3.006 0 5.853-1.353 7.752-3.683l88.06-108.05c3.241-3.978 2.946-9.764-.684-13.391-17.137-17.13-43.901-19.168-63.332-6.067-19.47-13.399-46.394-11.466-63.688 5.828l-45.361 45.363h-34.777c-13.037 0-24.159-8.359-28.286-20h28.286c27.57 0 50-22.43 50-50 0-5.522-4.478-10-10-10h-80c-27.191 0-51.768 15.811-63.252 40zm197.533 8.781c9.209-9.212 22.977-11.166 34.129-5.862l-37.083 37.081h-28.265z"/></g></svg>
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{route('panel.users.index')}}"
                                       class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        @lang('panel.arrears_of_monthly_subscriptions')
                                    </a>
                                    <div class="text-dark-75 font-size-h1">
                                        {{@$arrears_of_monthly_subscriptions}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
                                <input type="text" class="form-control mx-2" name="started_at" id="kt_datepicker_1" readonly placeholder="{{ __('panel.started_at')}}" />
                                <input type="text" class="form-control mx-2" name="ended_at" id="kt_datepicker_2" readonly placeholder="{{ __('panel.ended_at')}}" />
                            </div>

                            <div class="col-lg-4 col-xl-4 d-flex justify-content-end">
                                <a href="{{ route('panel.monthly_subscriptions.create.index') }}"
                                   class="btn btn-success font-weight-bolder mx-2">
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
    <script src="{{ asset('panelAssets/js/date-picker.js') }}"></script>

    <script>
        window.data_url = '{{route('panel.monthly_subscriptions.datatable')}}';
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
                field: 'monthly_installment',
                title: "@lang('panel.monthly_installment')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'started_at',
                title: "@lang('panel.started_at')",
                textAlign: "center",
                width: 150,
            },
            {
                field: 'ended_at',
                title: "@lang('panel.ended_at')",
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
                field: 'options',
                title: '@lang('constants.actions')',
                sortable: false,
                overflow: 'visible',
                width: 120,
            }];

        $('input[name=started_at]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'started_at');
        });
        $('input[name=ended_at]').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'ended_at');
        });
    </script>


@endpush
