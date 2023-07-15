
<div class="page-header" style="background: url('{{ asset('frontAssets/images/bg-home.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center">
        <h2 class="font-bold text-white title mb-2 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">أسئلة شائعة</h2>
        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('landing.home') }}</a></li>
            <li class="breadcrumb-item {{ @$sub_title ? "" : "active" }}">
                @if(isset($sub_title))
                    <a href="{{ $main_route }}"> {{ $title }}</a>
                @else
                {{ $title }}
                @endif
            </li>

            @if(isset($sub_title))
            <li class="breadcrumb-item active"> {{ $sub_title }}</li>
            @endif

        </ol>
    </div>
</div>
