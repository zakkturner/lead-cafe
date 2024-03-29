<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.prospects.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::prefix('prospects')->middleware('auth')->name('admin.prospects.')->group(base_path('routes/web/prospects.php'));
Route::prefix('prospects')->name('admin.prospects.')->group(base_path('routes/web/prospects.php'));
