<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::truncate();

        $faker = \Faker\Factory::create();       
        for ($i = 0; $i < 50; $i++) {
            Office::create([
                'name' => $faker->sentence,
                'address' => $faker->sentence,
            ]);
        }
    }
}
