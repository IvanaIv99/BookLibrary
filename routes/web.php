<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Back\Librarians\AuthorsController;
use App\Http\Controllers\Back\Librarians\BooksController;
use App\Http\Controllers\Back\Librarians\ReadersController;
use App\Http\Controllers\Back\Librarians\DashboardController as LibrariansDashboardController;

use App\Http\Controllers\Back\Readers\BooksController as ReadersBookController;
use App\Http\Controllers\Back\Readers\DashboardController as ReadersDashboardController;

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

Route::get('/', [FrontController::class,'home_login'])->name('home');

Route::group(['middleware'=>['auth','librarian']], function () {


    Route::prefix('/librarian/dashboard')->group(function (){

        Route::get('/', [LibrariansDashboardController::class,'index'])->name('librarian.dashboard');

        //Authors
        Route::get('/authors', [AuthorsController::class,'index'])->name('librarian.dashboard.authors');
        Route::post('/authors/create', [AuthorsController::class,'create'])->name('librarian.dashboard.authors.create');
        Route::post('/authors/edit', [AuthorsController::class,'edit'])->name('librarian.dashboard.authors.edit');
        Route::post('/authors/delete', [AuthorsController::class,'destroy'])->name('librarian.dashboard.authors.delete');

        //Books
        Route::get('/books', [BooksController::class,'index'])->name('librarian.dashboard.books');
        Route::post('/books/create', [BooksController::class,'create'])->name('librarian.dashboard.books.create');
        Route::post('/books/edit', [BooksController::class,'edit'])->name('librarian.dashboard.books.edit');
        Route::post('/books/delete', [BooksController::class,'destroy'])->name('librarian.dashboard.books.delete');


        //Readers
        Route::get('/readers', [ReadersController::class,'index'])->name('librarian.dashboard.readers');
        Route::post('/readers/create', [ReadersController::class,'create'])->name('librarian.dashboard.readers.create');
        Route::post('/readers/edit', [ReadersController::class,'edit'])->name('librarian.dashboard.readers.edit');
        Route::post('/readers/delete', [ReadersController::class,'destroy'])->name('librarian.dashboard.readers.delete');
    });




});
Route::group(['middleware'=>['auth','reader']], function () {

    Route::prefix('/reader/dashboard')->group(function (){

        Route::get('/', [ReadersDashboardController::class,'index'])->name('reader.dashboard');

        //Books
        Route::get('/books', [ReadersBookController::class,'index'])->name('reader.dashboard.books');

    });

});


Route::namespace('Auth')->group(function () {
    Route::post('/login_perform',[LoginController::class,'processLogin'])->name('login.perform');

});

Route::post('logout',[LoginController::class,'logout'])
    ->name('logout')
    ->middleware('auth');
