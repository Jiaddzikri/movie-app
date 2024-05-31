<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MoviesController::class, "index"])->name('movies.index');
Route::get('/movie/{movie}', [MoviesController::class, "show"])->name('movies.show');   
