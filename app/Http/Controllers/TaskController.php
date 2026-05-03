<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // ==========================================
    // FITUR CREATE (Dikerjakan oleh Temanmu)
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        // Simpan data ke database (hilangkan kata 'return' di depannya)
        Task::create($request->all());

        // Redirect/kembalikan user ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    // ==========================================
    // FITUR READ & DELETE (Dikerjakan olehmu)
    // ==========================================
    
    // Fungsi untuk READ [GET]
    public function index()
    {
        // Mengambil semua data dari database
        $tasks = Task::all(); 
        
        // Melempar data ke tampilan (view)
        return view('welcome', compact('tasks')); 
    }

    // Fungsi untuk DELETE [DELETE]
    public function destroy($id)
    {
        // Mencari task lalu menghapusnya
        $task = Task::findOrFail($id);
        $task->delete();

        // Mengembalikan user ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'Task berhasil dihapus!');
    }
}