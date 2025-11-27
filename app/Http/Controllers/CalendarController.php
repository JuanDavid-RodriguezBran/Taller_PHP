<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $model = new Calendar();
        $events = $model->all();

        return view('calendar.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'title' => 'required|string|max:255',
            'reminder_time' => 'nullable',
            'reminder_text' => 'nullable|string|max:255'
        ]);

        $model = new Calendar();
        $model->add(
            $request->date,
            $request->time,
            $request->title,
            $request->reminder_time,
            $request->reminder_text
        );

        return redirect()->route('calendar.index');
    }

    public function destroy($id)
    {
        $model = new Calendar();
        $model->delete($id);

        return redirect()->route('calendar.index');
    }

    public function edit($id)
    {
        $model = new Calendar();
        $event = $model->find($id);

        return view('calendar.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'title' => 'required|string|max:255',
            'reminder_time' => 'nullable',
            'reminder_text' => 'nullable|string|max:255'
        ]);

        $model = new Calendar();
        $model->update(
            $id,
            $request->date,
            $request->time,
            $request->title,
            $request->reminder_time,
            $request->reminder_text
        );

        return redirect()->route('calendar.index');
    }
}


