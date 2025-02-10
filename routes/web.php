<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [homecontroller::class, 'index']); // Halaman utama
Route::get('/search', [HomeController::class, 'search'])->name('home.search'); // Fitur pencarian
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');

Route::resource('lists', TaskListController::class);

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
