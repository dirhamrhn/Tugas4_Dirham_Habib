<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Fitur READ [GET] - Menampilkan daftar task
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Fitur DELETE [DELETE] - Menghapus task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/', function () {
    return view('welcome');
});
