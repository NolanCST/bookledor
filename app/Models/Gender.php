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
        return $this->HasMany(Pokemon::class);
    }
}
