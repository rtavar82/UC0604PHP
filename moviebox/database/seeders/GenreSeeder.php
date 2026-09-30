<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Genrsuyeteur()
        //Genre g=new Genre()
        //g.
        Genre::create(['name' => 'Action']);//Método Estático ->Id1
        Genre::create(['name' => 'SiFi']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Romance']);
        Genre::create(['name' => 'Drama']);

        Genre::factory(10)->create();


    }
}
