<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Prospects\ProspectsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('prospects/all', [ProspectsController::class, 'all']);
Route::get('prospects/prospects_export', [ProspectsController::class, 'get_prospect_data'])->name('export');
Route::put('prospects/update/{id}', [ProspectsController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [ProspectsController::class, 'destroy'])->name('delete');
Route::get('prospects/filter', [ProspectsController::class, 'filteredProspect']);
Route::post('/prospects/create', [ProspectsController::class, 'store'])->name('store');
