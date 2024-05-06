<?php

namespace App\Http\Resources;

use App\Services\ParkingPriceService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $totalPrice = $this->total_price ?? ParkingPriceService::calculatePrice(
            $this->zone_id,
            $this->entry_time,
            $this->exit_time
        );

        return [
            'id' => $this->id,
            'zone' => [
                'name' => $this->zone->name,
                'hourly_rate' => $this->zone->hourly_rate,
            ],
            'vehicle' => [
                'plate_num' => $this->vehicle->plate_num
            ],
            'entry_time' => $this->entry_time->toDateTimeString(),
            'exit_time' => $this->exit_time?->toDateTimeString(),
            'total_price' => $totalPrice,
        ];
    }
}
