<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        return Task::create($request->all());
    }
}
