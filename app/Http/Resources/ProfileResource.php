<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'member_id'  => MembersResource::make($this->whenLoaded('member')),
            'church_id'  => $this->church_id,
            'locale'     => $this->locale,
            'district'   => $this->district,
            'division'   => $this->division,
            'group'      => $this->group,
            'created_at' => $this->created_at->toIso8601String()
        ];
    }
}
