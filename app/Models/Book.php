<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $fillable =['image','title', 'description', 'author', 'year', 'note', 'gender_id', 'user_id', 'author_id', 'created_at' ];

    public static function getAll() {
        return Book::select('books.*', 'genders.name as gender')
            ->join('genders', 'books.gender_id', '=', 'genders.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('tagging_tagged', 'books.id', '=', 'tagging_tagged.taggable_id')
            ->get();
    }

    public function getGender() {
        $gender = Gender::find($this->gender_id);
        return $gender->name;
    }

    public function getAuthor() {
        $author = Author::find($this->author_id);
        return $author->name;
    }

    // public function getTags() {
    //     $tags = Taggable::find($this->taggable_id);
    //     return $tags->tag_name;
    // }
}
