<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    $pageTitle = "BaRa - Baca Aksara";
    return view('welcome', compact("pageTitle"));
});

    //home
    Route::get('home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Article
    Route::resource('admin', ArticleController::class);
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();
