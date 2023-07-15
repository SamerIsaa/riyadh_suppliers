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
                    <li class="nav-item register">
                        <a class="nav-link" href="#">{{ __('landing.register_new_account') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary rounded-pill text-white"
                           href="#">{{ __('landing.sign_in') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
