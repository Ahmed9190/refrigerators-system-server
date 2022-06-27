<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Prices;
use App\Models\Refrigerators;
use Carbon\Carbon;
use Database\Factories\CarFactory;
use Illuminate\Database\Seeder;

class RefrigeratorsSeeder extends Seeder
{
    static int $REFRIGRATORS_SEEDER_COUNT = 4;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < RefrigeratorsSeeder::$REFRIGRATORS_SEEDER_COUNT; $i++) {
            Refrigerators::insert([
                "car_id" => Car::inRandomOrder()->first()->id,
            ]);
        }

        Refrigerators::each(function (Refrigerators $refrigerator) {
            for ($day_index = 0; $day_index < rand(0, CarFactory::$MAX_ATTEND_DAYS); $day_index++) {
                $days_to_subtract = CarFactory::$MAX_ATTEND_DAYS - $day_index;
                // for ($refrigerators_id = 1; $refrigerators_id <=  RefrigeratorsSeeder::$REFRIGRATORS_SEEDER_COUNT; $refrigerators_id++) {
                Prices::insert([
                    "refrigerators_id" => $refrigerator->id,
                    "date" => Carbon::createFromDate()->subDays($days_to_subtract),
                    "value" => rand(100, 1000),
                ]);
                // }
            }
        });
    }
}
