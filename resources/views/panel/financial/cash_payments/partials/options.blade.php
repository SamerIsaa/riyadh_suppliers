@if($instance->status == "pending")

    <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
       data-url="{{route('panel.cash_payments.operation', ['id' => $instance->id , 'operation' => 'accept'])}}"
       title="@lang('constants.accept')"><i class="flaticon2-check-mark"></i>
    </a>

    <a class="btn btn-sm btn-clean btn-icon btn-icon-md operation" href=""
       data-url="{{route('panel.cash_payments.operation', ['id' => $instance->id , 'operation' => 'reject'])}}"
       title="@lang('constants.reject')"><i class="flaticon2-delete"></i> </a>
@else

    <span class="text-center">-</span>

@endif
