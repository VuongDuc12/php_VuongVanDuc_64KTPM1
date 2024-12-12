<?php

// database/seeders/MoviesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy danh sách cinema_id từ bảng cinemas
        $cinemaIds = DB::table('cinemas')->pluck('id'); 

        foreach (range(1, 20) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), // Tên phim
                'director' => $faker->name, // Đạo diễn
                'release_date' => $faker->date, // Ngày phát hành
                'duration' => $faker->numberBetween(90, 180), // Thời gian phim
                'cinema_id' => $faker->randomElement($cinemaIds), // Lấy ngẫu nhiên một cinema_id hợp lệ
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
