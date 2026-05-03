<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
<<<<<<< HEAD

// Fitur READ [GET] - Menampilkan daftar task
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Fitur DELETE [DELETE] - Menghapus task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
=======
>>>>>>> 3438bc0192a4dd0a6915c5aaf1674e6eba78db2f

Route::get('/', function () {
    return view('welcome');
});


Route::post('/tasks', [TaskController::class, 'store']);

