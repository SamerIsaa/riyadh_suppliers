@extends('front.layout.master' , ['title' => __('landing.change_password') , 'show_header' => true])


@section('content')

    @include('front.components.page_header' , ['title' => __('panel.profile')  ] )


    <section class="section">
        <div class="container">
            <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="col-12">
                    <h2 class="section-title font-bold">@lang('landing.account_settings')</h2>
                </div>
            </div>
            <div class="row">
                @include('front.user.partials.sidebar' , ['sub_active' => 'password'])
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <div class="box-shadow p-4 p-lg-5 rounded-15">
                        <form action="{{ url()->current() }}" method="post" id="form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <h3 class="font-bold">@lang('landing.change_password')</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> @lang('panel.old_password') </label>
                                        <div class="input-icon icon-left">
                                            <input class="form-control" type="password" name="old_password"/>
                                            <div class="icon pointer toggle-pass"><i class="fa-solid fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> @lang('panel.new_password')</label>
                                        <div class="input-icon icon-left">
                                            <input class="form-control" type="password" name="password" id="password"/>
                                            <div class="icon pointer toggle-pass"><i class="fa-solid fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.password_confirmation')</label>
                                        <div class="input-icon icon-left">
                                            <input class="form-control" type="password" name="password_confirmation"/>
                                            <div class="icon pointer toggle-pass"><i class="fa-solid fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary rounded-pill">@lang('constants.save')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('front_js')
    <script src="{{ asset('frontAssets/js/post.js') }}"/>
@endpush
