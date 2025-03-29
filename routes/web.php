<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseryController;

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
//Route::post('/posts/update/{id}',[PostController::class,'updatePost'])->name('posts.update');


Route::get('/', [NurseryController::class, 'index'])->name('nursery.index');
Route::delete('/nursery/clear', [NurseryController::class, 'clear'])->name('nursery.clear');
Route::delete('/nursery/delete/{id}',[NurseryController::class,'delete'])->name('nursery.delete');
//on fait pas {request } comme parametre mais on le fait pas 
Route::post('/nursery/add',[NurseryController::class,'add'])->name('nursery.add');
Route::post('/nursery/update/{id}',[NurseryController::class,'update'])->name('nursery.update');
//vue qu'on veut que la page soit accessible apr l'utilsiateur 
Route::get('/nursery/formModifyNursery/{id}', [NurseryController::class, 'formModifyNursery'])->name('nursery.formModifyNursery');