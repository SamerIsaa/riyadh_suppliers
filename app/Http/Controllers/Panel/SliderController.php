<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\SliderRequest;
use App\Http\Resources\PanelDatatable\SliderResource;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        return view('panel.sliders.index');
    }

    public function getDataTable(Request $request)
    {

        $items = Slider::query()->filter()->with('translations')->orderByDesc('created_at');
        $resource = new SliderResource($items);
        return filterDataTable($items, $resource, $request);
    }

    public function create()
    {
        return view('panel.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $data = $request->only(Slider::FILLABLE);
        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }
        if ($request->file('mobile_image')) {
            $image = uploadImage($request, 'mobile_image');
            $data['mobile_image'] = $image->file_name ?? '';
        }
        Slider::query()->create($data)->createTranslation($request);
        return $this->response_api(true, trans('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Slider::query()->findOrFail($id);
        return view('panel.sliders.create', $data);
    }

    public function update($id, SliderRequest $request)
    {
        $data = $request->only(Slider::FILLABLE);
        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }
        if ($request->file('mobile_image')) {
            $image = uploadImage($request, 'mobile_image');
            $data['mobile_image'] = $image->file_name ?? '';
        }
        Slider::query()->updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, trans('messages.done_successfully') , StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Slider::query()->find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully') , StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }


    public function delete($id)
    {
        $item = Slider::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.deleted_successfully') , StatusCodes::OK) : $this->response_api(false, __('messages.error') , StatusCodes::INTERNAL_ERROR);
    }



}
