<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $action = Genre::where('name', 'Ação')->first();
        $drama = Genre::where('name', 'Drama')->first();
        $comedy = Genre::where('name', 'Comédia')->first();

        if ($action) {
            Movie::create([
                'title' => 'Mad Max: Fury Road',
                'director' => 'George Miller',
                'year' => 2015,
                'duration' => 120,
                'genre_id' => $action->id,
            ]);

            Movie::create([
                'title' => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'year' => 2008,
                'duration' => 152,
                'genre_id' => $action->id,
            ]);
        }

        if ($drama) {
            Movie::create([
                'title' => 'The Shawshank Redemption',
                'director' => 'Frank Darabont',
                'year' => 1994,
                'duration' => 142,
                'genre_id' => $drama->id,
            ]);

            Movie::create([
                'title' => 'Titanic',
                'director' => 'James Cameron',
                'year' => 1997,
                'duration' => 194,
                'genre_id' => $drama->id,
            ]);
        }

        if ($comedy) {
            Movie::create([
                'title' => 'The Grand Budapest Hotel',
                'director' => 'Wes Anderson',
                'year' => 2014,
                'duration' => 99,
                'genre_id' => $comedy->id,
            ]);
        }

        Movie::factory(40)->create();
    }
}
