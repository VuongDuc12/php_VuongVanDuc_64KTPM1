<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) { // Thêm 100 dòng dữ liệu
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 50), // Giả định bảng medicines có 50 dòng
                'quantity' => $faker->numberBetween(1, 20),    // Bán từ 1 đến 20 đơn vị
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'), // Ngày bán từ 1 năm trước đến hiện tại
                'customer_phone' => $faker->optional()->numerify('##########'), // Số điện thoại tùy chọn
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

