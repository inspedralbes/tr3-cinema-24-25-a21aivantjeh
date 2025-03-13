<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $url = 'https://www.omdbapi.com/';
        $apiKey = '4b8b815f';
        $titles = [
            'Fast X',
            'Captain America: Civil War',
            'Sonic the Hedgehog 3',
            'Mickey 17',
            'Presence',
            'The monkey',
            'Paddington 2',
            'A Complete Unknown',
            'The Lobster',
            'El 47'
        ];

        foreach ($titles as $title) {
            $response = Http::get($url, [
                't' => $title,
                'apikey' => $apiKey,
                'language' => 'es',  // Añade el parámetro 'language' con valor 'es' para obtener la información en español
            ]);

            if ($response->successful()) {
                $movie = $response->json();
                if ($movie['Response'] == 'True') {
                    $releaseDate = date('Y-m-d', strtotime($movie['Released']));

                    Movie::create([
                        'title' => $movie['Title'] ?? 'N/A',
                        'description' => $movie['Plot'] ?? 'N/A',
                        'genre' => $movie['Genre'] ?? 'N/A',
                        'year' => $movie['Year'] ?? 'N/A',
                        'rating' => $movie['imdbRating'] ?? 'N/A',
                        'duration' => (int) filter_var($movie['Runtime'], FILTER_SANITIZE_NUMBER_INT),
                        'director' => $movie['Director'] ?? 'N/A',
                        'writer' => $movie['Writer'] ?? 'N/A',
                        'cast' => $movie['Actors'] ?? 'N/A',
                        'rated' => $movie['Rated'] ?? 'N/A',
                        'language' => $movie['Language'] ?? 'N/A',
                        'release_date' => $releaseDate,
                        'country' => $movie['Country'] ?? 'N/A',
                        'poster' => $movie['Poster'] ?? null,
                        'trailer' => null,
                    ]);
                } else {
                    echo "No se encontró la película {$title} en OMDB.\n";
                }
            } else {
                echo "Error al obtener datos de OMDB para la película {$title}.\n";
            }
        }
        echo "Seeder completo!\n";
        $this->call([
            ShowtimeSeeder::class,
        ]);
    }
}
