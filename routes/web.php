<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::delete('/profile', [AuthenticatedSessionController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [AnnonceController::class, 'index'])->name('home');
Route::get('/dashboard', [AnnonceController::class, 'dashboard'])->name('dashboard');
Route::get('/annonce/{id}', [AnnonceController::class, 'show'])->name('annonce.show');
Route::get('delete/annonce/{id}', [AnnonceController::class, 'destroy'])->name('annonce.destroy');
Route::get('/create/annonce', [AnnonceController::class, 'create'])->name('annonce.create');
Route::get('/edit/annonce/{id}', [AnnonceController::class, 'edit'])->name('annonce.edit');
Route::post('/update/annonce/{id}', [AnnonceController::class, 'update'])->name('annonce.update');
Route::post('/create/annonce', [AnnonceController::class, 'store']);
Route::get('/commentaire/{id}', [CommentaireController::class, 'destroy'])->name('commentaire.delete');
Route::get('/create/commentaire', [CommentaireController::class, 'store'])->name('commentaire.create');
Route::get('/commentaire/edit/{id}', [CommentaireController::class, 'edit'])->name('commentaire.edit');
Route::post('/commentaire/update/{id}', [CommentaireController::class, 'update'])->name('commentaire.update');
Route::get('/statistic', [AnnonceController::class, 'statistic'])->name('statistic');
Route::post('/search', [AnnonceController::class, 'search'])->name('search');
Route::post('/filtre', [AnnonceController::class, 'filtre'])->name('filtre');
// Route::delete('/annonce', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';
