<?php

use App\Http\Controllers\Admin\Prospects\ProspectsController;

//Prefix: prospects
//name: admin.prospects.create

Route::get('/', [ProspectsController::class, 'index'])->name('dashboard');
Route::get('create', [ProspectsController::class, 'create'])->name('create');
Route::get('/show/{id}', [ProspectsController::class, 'show'])->name('show');
Route::put('/update/{id}', [ProspectsController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [ProspectsController::class, 'destroy'])->name('delete');
Route::get('search', [ProspectsController::class, 'search'])->name('search');
Route::post('search', [ProspectsController::class, 'search'])->name('search');
Route::post('/', [ProspectsController::class, 'store'])->name('store');
Route::get('/prospect_export', [ProspectsController::class, 'get_prospect_data'])->name('export');
