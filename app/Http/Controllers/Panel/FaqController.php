<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\FaqRequest;
use App\Http\Resources\PanelDatatable\FaqResource;
use App\Model\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('panel.faqs.index');
    }


    public function datatable(Request $request)
    {
        $items = Faq::query()->search($request)->orderByDesc('created_at');
        $resource = new FaqResource($items);
        return filterDataTable($items, $resource, $request);
    }

    public function create()
    {
        return view('panel.faqs.create' );
    }

    public function store(FaqRequest $request)
    {
        $data = $request->only(Faq::FILLABLE);
        Faq::query()->create($data)->createTranslation($request);

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit(  $id)
    {
        $data['item'] = Faq::query()->findOrFail($id);
        return view('panel.faqs.create', $data);
    }

    public function update($id, FaqRequest $request)
    {
        $item = Faq::query()->findOrFail($id);
        $data = $request->only(Faq::FILLABLE);

        $item->update($data);
        $item->createTranslation($request);
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Faq::query()->find($request->id);
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
        $item = Faq::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
