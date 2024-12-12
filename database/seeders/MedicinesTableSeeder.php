<?php

// database/seeders/MoviesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) { // Thêm 50 dòng dữ liệu
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg tablets', '5mg capsules', 'syrup 100ml']),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(2, 1, 100), // Giá từ 1 đến 100
                'stock' => $faker->numberBetween(10, 500), // Số lượng từ 10 đến 500
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    
}
