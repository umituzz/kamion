<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrderResource
 * @parent App\Http\Resources
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'load_type' => $this->load_type,
            'commodity' => $this->commodity,
            'departure_city' => $this->departure_city,
            'arrival_city' => $this->arrival_city,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
