<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TacheController;
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

    Route::get('/Index', [TacheController::class ,'index'])->name('tache.index');
   Route::get('/taches/create', [TacheController::class ,'create'])->name('tache.create');
   Route::get('/taches/{id}/edit', [TacheController::class ,'edit'])->name('tache.edit');
   Route::post('/taches', [TacheController::class ,'store'])->name('tache.store');
   Route::post('/taches/{id}', [TacheController::class ,'update'])->name('tache.update');
   Route::view('/delete/{id}', 'delete')->name('delete');
   Route::delete('/taches/{id}', [TacheController::class ,'destroy'])->name('tache.destroy');
   Route::get('/tache/search', [TacheController::class, 'search'])->name('tache.search');


});

require __DIR__.'/auth.php';
