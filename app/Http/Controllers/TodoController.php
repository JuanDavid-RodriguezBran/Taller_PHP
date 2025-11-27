<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $model = new Todo();
        $tasks = $model->all();

        return view('tareas.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['text' => 'required|string']);
        $model = new Todo();
        $model->add($request->text);

        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);
        $model = new Todo();
        $model->updateStatus($id, $request->status);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $model = new Todo();
        $model->delete($id);

        return redirect()->back();
    }
}

