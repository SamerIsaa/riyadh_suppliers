<div class="col-lg-3 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
    <div class="bg-light-primary rounded-15 p-4">
        <ul class="nav-profile">
            <li>
                <a class="font-bold {{ @$sub_active == "profile" ? "active" : "" }}" href="{{ route('front.profile.index') }}">
                    <img class="me-2" src="{{ asset('frontAssets/images/svg/user.svg') }}" alt=""/>
                    @lang('panel.profile')
                </a>
            </li>
            <li><a class="font-bold {{ @$sub_active == "password" ? "active" : "" }}" href="{{ route('front.profile.password.index') }}">
                    <img class="me-2" src="{{ asset('frontAssets/images/svg/look.svg') }}" alt=""/>
                    @lang('landing.change_password')
                </a>
            </li>
            <li>
                <a class="font-bold {{ @$sub_active == "orders" ? "active" : "" }}" href="{{ route('front.profile.orders.index') }}">
                    <img class="me-2" src="{{ asset('frontAssets/images/svg/orders.svg') }}" alt=""/>
                    @lang('panel.orders')
                </a>
            </li>

            <li class="logout">
                <a class="font-bold" href="{{ route('front.auth.logout') }}">
                    <img class="me-2" src="{{ asset('frontAssets/images/svg/logout.svg') }}" alt=""/>
                    @lang('panel.logout')
                </a>
            </li>
        </ul>
    </div>
</div>
