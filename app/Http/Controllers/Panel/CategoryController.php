<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\CategoryRequest;
use App\Http\Resources\PanelDatatable\CategoryResource;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('panel.categories.index');
    }


    public function datatable()
    {
        $items = Category::query()->search()->orderByDesc('created_at');
        $resource = new CategoryResource($items);
        return filterDataTable($items, $resource, request());
    }

    public function create()
    {
        return view('panel.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->only(Category::FILLABLE);
        Category::query()->create($data)->createTranslation($request);
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit($id)
    {
        $data['item'] = Category::query()->findOrFail($id);
        return view('panel.categories.create', $data);
    }

    public function update($id, CategoryRequest $request)
    {
        $item = Category::query()->findOrFail($id);
        $data = $request->only(Category::FILLABLE);

        $item->update($data);
        $item->createTranslation($request);
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Category::query()->find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }


    public function delete($id)
    {
        $item = Category::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
