<?php

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

Route::resource('/', 'App\Http\Controllers\IndexController');

Route::resource('admin-list-anime', 'App\Http\Controllers\AnimeController');
Route::resource('admin-list-peliculas', 'App\Http\Controllers\PeliculasController');
Route::resource('admin-capitulos-anime', 'App\Http\Controllers\CapitulosAnimeController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
