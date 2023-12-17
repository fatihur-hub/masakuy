<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\UiController;
use App\Http\Controllers\UserController;
use App\Models\User;
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



// Route::get('/',[UiController::class, 'index']);
Route::get('/',[UiController::class, 'indexResep'])->name('indexresep');
Route::get('/resep/search',[UiController::class, 'searchResep'])->name('searchResep');
Route::get('/artikel',[UiController::class, 'indexArtikel'])->name('indexartikel');
Route::get('/artikel/{slug}',[UiController::class, 'showArtikel'])->name('showartikel');
Route::get('/resep/{id}',[UiController::class, 'showResep'])->name('resepdetail');
Auth::routes();


Route::prefix('admin')->middleware(['auth'])->group(function (){
    Route::put('/resep/updateStatus/{id}', [ResepController::class, 'updateStatus'])->name('resep.updateStatus');

    Route::resource('/users', UserController::class);
    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/komen', KomenController::class);
    Route::resource('/resep', ResepController::class);
    Route::resource('/kategori', KategoriController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
