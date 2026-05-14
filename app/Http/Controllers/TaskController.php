<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create([
            'mata_kuliah' => $request->mata_kuliah,
            'judul_tugas' => $request->judul_tugas,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    public function selesai($id)
    {
    $task = Task::find($id);

    $task->status = 'selesai';

    $task->save();

    return redirect('/');
    }
}