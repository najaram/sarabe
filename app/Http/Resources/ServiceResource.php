<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'user_id'    => (int)$this->user_id,
            'title'      => $this->title,
            'schedule'   => $this->schedule,
            'note'       => $this->note,
            'created_at' => $this->created_at->toIso8601String()
        ];
    }
}
