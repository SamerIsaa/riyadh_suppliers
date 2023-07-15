@canany(['delete_categories', 'add_categories'])
    @can('add_categories')
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md"
           href="{{route('panel.categories.edit.index',$instance->id)}}" title="@lang('constants.edit')"><i
                class="flaticon2-edit"></i> </a>
    @endif
    @can('delete_categories')
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md delete" href=""
           data-url="{{route('panel.categories.delete',$instance->id)}}" title="@lang('constants.delete')"><i
                class="flaticon2-delete"></i> </a>
    @endif
@else
    -
@endif
