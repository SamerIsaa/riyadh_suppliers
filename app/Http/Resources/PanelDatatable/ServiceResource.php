<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.services.partials.options', ['instance' => $this])->render();
        $active = view('panel.services.partials.active_status', ['instance' => $this])->render();

        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'active' => $active,
            'options' => $options,
        ];
    }
}
