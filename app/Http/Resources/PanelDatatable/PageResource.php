<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $options = view('panel.pages.partials.options', ['instance' => $this])->render();
        $show_in_footer = view('panel.pages.partials.show_in_footer', ['instance' => $this])->render();
        $show_in_header = view('panel.pages.partials.show_in_header', ['instance' => $this])->render();
        return [
            'check' => '',
            'id' => $this['id'],
            'title' => $this['title'],
            'content' => $this['content'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'show_in_footer' => $show_in_footer,
            'show_in_header' => $show_in_header,
            'options' => $options,

        ];
    }
}
