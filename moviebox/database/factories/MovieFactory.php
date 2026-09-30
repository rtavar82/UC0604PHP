<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'director' => $this->faker->name(),
            'year' => $this->faker->dateTimeBetween('-100 year', 'now')->format('Y'),
            'duration'=> $this->faker->numberBetween(70,180),
            //'genre_id' => Genre::factory(), //Gera um novo genero para cada filme, o que não tem sentido
            'genre_id' => Genre::inRandomOrder()->first()->id,
        ];
    }
}
