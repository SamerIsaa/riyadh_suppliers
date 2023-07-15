<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.categories.partials.options', ['instance' => $this])->render();
        $active = view('panel.categories.partials.active_status', ['instance' => $this])->render();

        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'active' => $active,
            'options' => $options,
        ];
    }
}
