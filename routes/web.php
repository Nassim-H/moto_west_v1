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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/pieces/{piece}/edit', [PieceController::class, 'edit'])->name('piece.edit');
    Route::patch('/pieces/{piece}', [PieceController::class, 'update'])->name('piece.update');
    Route::delete('/pieces/{piece}', [PieceController::class, 'destroy'])->name('piece.destroy');
});



Route::get('/pieces', [PieceController::class, 'index'])->name('piece.index');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
