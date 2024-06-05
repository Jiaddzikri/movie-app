<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MoviesController::class, "index"])->name('movies.index');
Route::get('/movie/{movie}', [MoviesController::class, "show"])->name('movies.show');   
Route::get('/movies', [MoviesController::class,'movies'])->name('movies.movies');
Route::get('/tv-show', [MoviesController::class, 'tvShow'])->name('movies.tvShow');
Route::get('/tv-show/{id}', [MoviesController::class, 'tvShowDetail'])->name('movies.tvShowDetails');
Route::get('/actors', [MoviesController::class,'actors'])->name('movies.actors');
Route::get('/actor/{id}', [MoviesController::class,'actor'])->name("movies.actor");
