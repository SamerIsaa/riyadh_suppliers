@foreach(__('permissions') as $per)

    <div class="form-group">
        <fieldset>
            <legend>
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox"
                               class="checkAll mx-2 " {{isset($item) && @$item->hasAllDirectPermissions(array_keys($per['perm']))?'checked':''}}/>
                        <span></span>{{ $per['name'] }}
                    </label>
                </div>
            </legend>
            <div class="form-group row">
                @foreach($per['perm'] as $key => $p)
                    <div class="col-md-6 mb-4">
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-success">
                                <input type="checkbox" name="permissions[]"
                                       {{isset($item) && @$item->hasPermissionTo($key)?'checked':''}} value="{{ $key }}"/>
                                <span></span>
                                {{ $p }}
                            </label>
                        </div>
                    </div>

                @endforeach

            </div>
        </fieldset>
    </div>

@endforeach
