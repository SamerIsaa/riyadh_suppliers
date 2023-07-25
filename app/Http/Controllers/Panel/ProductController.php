<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\ProductRequest;
use App\Http\Resources\PanelDatatable\ProductResource;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Property;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel.products.index');
    }


    public function datatable()
    {
        $items = Product::query()->search()->orderByDesc('created_at');
        $resource = new ProductResource($items);
        return filterDataTable($items, $resource, request());
    }

    public function create()
    {
        $data['properties'] = Property::query()->with('options')->get();
        $data['categories'] = Category::query()->active()->get();
        return view('panel.products.create', $data);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only(Product::FILLABLE);

        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }


        $item = Product::query()->create($data)->createTranslation($request);
        $item->saveProps();

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit($id)
    {
        $data['item'] = Product::query()->with(['translations', 'properties'])->findOrFail($id);
        $data['selected_properties'] = $data['item']->properties->map(function ($item) {
            return $item->only(['property_id', 'option_id']);
        })->toArray();
        $data['images'] = json_decode($data['item']->images, true);
        $data['categories'] = Category::query()->active()->get();
        $data['properties'] = Property::query()->with('options')->get();
        return view('panel.products.create', $data);
    }

    public function update($id, ProductRequest $request)
    {
        $item = Product::query()->findOrFail($id);
        $data = $request->only(Product::FILLABLE);
        if ($request->file('image')) {
            $image = uploadImage($request, 'image');
            $data['image'] = $image->file_name ?? '';
        }
        $item->update($data);
        $item->createTranslation($request);
        $item->saveProps();
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Product::query()->find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }

    public function featuredOperation(Request $request)
    {
        $item = Product::query()->find($request->id);
        if (isset($item)) {
            $item->is_featured = !$item->is_featured;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }


    public function destroy($id)
    {
        $item = Product::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
