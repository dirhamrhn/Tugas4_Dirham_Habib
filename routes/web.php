<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// ==========================================
// Halaman Utama
// ==========================================
Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// Rute untuk Fitur CREATE (Dikerjakan Temanmu)
// ==========================================
Route::post('/tasks', [TaskController::class, 'store']);

// ==========================================
// Rute untuk Fitur READ & DELETE (Dikerjakan Olehmu)
// ==========================================

// Menampilkan daftar task
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Menghapus task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');