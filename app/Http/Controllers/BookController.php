<?php

namespace App\Http\Controllers;
 
use App\Models\Gender;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

app()->setLocale('fr');
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
        $actualyear = date("Y");

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'year' => 'required|numeric|integer|max:' . $actualyear, 
            'gender_id' => 'required|exists:genders,id',
        ]);

        $fileName = time() . '.' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/images', $fileName);

        Book::create([
            'image' => $fileName,
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'gender_id' => $request->gender_id,
            'user_id' => $request->user()->id
        ]);

        $image = $fileName;
        $title = $request -> title;
        $author = $request -> author;
        $year = $request -> year;
        $gender = $request -> gender_id;

        return view('book.store', compact ('image','title', 'author', 'year', 'gender'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book['gender'] = $book->getGender();
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genders = Gender::all()->sortBy('name');
        return view('book.edit', compact('book', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            
            'image' => 'required',
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric|integer|max:2023',
            'gender_id' => 'required|exists:genders,id',
        ]);

        // if($book->image){
        //     unlink('public/images/' . $book->image);
        // }

        //dd(Storage::allFiles('public/images'));
        Storage::delete('public/images/'.$book->image);

        $fileName = time() . '.' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/images', $fileName);

        $book->image = $fileName;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->gender_id = $request->gender_id;

        $book->save();

        return redirect(route('book.show', $book['id']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
