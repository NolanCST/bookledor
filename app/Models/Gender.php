<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    public $timestamp = false;
    protected $fillable = ['name'];

    public function book (): HasMany {
        return $this->HasMany(Book::class);
    }

    public function getAll() {
        return Book::select('books.*', 'genders.name as gender')
            ->join('genders', 'books.gender_id', '=', 'genders.id')
            ->get();
    }
}
