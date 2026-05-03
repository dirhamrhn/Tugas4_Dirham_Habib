<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List App</title>
    <!-- Menggunakan Tailwind CSS untuk styling cepat -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #121212; color: #e5e7eb; }
        .accent-gold { color: #d4af37; }
        .focus-gold:focus { border-color: #d4af37; outline: none; }
        .btn-teal { background-color: #0f766e; }
        .btn-teal:hover { background-color: #115e59; }
    </style>
</head>
<body class="antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg bg-[#1e1e1e] rounded-xl shadow-2xl border border-gray-800 p-8">
        <h1 class="text-3xl font-bold mb-6 text-center accent-gold tracking-wide">To-Do List</h1>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-900/50 border border-green-800 text-green-400 rounded-lg text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- ========================================== -->
        <!-- FITUR CREATE (Bagian Temanmu)              -->
        <!-- ========================================== -->
        <form action="{{ url('/tasks') }}" method="POST" class="mb-8 flex gap-3">
            @csrf
            <input type="text" name="title" placeholder="Ketik tugas baru di sini..." required
                   class="flex-1 px-4 py-3 bg-[#2d2d2d] border border-gray-700 rounded-lg focus-gold text-gray-200 transition-colors shadow-inner">
            <button type="submit" class="px-6 py-3 btn-teal text-white rounded-lg font-semibold transition-all shadow-md">
                Tambah
            </button>
        </form>

        <!-- ========================================== -->
        <!-- FITUR READ & DELETE (Bagianmu)             -->
        <!-- ========================================== -->
        <div class="space-y-4">
            <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-wider border-b border-gray-700 pb-2">
                Daftar Tugas Tersimpan
            </h2>

            @if($tasks->isEmpty())
                <p class="text-center text-gray-500 italic py-6">Yeay! Semua tugas sudah selesai.</p>
            @else
                <ul class="space-y-3">
                    @foreach($tasks as $task)
                        <li class="flex items-center justify-between p-4 bg-[#252525] rounded-lg border border-gray-800 shadow-sm hover:border-gray-600 transition-colors">
                            <span class="text-gray-200 font-medium">{{ $task->title }}</span>
                            
                            <!-- Form Delete -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-900/60 hover:bg-red-800 text-red-300 hover:text-white text-xs rounded transition-colors border border-red-800/50">
                                    Hapus
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</body>
</html>