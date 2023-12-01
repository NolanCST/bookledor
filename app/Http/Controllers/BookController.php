<?php

namespace App\Http\Controllers;
 
use App\Models\Gender;
use App\Models\Rate;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

app()->setLocale('fr');
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::paginate(6);
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
            'description' => 'required',
            'author' => 'required|max:50',
            'year' => 'required|numeric|integer|max:' . $actualyear, 
            'gender_id' => 'required|exists:genders,id',
        ]);

        $fileName = time() . '.' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/images', $fileName);

        $book = Book::create([
            'image' => $fileName,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'year' => $request->year,
            'gender_id' => $request->gender_id,
            'user_id' => $request->user()->id
        ]);

        $image = $fileName;
        $title = $request->title;
        $description = $request->description;
        $author = $request->author;
        $year = $request->year;
        $gender = $book->getGender();

        return view('book.store', compact ('image','title', 'description', 'author', 'year', 'gender'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $id = Auth::id();
        $book['gender'] = $book->getGender();

        // Recuperation des notes
        $ratings = Rate::with('user')->where('status', 1)->where('book_id', $book['id'])->orderBy('id', 'desc')->get()->toArray();

        // Faire la moyenne des notes
        $ratingsSum = Rate::where('status', 1)->where('book_id', $book['id'])->sum('rate');
        $ratingsCount = Rate::where('status', 1)->where('book_id', $book['id'])->count();
        $avgRating = 0;
        $avgStarRating = 0;
        if ($ratingsCount>0){
            $avgRating = round($ratingsSum/$ratingsCount,2);
            $avgStarRating = round($ratingsSum/$ratingsCount);
        }


        return view('book.show', compact('book', 'id', 'ratings', 'avgRating', 'avgStarRating', 'ratingsCount'));
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
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:50',
            'description' => 'required',
            'author' => 'required|max:50',
            'year' => 'required|numeric|integer|max:' . $actualyear, 
            'gender_id' => 'required|exists:genders,id',
        ]);

        Storage::delete('public/images/'.$book->image);

        $fileName = time() . '.' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/images', $fileName);

        $book->image = $fileName;
        $book->title = $request->title;
        $book->description = $request->description;
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
        Storage::delete('public/images/'.$book->image);
        $book->delete();
        return redirect(route('book.index'));
    }


    public function search(Request $request)
{
    $searchField = $request->input('search'); // Utilisez le champ de recherche

    $key = trim($request->get('q'));

    $query = Book::select('books.*')
        ->join('genders', 'books.gender_id', '=', 'genders.id')
        ->orderBy('books.created_at', 'desc');

    if ($searchField == 'title') {
        $searchedBooks = $query->where('title', 'like', "%{$key}%")->get();
    } elseif ($searchField == 'author') {
        $searchedBooks = $query->where('author', 'like', "%{$key}%")->get();
    } elseif ($searchField == 'gender') {
        $searchedBooks = $query->where('genders.name', 'like', "%{$key}%")->get();
    } else {
        // Si aucun champ de recherche n'est spécifié, vous pouvez ajuster le comportement ici.
        $searchedBooks = $query->get();
    }

    return view('book.search', compact('key', 'searchedBooks'));
}
}
