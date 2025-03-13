<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $file_json = "./public/showtime-seeder.json";
            $json = file_get_contents($file_json);
            $showtimes = json_decode($json, true);

            foreach ($showtimes as $showtime) {
                Showtime::create([
                    'movie_id' => $showtime['movie_id'],
                    'show_date' => $showtime['show_date'],
                    'show_time' => $showtime['show_time'],
                    'price' => $showtime['price'],
                    'is_special_day' => $showtime['is_special_day'],
                ]);
            }
        } catch (QueryException $e) {
            echo "Error al conectarse a la base de datos: " . $e->getMessage();
        }
    }
}
