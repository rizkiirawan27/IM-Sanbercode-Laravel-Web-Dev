<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CastsController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/data-table', function(){
    return view('page.data-table');
});

Route::get('/table', function(){
    return view ('page.table');
});

//CRUD Casts

// C => Create Data
// Route menuju form halaman create casts
Route::get('/casts/create', [CastsController::class, 'create']);

//Route untuk insert data ke database
Route::post('/casts', [CastsController::class, 'store']);

// R => Read Data
// Route yg menampilkan data dari db ke halaman browser
Route::get('/casts', [CastsController::class, 'index']);

// Route yg menampilkan data berdasarkan id
Route::get('/casts/{casts_id}', [CastsController::class, 'show']);

// U => Update Data
// Route yang mengarahkan ke form update data berdasarkan id
Route::get('/casts/{casts_id}/edit', [CastsController::class, 'edit']);

// Route yang menyimpan data update berdasarkan id
Route::put('/casts/{casts_id}', [CastsController::class, 'update']);

// D => Delete Data
// Route yang menghapus data berdasarkan id
Route::delete('casts/{casts_id}', [CastsController::class, 'destroy']);