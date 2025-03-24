<?php

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

// Routes pour les garderies
Route::get('/garderies', function () {
    return view('welcome');
})->name('garderies.index');
Route::post('/garderies', function () {
    // La logique sera implémentée plus tard
    return redirect()->route('garderies.index');
})->name('garderies.store');

// Routes pour les dépenses
Route::get('/depenses', function () {
    return view('welcome');
})->name('depenses.index');

// Routes pour les commerces
Route::get('/commerces', function () {
    return view('welcome');
})->name('commerces.index');

// Routes pour les catégories de dépense
Route::get('/categories', function () {
    return view('welcome');
})->name('categories.index');

// Routes pour les enfants
Route::get('/enfants', function () {
    return view('welcome');
})->name('enfants.index');

// Routes pour les éducateurs
Route::get('/educateurs', function () {
    return view('welcome');
})->name('educateurs.index');

// Routes pour les présences
Route::get('/presences', function () {
    return view('welcome');
})->name('presences.index');

// Routes pour les rapports
Route::get('/rapport', function () {
    return view('welcome');
})->name('rapport.index');
