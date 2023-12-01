<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RateController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view(route('book.index'));
});
Route::get('/search', [BookController::class, 'search']);

Route::get('/dashboard', function () {
    return redirect(route('book.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

// pour verification adresse mail:
// Route::get('/only-verified', function () {
//     return view('only-verified');
//  })->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {

    Route::resource('book',BookController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::match(['GET', 'POST'], '/add-rating', [RateController::class, 'addRating']);
});

require __DIR__.'/auth.php';
