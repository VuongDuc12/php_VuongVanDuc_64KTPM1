<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy danh sách renter_id từ bảng renters
        $renterIds = DB::table('renters')->pluck('id'); 

        foreach (range(1, 20) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word . ' ' . $faker->word,
                'specifications' => $faker->word . ', ' . $faker->randomDigit . 'GB RAM, ' . $faker->randomDigit . 'GB SSD',
                'rental_status' => $faker->boolean, // Trạng thái ngẫu nhiên
                'renter_id' => $faker->randomElement($renterIds), // Lấy ngẫu nhiên một renter_id hợp lệ
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
