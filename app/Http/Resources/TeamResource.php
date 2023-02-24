<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $media = $this->whenLoaded('media');
        $players = $this->whenLoaded('players');

        return [
            'id' => $this->id,
            'team_name' => $this->team_name,
            'slug' => $this->slug,
            'media' => $this->collection_name,
            'media' => MediaResource::collection($media),
            'players' => PlayerResource::collection($players)

        ];
    }
}
