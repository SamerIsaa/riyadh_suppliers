@if($instance->status == "pending")

    <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
       data-url="{{route('panel.monthly_subscriptions.operation', ['id' => $instance->id , 'operation' => 'accept'])}}"
       title="@lang('constants.accept')"><i class="flaticon2-check-mark"></i>
    </a>

    <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
       data-url="{{route('panel.monthly_subscriptions.operation', ['id' => $instance->id , 'operation' => 'reject'])}}"
       title="@lang('constants.reject')"><i class="flaticon2-delete"></i> </a>
@else

    @if($instance->is_active)
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
           data-url="{{route('panel.monthly_subscriptions.operation', ['id' => $instance->id , 'operation' => 'cancel'])}}"
           title="@lang('panel.cancel_subscription')"><i class="flaticon2-delete"></i> </a>

    @else

        <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
           data-url="{{route('panel.monthly_subscriptions.operation', ['id' => $instance->id , 'operation' => 'active'])}}"
           title="@lang('panel.active_subscription')"><i class="flaticon2-check-mark"></i> </a>

    @endif
@endif
