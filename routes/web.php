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
Route::resource('users', \App\Http\Controllers\UserController::class);
//Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::delete('users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::put('users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
