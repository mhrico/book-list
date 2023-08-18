<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    return view('welcome');
});

Route::get('/booklist', [BookController::class, 'index'])->name('book.index');
Route::get('/booklist/create', [BookController::class, 'create'])->name('book.create');
Route::post('/booklist/create', [BookController::class, 'store'])->name('book.store');
Route::get('/booklist/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/booklist/{book}/edit', [BookController::class, 'update'])->name('book.update');
Route::delete('/booklist/{book}/delete', [BookController::class, 'delete'])->name('book.delete');
Route::get('/booklist/search', [BookController::class, 'search'])->name('book.search');
Route::get('/booklist/download', [BookController::class, 'download'])->name('book.download');
