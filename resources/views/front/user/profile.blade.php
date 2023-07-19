@extends('front.layout.master' , ['title' => __('panel.profile') , 'show_header' => true])


@section('content')

    @include('front.components.page_header' , ['title' => __('panel.profile')] )


    <section class="section">
        <div class="container">
            <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="col-12">
                    <h2 class="section-title font-bold">@lang('landing.account_settings')</h2>
                </div>
            </div>
            <div class="row">
                @include('front.user.partials.sidebar' , ['sub_active' => 'profile'])
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <div class="box-shadow p-4 p-lg-5 rounded-15">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <h3 class="font-bold">@lang('panel.profile')</h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.company_name')</label>
                                        <input class="form-control" type="text" name="company_name"
                                               value="{{ @$user->company_name }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.email')</label>
                                        <input class="form-control" type="text" name="email"
                                               value="{{ @$user->email }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.owner_name')</label>
                                        <input class="form-control" type="text" name="owner_name"
                                               value="{{ @$user->owner_name }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.owner_mobile')</label>
                                        <div class="input-icon icon-left">
                                            <input class="form-control" type="text" value="{{ @$user->mobile_number }}"/>
                                            <input type="hidden" name="dial_code" value="+966">
                                            <div class="icon d-flex align-items-center">
                                                <h5 class="text-primary font-bold me-1">+966</h5><img
                                                    src="{{ asset('frontAssets/images/svg/flag-sudia.svg') }}" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.commercial_registration_no')</label>
                                        <input class="form-control" type="text" name="commercial_registration_no" value="{{ @$user->commercial_registration_no }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.tax_no')</label>
                                        <input class="form-control" type="text" name="tax_no" value="{{ @$user->commercial_registration_no }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.order_owner_name')</label>
                                        <input class="form-control" type="text" name="order_owner_name" value="{{ @$user->order_owner_name }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>@lang('constants.order_owner_mobile')</label>
                                        <div class="input-icon icon-left">
                                            <input class="form-control" type="text" name="order_owner_mobile_number" value="{{ @$user->order_owner_mobile_number }}"/>
                                            <input type="hidden" name="order_owner_dial_code" value="+966">
                                            <div class="icon d-flex align-items-center">
                                                <h5 class="text-primary font-bold me-1">+966</h5><img
                                                    src="{{ asset('frontAssets/images/svg/flag-sudia.svg') }}" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>@lang('constants.address')</label>
                                        <textarea class="form-control rounded-15 p-3" rows="4">{{ @$user->address }}</textarea>
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
