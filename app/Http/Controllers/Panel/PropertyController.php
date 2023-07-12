<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\PropertyRequest;
use App\Http\Requests\Panel\ServiceRequest;
use App\Http\Resources\PanelDatatable\PropertyResource;
use App\Http\Controllers\Controller;
use App\Model\Option;
use App\Model\Property;
use App\Model\Service;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('panel.properties.index');
    }


    public function datatable()
    {
        $items = Property::query()->search()->orderByDesc('created_at');
        $resource = new PropertyResource($items);
        return filterDataTable($items, $resource, request());
    }

    public function create()
    {
        return view('panel.properties.create');
    }

    public function store(PropertyRequest $request)
    {
        $data = $request->only(Property::FILLABLE);
        $item = Property::query()->create($data)->createTranslation($request);

        $options = $request->get('options' , []);
        foreach ($options as $option){
            Option::query()->updateOrCreate([
                'id' => @$option['id'],
            ],[
                'property_id' => $item->id,
            ])->createTranslation($option);
        }

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit($id)
    {
        $data['item'] = Property::query()->with('options')->findOrFail($id);
        return view('panel.properties.create', $data);
    }

    public function update($id, PropertyRequest $request)
    {
        $item = Property::query()->findOrFail($id);
        $data = $request->only(Property::FILLABLE);

        $item->update($data);
        $item->createTranslation($request);

        $options = $request->get('options' , []);
        $ids = [];
        foreach ($options as $option){
            $option = Option::query()->updateOrCreate([
                'id' => @$option['id'],
            ],[
                'property_id' => $item->id,
            ])->createTranslation($option);
            $ids[] = $option->id;
        }

        $item->options()->whereNotIn('id' , $ids)->delete();

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Property::query()->find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }


    public function destroy($id)
    {
        $item = Property::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
