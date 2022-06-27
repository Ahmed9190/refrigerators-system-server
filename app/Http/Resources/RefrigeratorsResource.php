<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Log;

class RefrigeratorsResource extends JsonResource
{
    // private static $attend_date;
    // private static $leave_date;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $prices = $this->prices(); //->whereBetween('date', [$this->attend_date, $this->leave_date]);
        // $prices = $this->prices()
        //     ->whereDate('date', ">=", self::$attend_date)
        //     ->whereDate('date', "<=", self::$leave_date);
        // $prices = $this->prices()->whereBetween('date', [self::$attend_date, self::$leave_date]);

        // ->whereBetween("date", [self::$attend_date, self::$leave_date]);
        // Log::info(
        //     $prices
        //         ->toSql()
        // );
        // Log::info(
        //     [
        //         self::$attend_date,
        //         self::$leave_date
        //     ]
        // );

        return (object)[
            "id" => $this->id,
            "total" => $this->total,
            "prices" => PriceResource::collection($this->prices),
        ];
    }
}
