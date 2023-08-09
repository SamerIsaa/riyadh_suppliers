<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.orders.partials.options', ['instance' => $this])->render();

        return [
            'id' => $this['id'],
            'user_name' => $this->user['owner_name'],
            'status' => $this->getOrderStatusTrans(),
            'total' => ($this->total ?? __('landing.order_not_determined')),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'options' => $options,
        ];
    }
}
