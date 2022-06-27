<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $hidden = [
        "laravel_through_key"
    ];
    protected $guarded = [];

    public function refrigeratorsPrices()
    {
        return $this->hasManyThrough(Prices::class, Refrigerators::class);
    }

    public function refrigerators()
    {
        return $this->hasMany(Refrigerators::class);
    }

    public function getTotalAttribute()
    {

        $refrigerators_prices = $this->getRefrigeratorsPricesWithDateCriteriaAndLeaveDateAttribute();
        $total = 0;

        if ($refrigerators_prices->has("refrigrators")) {
            $leave_date = $refrigerators_prices->get("leave_date");

            foreach ($refrigerators_prices->get("refrigrators") as $refrigerator_prices) {
                $refrigerator_prices_count = count($refrigerator_prices);

                for ($i = 0; $i < $refrigerator_prices_count; $i++) {
                    $current_refrigerator_price = $refrigerator_prices[$i];
                    $is_last_price = $i + 1 == $refrigerator_prices_count;
                    if ($is_last_price) {
                        $duration_in_days = $this->getLastDurationDifferenceInDays(
                            $current_refrigerator_price["date"],
                            $leave_date,
                        );

                        $total += $current_refrigerator_price["value"] * $duration_in_days;
                    } else {
                        $next_refrigerator_price = $refrigerator_prices[$i + 1];

                        $duration_in_days = $this->getDurationDifferenceInDays(
                            $current_refrigerator_price["date"],
                            $next_refrigerator_price["date"],
                        );

                        Log::info("duration_in_days: {$duration_in_days}");

                        $total += $current_refrigerator_price["value"] * $duration_in_days;
                    }
                }
            }
        }

        return $total;
    }

    //helpers
    public function getLastDurationDifferenceInDays(string $start_date, string $end_date)
    {
        $duration_in_days_before_12_30_pm = $this->getDurationDifferenceInDays($start_date, $end_date);

        $end_date_time = date_create($end_date);
        $end_date_time_at_12_h_30_m = date_create($end_date)->setTime(12, 30);
        $is_exceeds_12_30 = $end_date_time > $end_date_time_at_12_h_30_m;

        if ($is_exceeds_12_30)
            $duration_in_days_before_12_30_pm += 1;

        return $duration_in_days_before_12_30_pm;
    }

    //helpers
    public function getDurationDifferenceInDays(string $start_date, string $end_date)
    {
        $start_date = date_create($start_date);
        $end_date = date_create($end_date);
        return date_diff($start_date, $end_date)->days;
    }

    public function getRefrigeratorsPricesWithDateCriteriaAttribute()
    {
        return $this->refrigeratorsPrices->makeHidden("laravel_through_key")
            ->whereBetween("date", [$this->attend_date, $this->leave_date])
            ->groupBy("refrigerators_id")
            ->makeHidden("refrigerators_id");
    }

    public function getRefrigeratorsPricesWithDateCriteriaAndLeaveDateAttribute()
    {
        $refrigrators =  $this->getRefrigeratorsPricesWithDateCriteriaAttribute();
        if ($refrigrators->isNotEmpty())
            return collect([
                "refrigrators" => $refrigrators->toArray(),
                "leave_date" => $this->leave_date,
            ]);
        else
            return $refrigrators;
    }
}
