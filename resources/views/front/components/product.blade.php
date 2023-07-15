<div class="{{ isset($class) ? $class : 'col-lg-3 col-md-6' }}">
    <div class="widget_item-product mb-4 mb-lg-0">
        <div class="widget_item-image d-flex align-items-center justify-content-center bg-white mb-3">
            <a href="{{ route('front.products.show' , $item->id ) }}">
                <img src="{{ image_url($item->image , '180x270') }}" alt=""/>
            </a>
        </div>
        <div class="widget__item-content">
            <div class="d-flex align-items-center">
                <h6 class="text-muted">{{ __('constants.product_number') }} :</h6>
                <h6 class="text-black">{{ $item->number }}</h6>
            </div>
            <h3 class="widget_item-title mb-1">
                <a href="{{ route('front.products.show' , $item->id ) }}">{{ $item->title }}</a>
            </h3>
            <div class="d-flex align-items-center">
                @if(isset($item->offer_price) && $item->offer_price > 0)
                    <h3 class="font-bold text-primary">{{ $item->offer_price }}  {{ __('landing.r.s') }}</h3>
                    <h4 class="text-muted ms-2 widget_item-oldPrice">{{ __('landing.instead_of') }} {{ $item->price }} {{ __('landing.r.s') }}</h4>
                @else
                    <h3 class="font-bold text-primary">{{ $item->price }}  {{ __('landing.r.s') }}</h3>
                @endif
            </div>
        </div>
    </div>
</div>
