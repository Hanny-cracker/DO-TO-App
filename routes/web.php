<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::get('/todos/show/{{id}}', [TodoController::class, 'show'])->name('todos.show');
