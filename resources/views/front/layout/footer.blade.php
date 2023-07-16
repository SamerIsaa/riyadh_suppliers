<div class="container">
    <footer class="main-footer">
        <div class="row align-items-center">
            <div class="col-lg-5 me-auto mb-4 mb-lg-0 text-center text-lg-start">
                <div class="mb-3"><img src="{{ asset('frontAssets/images/logo-dark.png') }}" alt=""/></div>
                <h5>{{$settings->valueOf('footer_description_'.$locale)}}</h5>

            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <ul class="link-footer d-flex flex-wrap">
                    <li><a href="{{ route('front.index') }}">{{ __('landing.home') }}</a></li>
                    <li><a href="#products">{{ __('landing.products') }}</a></li>
                    <li><a href="#section-about">{{ __('landing.about') }}</a></li>
                    <li><a href="#section-service">{{ __('landing.our_services') }}</a></li>
                    <li><a href="#offers">{{ __('landing.last_offers') }}</a></li>
                    <li><a href="{{ route('front.faqs') }}">{{ __('landing.faqs') }}</a></li>

                    @foreach($footer_pages as $page)
                        <li><a href="{{  route('front.page.show' , $page->id) }}">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <ul class="social-media mb-3 mb-lg-0 justify-content-center align-items-center">
                    @if($link = $settings->valueOf('facebook'))
                        <li><a href="{{ $link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if($link = $settings->valueOf('linkedin'))
                        <li><a href="{{ $link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    @endif
                    @if($link = $settings->valueOf('twitter'))
                        <li><a href="{{ $link }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if($link = $settings->valueOf('youtube'))
                        <li><a href="{{ $link }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    @endif
                    @if($link = $settings->valueOf('instagram'))
                        <li><a href="{{ $link }}" target="_blank"><i class="fa-brands fa-square-instagram"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </footer>
    <h6 class="text-center py-3">
        {{ $settings->valueOf('copyright_'.$locale) }}
{{--        جميع الحقوق محفوظة لـ <span class="text-primary">شركة امداد</span>© 2023 .--}}
    </h6>
</div>
