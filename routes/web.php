<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InicioController;



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
    return view('home');
});
Route::get('/inicio',[InicioController::class, 'show'])->name('inicio.index')->middleware('auth');
Route::get('/categorias',[CategoriaController::class,'index'])->name('categoria.index')->middleware('auth');
Route::get('/categorias/create', [CategoriaController::class,'create'])->name('categoria.create')->middleware('auth');
Route::post('/categorias',[CategoriaController::class,'store'])->name('categoria.store');
Route::get('/categorias/{id}/edit',[CategoriaController::class,'edit'])->name('categoria.edit')->middleware('auth');
Route::patch('/categorias/{id}', [CategoriaController::class,'update'])->name('categoria.update');
Route::delete('/categorias/{id}',[CategoriaController::class,'destroy'])->name('categoria.destroy');
Route::get('/categorias/{id}/show',[CategoriaController::class,'show'])->name('categoria.show')->middleware('auth');
Route::get('/gastos',[GastosController::class,'index'])->name('gasto.index')->middleware('auth');
Route::get('/gastos/create',[GastosController::class,'create'])->name('gasto.create')->middleware('auth');
Route::post('/gastos',[GastosController::class,'store'])->name('gasto.store');
Route::get('/gastos/{id}/edit',[GastosController::class,'edit'])->name('gasto.edit')->middleware('auth');
Route::patch('/gastos/{id}', [GastosController::class,'update'])->name('gasto.update');
Route::delete('/gastos/{id}',[GastosController::class,'destroy'])->name('gasto.destroy');
Route::get('/gasto/{id}/show',[GastosController::class,'show'])->name('gasto.show')->middleware('auth');
Route::get('/register',[AuthController::class, 'register'])->name('Auth.register');
Route::post('/register/store',[AuthController::class, 'store'])->name('Auth.store');
Route::get('/login',[AuthController::class,'login'])->name('Auth.login');
Route::post('/login/store',[AuthController::class,'storeLogin'])->name('Auth.storeLogin');
Route::get('/logout',[AuthController::class,'destroy'])->name('Auth.destroy');