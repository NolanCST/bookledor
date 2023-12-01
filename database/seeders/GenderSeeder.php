<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    private $liste = ['Roman', 'BD', 'Poesie', 'magazine', 'Livre pour enfants', 'Livre de cuisines', 'Biographie', 'Fanzine', 'Manga', 'Manuel', 'Theatre', 'Contes et Legendes',];
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
