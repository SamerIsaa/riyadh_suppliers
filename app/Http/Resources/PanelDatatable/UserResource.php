<?php

namespace App\Http\Resources\PanelDatatable;

use App\Model\PaymentLog;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.users.partials.options', ['instance' => $this])->render();
        $active = view('panel.users.partials.active_status', ['instance' => $this])->render();

        return [
            'name' => $this['name'],
            'email' => $this['email'],
            'company_name' => $this['company_name'],
            'order_owner_mobile' => @$this['order_owner_mobile']??'-',
            'mobile' => @$this['mobile']??'-',
            'created_at' => Carbon::parse($this['created_at'])->format('Y-m-d'),
            'active' => $active,
            'options' => $options,
        ];
    }
}
