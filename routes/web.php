<?php

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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el controlador animal
Route::get('animal', [AnimalController::class, 'index'])->name('animal.index');
Route::post('animal', [AnimalController::class, 'registrar'])->name('animal.registrar');
Route::get('animal/eliminar/{id}', [AnimalController::class, 'eliminar'])->name('animal.eliminar');