<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
        $team = $this->whenLoaded('team');
        return [
            'id' => $this->id,
            'game_date' => $this->game_date,
            'opponent_name' => $this->opponent_name,
            'opponent_link' => $this->opponent_link,
            'opponent_point' => $this->opponent_point,
            'our_point' => $this->our_point,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'team' => $team,
            'media' => MediaResource::collection($media)
        ];
    }
}
