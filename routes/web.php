<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

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
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    $pageTitle = "BaRa - Baca Aksara";
    return view('welcome', compact("pageTitle"));
});

Route::middleware(['auth'])->group(function () {
    // Article
    Route::resource('admin', ArticleController::class);
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});

Auth::routes();

Route::get('/articles/{id}/{title}', [ArticleController::class, 'show'])->name('articles.show');
