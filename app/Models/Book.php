<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public static function getAll() {
        return Book::select('books.*', 'genders.name as gender')
            ->join('genders', 'books.gender_id', '=', 'genders.id')
            ->get();
    }
}
