<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\ServiceRequest;
use App\Http\Resources\PanelDatatable\ServiceResource;
use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('panel.services.index');
    }


    public function datatable()
    {
        $items = Service::query()->search()->orderByDesc('created_at');
        $resource = new ServiceResource($items);
        return filterDataTable($items, $resource, request());
    }

    public function create()
    {
        return view('panel.services.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->only(Service::FILLABLE);

        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }


        Service::query()->create($data)->createTranslation($request);

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit($id)
    {
        $data['item'] = Service::query()->findOrFail($id);
        return view('panel.services.create', $data);
    }

    public function update($id, ServiceRequest $request)
    {
        $item = Service::query()->findOrFail($id);
        $data = $request->only(Service::FILLABLE);
        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }
        $item->update($data);
        $item->createTranslation($request);
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Service::query()->find($request->id);
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
        $item = Service::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
