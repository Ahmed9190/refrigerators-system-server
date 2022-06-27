<?php

namespace Database\Factories;

use Database\Seeders\PricesSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    static $MAX_ATTEND_DAYS = 10;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $MAX_ATTEND_DAYS = CarFactory::$MAX_ATTEND_DAYS;
        $attend_date = $this->faker->dateTimeBetween("-{$MAX_ATTEND_DAYS} days");

        return [
            "number" => $this->faker->numberBetween(1000, 5000),
            "owner_name" => $this->faker->name(),
            "attend_date" => $attend_date,
            "leave_date" => now(),
        ];
    }
}
