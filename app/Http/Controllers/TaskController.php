<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Fitur READ [GET] - Dikerjakan olehmu
    public function index()
    {
        // Mengambil semua data dari database
        $tasks = \App\Models\Task::all(); 
        
        // Melempar data ke tampilan (view)
        return view('welcome', compact('tasks')); 
    }

    // Fitur DELETE [DELETE] - Dikerjakan olehmu
    public function destroy($id)
    {
        // Mencari task lalu menghapusnya
        $task = \App\Models\Task::findOrFail($id);
        $task->delete();

        // Mengembalikan user ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'Task berhasil dihapus!');
    }
}