<?php

// database/seeders/CinemasSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemasTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('cinemas')->insert([
                'name' => $faker->company . ' Cinema',
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(100, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

