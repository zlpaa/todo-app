<?php

// Mengimpor controller yang digunakan untuk menangani berbagai aksi terkait task dan task list.
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;

// Mengimpor facade Route yang digunakan untuk mendefinisikan route di aplikasi Laravel.
use Illuminate\Support\Facades\Route;

// Membuat route untuk halaman utama (home). 
// Route ini akan memanggil metode 'index' dari TaskController dan memberikan nama 'home' pada route tersebut.
// Saat route '/' diakses, metode 'index' dari TaskController akan dipanggil.
Route::get('/', [TaskController::class, 'index'])->name('home');

// Mendefinisikan resource route untuk resource 'lists', yang akan mengarah ke TaskListController.
// Route ini akan secara otomatis menghasilkan semua route standar untuk CRUD (Create, Read, Update, Delete) 
// sesuai dengan metode yang ada di dalam TaskListController.
Route::resource('lists', TaskListController::class);

// Mendefinisikan resource route untuk resource 'tasks', yang akan mengarah ke TaskController.
// Sama seperti route 'lists', route ini akan menghasilkan semua route standar untuk CRUD task.
Route::resource('tasks', TaskController::class);

// Menambahkan route tambahan untuk menangani pembaruan status tugas menjadi 'complete'.
// Route ini menggunakan metode PATCH untuk memperbarui status tugas tertentu (ditandai dengan {task}).
// Perubahan status dilakukan melalui metode 'complete' di TaskController, dan route ini dinamai 'tasks.complete'.
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Menambahkan route tambahan untuk mengubah daftar tugas (list) tempat tugas berada.
// Route ini menggunakan metode PATCH untuk memperbarui daftar tugas yang ditugaskan pada task tertentu.
// Perubahan ini dilakukan melalui metode 'changeList' di TaskController, dan route ini dinamai 'tasks.changeList'.
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');
