<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "number" => $this->number,
            "owner_name" => $this->owner_name,
            "attend_date" => $this->attend_date,
            "leave_date" => $this->leave_date,
            "total" => $this->total,
            "refrigerators_prices" => $this->refrigeratorsPricesWithDateCriteria,
        ];
    }

    public function mergeRefrigerators($refrigerators)
    {
        $refrigerator_total = 0;
        $refrigerators_object = (object)[];

        foreach ($refrigerators as $refrigerator) {
            if (!property_exists($refrigerators_object, $refrigerator->refrigerators_id))
                $refrigerators_object->{$refrigerator->refrigerators_id} = [];
            $refrigerator_id = $refrigerator->refrigerators_id;
            unset($refrigerator->refrigerators_id);
            array_push($refrigerators_object->{$refrigerator_id}, $refrigerator);
            $refrigerator_total += $refrigerator->value;
        }
        return [$refrigerators_object];
    }
}
