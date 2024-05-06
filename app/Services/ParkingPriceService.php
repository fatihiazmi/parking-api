<?php

namespace App\Services;

use App\Models\Zone;
use Carbon\Carbon;

class ParkingPriceService
{

    public static function calculatePrice(int $zone_id, string $entryTime, string $exitTime = null): int
    {
        $entry = new Carbon($entryTime);
        $exit = (!is_null($exitTime)) ? new Carbon($exitTime) : now();

        $totalTimeByMinutes = $exit->diffInMinutes($entry);

        $priceByMinutes = Zone::find($zone_id)->hourly_rate / 60;

        return ceil($totalTimeByMinutes * $priceByMinutes);
    }
}
