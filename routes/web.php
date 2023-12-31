<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

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
    //Article
    Route::resource('admin', ArticleController::class);
    Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::get('admin/articles/{id}/edit', 'ArticleController@edit')->name('admin.articles.edit');
    Route::delete('admin/articles/{id}', 'ArticleController@destroy')->name('admin.articles.destroy');
    Route::get('getArticles', [ArticleController::class, 'getData'])->name('articles.getData');

    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/update-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::post('/admin/articles/update/{id}', [ArticleController::class, 'update'])->name('admin.update');
});

Auth::routes();

Route::get('/articles/{id}/{title}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
