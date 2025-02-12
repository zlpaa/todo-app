<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/search', [HomeController::class, 'search'])->name('home.search'); // Fitur pencarian
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::view('/tabel-warna', 'tabel-warna');


// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


Route::resource('lists', TaskListController::class);

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
