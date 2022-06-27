<?php

namespace Database\Seeders;

use App\Models\Car;
use DB;
use Illuminate\Database\Seeder;


class CarSeeder extends Seeder
{
    static $CAR_SEEDER_COUNT = 50;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()
            ->count(CarSeeder::$CAR_SEEDER_COUNT)
            ->create();
    }
}
