@canany(['add_sliders' , 'delete_sliders'])
    @can('add_sliders')
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('panel.sliders.edit.index',$instance->id)}}"
           title="{{trans('constants.edit')}}"><i class="flaticon2-edit"></i> </a>

    @endcan
    @can('delete_sliders')
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md delete" href=""
           data-url="{{route('panel.sliders.delete',$instance->id)}}" title="{{trans('constants.delete')}}"><i
                class="flaticon2-delete"></i> </a>
    @endcan
@else
    -
@endcanany
