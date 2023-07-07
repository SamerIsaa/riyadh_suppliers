<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.products.partials.options', ['instance' => $this])->render();
        $featured = view('panel.products.partials.featured_status', ['instance' => $this])->render();
        $active = view('panel.products.partials.active_status', ['instance' => $this])->render();

        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'active' => $active,
            'featured' => $featured,
            'options' => $options,
        ];
    }
}
