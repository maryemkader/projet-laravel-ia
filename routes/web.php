<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AgentIAController;

// Page d'accueil
Route::get('/', fn() => view('accueil'))->name('accueil');

// Contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Étudiants
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::post('/etudiants/{id}/update', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::post('/etudiants/{id}/delete', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');

// Activités
Route::get('/activites', [ActiviteController::class, 'index'])->name('activites.index');
Route::get('/activites/{id}', [ActiviteController::class, 'show'])->name('activites.show');
Route::post('/activites', [ActiviteController::class, 'store'])->name('activites.store');
Route::get('/activites/{id}/edit', [ActiviteController::class, 'edit'])->name('activites.edit');
Route::post('/activites/{id}/update', [ActiviteController::class, 'update'])->name('activites.update');
Route::post('/activites/{id}/delete', [ActiviteController::class, 'destroy'])->name('activites.destroy');

// Séances
Route::get('/seances', [SeanceController::class, 'index'])->name('seances.index');
Route::get('/seances/create', [SeanceController::class, 'create'])->name('seances.create');
Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');
Route::post('/seances/{id}/delete', [SeanceController::class, 'destroy'])->name('seances.destroy');

// Agent IA
Route::get('/agent', [AgentIAController::class, 'index'])->name('agent');
Route::post('/agent/chat', [AgentIAController::class, 'chat'])->name('agent.chat');