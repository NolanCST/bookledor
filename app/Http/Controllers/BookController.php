<?php

namespace App\Http\Controllers;
 
use App\Models\Gender;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::getAll();
        return view('book.index',compact ('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::all()->sortBy('name');
        return view('book.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $actualyear = date ("Y");
        // $request->validate([
        //     'title' => 'required|max:50',
        //     'author' => 'required|max:50',
        //     'year' => 'required|numeric|integer|max:2023',
        //     'genders' => 'required|exists:genders,id',
        // ]);

       Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'gender_id' => $request->gender_id
        ]);

        $title = $request -> title;
        $author = $request -> author;
        $year = $request -> year;
        $gender = $request -> gender_id;

        return view('book.store', compact ('title', 'author', 'year', 'gender'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
