<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('index');
// });


// Route::get('/auth', function () {
//     return view('auth');
// });


Route::resource('authors', AuthorController::class)->middleware('auth');
Route::resource('books', BookController::class)->middleware('auth');

Route::get('login', function () {
    if (Auth::check()) {
        redirect(route('authors.index'));
    }
    return (view('login'));
})->name('login_get');

Route::post('login', [AuthController::class, 'login'])->name('login_post');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');