<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    public function index()
    {
        $model = new Notes();
        $notes = $model->all();

        return view('notes.index', compact('notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content'  => 'required|string',
        ]);

        $model = new Notes();
        $model->add(
            $request->title,
            $request->content,
            $request->category ?? ''
        );

        return redirect()->route('notes.index');
    }
}
