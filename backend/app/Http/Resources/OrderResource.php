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
            'id' => $this->id ?? NULL,
            'shipper' => new ShipperResource($this->shipper ?? NULL) ,
            'loadType' => new LoadTypeResource($this->loadType ?? NULL) ,
            'currency' => new CurrencyResource($this->currency ?? NULL) ,
            'commodity' => $this->commodity ?? NULL,
            'departureCity' => new CityResource($this->departureCity ?? NULL),
            'arrivalCity' => new CityResource($this->arrivalCity ?? NULL),
            'status' => $this->status->name ?? NULL,
            'created_at' => $this->created_at ?? NULL,
        ];
    }
}
