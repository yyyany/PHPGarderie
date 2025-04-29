<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\CategorieDepenseController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\EducatorController;

/*
|--------------------------------------------------------------------------
| Web Routess
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::post('/posts/update/{id}',[PostController::class,'updatePost'])->name('posts.update');

Route::get('/', [NurseryController::class, 'index'])->name('nursery.index');
Route::get('/Nurseries', [NurseryController::class, 'index'])->name('Nurseries');
Route::delete('/nursery/clear', [NurseryController::class, 'clear'])->name('nursery.clear');
Route::delete('/nursery/delete/{id}',[NurseryController::class,'delete'])->name('nursery.delete');
//on fait pas {request } comme parametre mais on le fait pas 
Route::post('/nursery/add',[NurseryController::class,'add'])->name('nursery.add');
Route::post('/nursery/update/{id}',[NurseryController::class,'update'])->name('nursery.update');
//vue qu'on veut que la page soit accessible apr l'utilsiateur 
Route::get('/nursery/formModifyNursery/{id}', [NurseryController::class, 'formModifyNursery'])->name('nursery.formModifyNursery');

// Routes pour les dépenses
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.index');
Route::post('/expense/add', [ExpenseController::class, 'add'])->name('expense.add');
Route::delete('/expense/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
Route::delete('/expense/clear', [ExpenseController::class, 'clear'])->name('expense.clear');
Route::get('/expense/formModifyExpense/{id}', [ExpenseController::class, 'formModifyExpense'])->name('expense.formModifyExpense');
Route::post('/expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');

//les Request on les fait pas dans lurl
Route::get('/Commerces', [CommerceController::class, 'index'])->name('commerce.index');
Route::delete('/commerce/clear', [CommerceController::class, 'clear'])->name('commerce.clear');
Route::delete('/commerce/delete/{id}',[CommerceController::class,'delete'])->name('commerce.delete');
Route::post('/commerce/add',[CommerceController::class,'add'])->name('commerce.add');
Route::post('/commerce/update/{id}',[CommerceController::class,'update'])->name('commerce.update');
Route::get('/commerce/formModifyCommerce/{id}', [CommerceController::class, 'formModifyCommerce'])->name('commerce.formModifyCommerce');

// Routes pour les catégories de dépense
Route::get('/categorie-depense', [CategorieDepenseController::class, 'index'])->name('categorieDepense.index');
Route::post('/categorie-depense/add', [CategorieDepenseController::class, 'add'])->name('categorieDepense.add');
Route::delete('/categorie-depense/delete/{id}', [CategorieDepenseController::class, 'delete'])->name('categorieDepense.delete');
Route::delete('/categorie-depense/clear', [CategorieDepenseController::class, 'clear'])->name('categorieDepense.clear');
Route::get('/categorie-depense/formModifyCategorieDepense/{id}', [CategorieDepenseController::class, 'formModifyCategorieDepense'])->name('categorieDepense.formModifyCategorieDepense');
Route::post('/categorie-depense/update/{id}', [CategorieDepenseController::class, 'update'])->name('categorieDepense.update');

// Routes pour les enfants
Route::get('/children', [ChildController::class, 'index'])->name('child.index');
Route::post('/child/add', [ChildController::class, 'add'])->name('child.add');
Route::delete('/child/delete/{id}', [ChildController::class, 'delete'])->name('child.delete');
Route::delete('/child/clear', [ChildController::class, 'clear'])->name('child.clear');
Route::get('/child/formModifyChild/{id}', [ChildController::class, 'formModifyChild'])->name('child.formModifyChild');
Route::post('/child/update/{id}', [ChildController::class, 'update'])->name('child.update');


//Routes pour les educateurs
Route::get('/educator', [EducatorController::class, 'index'])->name('educator.index');
Route::post('/educator/add', [EducatorController::class, 'add'])->name('educator.add');
Route::delete('/educator/delete/{id}', [EducatorController::class, 'delete'])->name('educator.delete');
Route::delete('/educator/clear', [EducatorController::class, 'clear'])->name('educator.clear');
Route::get('/educator/formModifyEducator/{id}', [EducatorController::class, 'formModifyEducator'])->name('educator.formModifyEducator');
Route::post('/educator/update/{id}', [EducatorController::class, 'update'])->name('educator.update');

//Routes pour les présences
Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');
Route::post('/presence/add', [PresenceController::class, 'add'])->name('presence.add');
Route::delete('/presence/delete/{id}', [PresenceController::class, 'delete'])->name('presence.delete');
Route::delete('/presence/clear', [PresenceController::class, 'clear'])->name('presence.clear');