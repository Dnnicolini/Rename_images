<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\ZipController;


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





//Rotas imagens
Route::get('/',[ImagemController::class, 'index']);
Route::get('/imagens',[ImagemController::class, 'index']);
Route::get('/imagens/create',[ImagemController::class, 'create'])->name("imagens.create");
Route::post('/imagens/store',[ImagemController::class, 'store'])->name("imagens.store");
Route::get('/imagens/edit/{id}',[ImagemController::class, 'edit'])->name("imagens.edit");
Route::post('/imagens/update/{id}',[ImagemController::class, 'update'])->name("imagens.update");
Route::delete('/imagens/destroy/',[ImagemController::class,'destroy'])->name("imagens.delete");


Route::get('/downloads',[ZipController::class, 'downloadZip']);
