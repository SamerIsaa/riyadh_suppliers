<div class="widget_item-order d-lg-flex mb-3">
    @php
        $first_item = @$order->items[0];
    @endphp
    <div class="col-auto">
        <div class="widget_item-image"><img src="{{ image_url(@$first_item->product->image , '60x90') }}" alt=""/></div>
    </div>
    <div class="col px-lg-4">
        <div class="widget_item-content">
            <h3 class="font-bold mb-2">{{ @$first_item->product->title }}</h3>
            <div class="d-flex align-items-center mb-2">
                <h6 class="text-muted"> @lang('landing.order_date'):</h6>
                <h5 class="px-1 font-bold">{{ format_date($order->created_at) }}</h5>
            </div>
            <div class="d-flex align-items-center">
                <h6 class="text-muted">@lang('landing.order_price') :</h6>
                <h5 class="px-1 font-bold">{{ isset($order->total) ? $order->total . ' ' .__('landing.r.s') : __('landing.order_not_determined') }} </h5>
                {{--                <h5 class="px-1 font-bold text-success">212.00 رس</h5>--}}
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div
            class="widget_item-status font-bold {{ $order->getOrderStatusClass() }}">{{ $order->getOrderStatusTrans() }}</div>
    </div>
</div>
