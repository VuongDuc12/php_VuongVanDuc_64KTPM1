<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean, // Trạng thái ngẫu nhiên
                'center_id' => $faker->numberBetween(1, 10), // Tham chiếu đến ID của bảng it_centers
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
