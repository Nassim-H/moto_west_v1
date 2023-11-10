<?php

use App\Http\Controllers\PieceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\MarqueController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/pieces', [PieceController::class, 'store'])->name('piece.store');
    Route::get('/piece/create', [PieceController::class, 'create'])->name('piece.create');
    Route::get('/pieces/{piece}', [PieceController::class, 'show'])->name('piece.show');
    Route::get('/pieces/{piece}/modifier', [PieceController::class, 'edit'])->name('piece.edit');
    Route::patch('/pieces/{piece}/update', [PieceController::class, 'update'])->name('piece.update');
    Route::delete('/pieces/{piece}/delete', [PieceController::class, 'destroy'])->name('piece.destroy');

    Route::get('/marques', [\App\Http\Controllers\MarqueController::class, 'index'])->name('marque.index');
    Route::get('/marques', [\App\Http\Controllers\MarqueController::class, 'index2'])->name('marque.index2');

    Route::get('/marques/create', [\App\Http\Controllers\MarqueController::class, 'create'])->name('marque.create');
    Route::post('/marques', [\App\Http\Controllers\MarqueController::class, 'store'])->name('marque.store');
    Route::get('/marques/{marque}', [\App\Http\Controllers\MarqueController::class, 'show'])->name('marque.show');
    Route::get('/marques/{marque}/modifier', [\App\Http\Controllers\MarqueController::class, 'edit'])->name('marque.edit');
    Route::patch('/marques/{marque}/update', [\App\Http\Controllers\MarqueController::class, 'update'])->name('marque.update');
    Route::delete('/marques/{marque}/delete', [\App\Http\Controllers\MarqueController::class, 'destroy'])->name('marque.destroy');
});


Route::get('/produits', [\App\Http\Controllers\PieceController::class, 'index2'])->name('produit');
Route::get('/pieces', [PieceController::class, 'index'])->name('piece.index');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
