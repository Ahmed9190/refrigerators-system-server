<?php

namespace Database\Seeders;

use App\Models\Prices;
use Database\Factories\CarFactory;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    static $PRICES_SEEDER_COUNT = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MAX_ATTEND_DAYS = CarFactory::$MAX_ATTEND_DAYS;
        for ($i = 0; $i < $MAX_ATTEND_DAYS; $i++) {
            $days_to_subtract = $MAX_ATTEND_DAYS - $i;
            Prices::insert([
                'refrigerator_id' => rand(1, RefrigeratorsSeeder::$REFRIGRATORS_SEEDER_COUNT),
                "date" => date('Y-m-d H:i:s', strtotime("-{$days_to_subtract} day", strtotime('today'))),
                'value' => rand(100, 1000),
            ]);
        }
    }
}
