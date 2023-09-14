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
            'shipper' => new ShipperResource($this->shipper),
            'loadType' => new LoadTypeResource($this->loadType),
            'currency' => new CurrencyResource($this->currency),
            'commodity' => $this->commodity,
            'departureCity' => new CityResource($this->departureCity),
            'arrivalCity' => new CityResource($this->arrivalCity),
            'status' => $this->status->name ?? NULL,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
