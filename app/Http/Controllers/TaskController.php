<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    $belumTasks = Task::with('category')
        ->where('status', 'belum')
        ->get();

    $selesaiTasks = Task::with('category')
        ->where('status', 'selesai')
        ->get();

    $categories = Category::all();

    return view('tasks.index', compact('belumTasks', 'selesaiTasks', 'categories'));
    }

    public function store(Request $request)
    {
        Task::create([
            'category_id' => $request->category_id,
            'judul_tugas' => $request->judul_tugas,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    public function storeCategory(Request $request)
    {
    Category::create([
        'mata_kuliah' => $request->mata_kuliah
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

    public function delete($id)
    {
    $task = Task::find($id);

    $task->delete();

    return redirect('/');
    }

    public function edit($id)
    {
    $task = Task::find($id);

    $categories = Category::all();

    return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, $id)
    {
    $task = Task::find($id);

    $task->update([
        'category_id' => $request->category_id,
        'judul_tugas' => $request->judul_tugas,
        'deadline' => $request->deadline,
        'status' => $request->status,
    ]);

    return redirect('/');
    }
}