<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container py-2"><a class="navbar-brand" href="#"> <img
                    src="{{ asset('frontAssets/images/logo.png') }}"
                    alt=""/></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars fa-lg"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="home" ? "active" : "" }}"
                           href="{{ route('front.index') }}">{{ __('landing.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="about" ? "active" : "" }}"
                           href="#section-about">{{ __('landing.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="our_services" ? "active" : "" }}"
                           href="#section-service">{{ __('landing.our_services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="last_offers" ? "active" : "" }}"
                           href="#offers">{{ __('landing.last_offers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="products" ? "active" : "" }}"
                           href="#products">{{ __('landing.products') }}</a>
                    </li>
                    @foreach($header_pages as $page)
                    <li class="nav-item">
                        <a class="nav-link {{ @$active=="page_" . $page->id  ? "active" : "" }}"
                           href="{{ route('front.page.show' , $page->id) }}">{{ $page->title }}</a>
                    </li>
                    @endforeach


                    @if(auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link border border-white rounded pt-1 px-3" href="#" data-bs-toggle="dropdown">
                                {{ auth()->user()->owner_name }}
                                <i class="fa-solid fa-chevron-down fa-xs ms-1"></i>
                            </a>
                            <ul class="dropdown-menu border-0 shadow">
                                <li><a class="dropdown-item" href="{{ route('front.profile.index') }}"><i class="fa-solid fa-user fa-xs me-1"></i> @lang('panel.profile')</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.cart.index') }}"><i class="fa-solid fa-cart-shopping fa-xs me-1"></i> @lang('landing.cart')</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.auth.logout') }}"><i class="fa-solid fa-right-from-bracket fa-xs me-1"></i> @lang('panel.logout')</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item register">
                            <a class="nav-link" href="{{ route('front.auth.register') }}">{{ __('landing.register_new_account') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary rounded-pill text-white"
                               href="{{ route('front.auth.login') }}">{{ __('landing.sign_in') }}</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
