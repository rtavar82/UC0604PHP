<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        Actor::create([
            'name' => 'Leonardo DiCaprio',
            'birth_date' => '1974-11-11',
            'nationality' => 'Americana',
            'biography' => 'Ator e produtor norte-americano.',
        ]);

        Actor::create([
            'name' => 'Kate Winslet',
            'birth_date' => '1975-10-05',
            'nationality' => 'Britânica',
            'biography' => 'Atriz britânica.',
        ]);

        Actor::create([
            'name' => 'Morgan Freeman',
            'birth_date' => '1937-06-01',
            'nationality' => 'Americana',
            'biography' => 'Ator e narrador norte-americano.',
        ]);

        Actor::create([
            'name' => 'Natalie Portman',
            'birth_date' => '1981-06-09',
            'nationality' => 'Israelita-americana',
            'biography' => 'Atriz e produtora.',
        ]);

        Actor::create([
            'name' => 'Christian Bale',
            'birth_date' => '1974-01-30',
            'nationality' => 'Britânica',
            'biography' => 'Ator britânico.',
        ]);

        Actor::create([
            'name' => 'Scarlett Johansson',
            'birth_date' => '1984-11-22',
            'nationality' => 'Americana',
            'biography' => 'Atriz norte-americana.',
        ]);

        Actor::factory(10)->create();
        Actor::factory(3)->trashed()->create();
    }
}
