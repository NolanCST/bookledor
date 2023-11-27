<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    private $liste = ['novels', 'BD', 'poetry', 'magazine', 'childrens_books', 'cookbooks', 'biography', 'fanzines', 'mangas', 'manuals', 'theatres', 'tales_legends',];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->liste as $gender) {
            Gender::factory()->create(['name' => $gender]);
        }
    }
}
