<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/data-table', function(){
    return view('page.data-table');
});

Route::get('/table', function(){
    return view ('page.table');
});

Route::middleware(['auth'])->group(function () {
    //CRUD Casts
    Route::resource('casts', CastController::class);

    //Edit-Update Users
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

    Route::post('/reviews/{films_id}',[ReviewsController::class, 'store']);
});

    //CRUD Genres
    Route::resource('genres', GenresController::class);

    //CRUD Films
    Route::resource('films', FilmsController::class);
    
Auth::routes();
