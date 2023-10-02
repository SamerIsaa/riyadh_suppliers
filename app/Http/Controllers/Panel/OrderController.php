<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\PanelDatatable\OrderResource;
use App\Model\Category;
use App\Model\Order;
use App\Model\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\MizeDevicesService;
use Mockery\Exception;

class OrderController extends Controller
{
    public function index()
    {
        return view('panel.orders.index');
    }


    public function datatable()
    {
        $items = Order::query()->with('user')->search()->orderByDesc('created_at');
        $resource = new OrderResource($items);
        return filterDataTable($items, $resource, request());
    }


    public function show($id)
    {
        $data['item'] = Order::query()->with(['user', 'products'])->findOrFail($id);
        $data['statuses'] = ['new', 'in_progress', 'completed'];
        return view('panel.orders.show', $data);
    }

    public function check($id, MizeDevicesService $service)
    {

        $order = Order::query()->with('products')->find($id);
        if (!$order) {
            return $this->response_api(false, StatusCodes::NOT_FOUND, __('messages.not_found'));
        }

        $list = $service->myResource($order->products);

        return view('panel.orders.check_result', compact('list'));


    }

    public function updateFinalPrice($id, $item_id, Request $request)
    {
        $request->validate([
            'final_price' => 'required|numeric|min:1'
        ], [], [
            'final_price' => __('constants.final_price')
        ]);

        $item = OrderProduct::query()->with('order')->where('order_id', $id)->find($item_id);
        if (!$item) {
            return $this->response_api(false, StatusCodes::NOT_FOUND, __('messages.not_found'));
        }

        DB::beginTransaction();
        try {

            $item->unit_price = $request->get('final_price');
            $item->final_price = $item->unit_price * $item->quantity;
            $item->save();

            $item->order->checkAllItemsFinalPrice();

            DB::commit();
            return $this->response_api(true, trans('messages.added_successfully'));

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->response_api(false, trans('messages.error'));
        }


    }

    public function changeStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed'
        ], [], [
            'status' => __('constants.status')
        ]);

        $order = Order::query()->find($id);
        if (!isset($order)) {
            return $this->response_api(false, StatusCodes::NOT_FOUND, __('messages.not_found'));
        }

        DB::beginTransaction();
        try {

            $order->status = $request->get('status');
            $order->save();

            DB::commit();
            return $this->response_api(true, trans('messages.added_successfully'));

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->response_api(false, trans('messages.error'));
        }


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
        $item = Order::query()->find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }


}
