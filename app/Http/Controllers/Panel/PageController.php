<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\PageRequest;
use App\Http\Resources\PanelDatatable\PageResource;
use App\Model\Page;
use App\Model\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index()
    {
        return view('panel.pages.index');
    }

    public function datatable(Request $request)
    {
        $items = Page::query()->filter()->orderByDesc('created_at');
        $resource = new PageResource($items);
        return filterDataTable($items, $resource, $request);
    }


    public function create()
    {
        return view('panel.pages.create');
    }

    public function store(PageRequest $request)
    {
        Page::query()->create($request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Page::query()->findOrFail($id);
        return view('panel.pages.create', $data);
    }

    public function update(PageRequest $request, $id)
    {
        Page::query()->updateOrCreate(['id' => $id], $request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);

    }


    public function destroy($id)
    {
        $admin = Page::query()->find($id);
        return $admin->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }


    public function indexHome()
    {
        $data['settings'] = new Setting();
        return view('panel.pages.home_page', $data);
    }

    public function storeHome(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('slider_image')) {
            $image = uploadImage($request, 'slider_image');
            $data['slider_image'] = $image->file_name ?? '';
        }

        if ($request->hasFile('about_company_image')) {
            $image = uploadImage($request, 'about_company_image');
            $data['about_company_image'] = $image->file_name ?? '';
        }
        if ($request->hasFile('why_us_image')) {
            $image = uploadImage($request, 'why_us_image');
            $data['why_us_image'] = $image->file_name ?? '';
        }

        Setting::setSetting($data);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);

    }


    public function operation(Request $request)
    {
        $item = Page::query()->find($request->id);
        if (isset($item)) {
            if ($request->type == "show_in_header") {
                $item->show_in_header = !$item->show_in_header;
            } elseif ($request->type == "show_in_footer") {
                $item->show_in_footer = !$item->show_in_footer;
            } else {
                return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
            }
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }
}
