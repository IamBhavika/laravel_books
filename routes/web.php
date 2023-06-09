<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['onlyLogged'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/add-book', [BooksController::class, 'addBook']);
    Route::post('/save-book', [BooksController::class, 'saveBook']);
    Route::get('/genre', [BooksController::class, 'genre']);
    Route::get('/show-books/{genre}', [BooksController::class, 'showBooks']);
    Route::get('/reviews/{id}', [BooksController::class, 'showReviews']);
    Route::get('/add-review', [BooksController::class, 'addReview']);
    Route::get('/adding-review/{id}', [BooksController::class, 'addingReview']);
    Route::post('save-review', [BooksController::class, 'saveReview']);
    Route::get('all-reviews', [BooksController::class, 'seeAllReviews']);
    Route::any('search-book', [BooksController::class, 'searchBook']);
    Route::get('reset', [BooksController::class, 'resetSearch']);
});
