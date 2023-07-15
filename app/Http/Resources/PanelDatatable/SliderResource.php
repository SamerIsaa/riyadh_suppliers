<?php

namespace App\Http\Resources\PanelDatatable;

use Illuminate\Http\Resources\Json\JsonResource;
class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.sliders.partials.options', ['instance' => $this])->render();
        $activation = view('panel.sliders.partials.active_status', ['instance' => $this])->render();
	    return [
		    'id' => $this->id,
		    'title' => $this->title,
            'is_active' => $activation,
		    'options' => $options,
	    ];
    }
}
