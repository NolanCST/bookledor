<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords = [
            ['id' => 1, 'user_id' => 1, 'book_id' => 1, 'review' => 'Very nice', 'rate' => 4, 'status' => 0]
        ];

        Rate::insert($ratingRecords);
    }
}
