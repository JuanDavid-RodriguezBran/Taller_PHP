<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    public function index()
    {
        $model = new Expenses();

        $summary = $model->summary();
        $items = $model->all();

        return view('expenses.index', compact('items', 'summary'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'     => 'required|date',
            'category' => 'required|string|max:255',
            'amount'   => 'required|numeric|min:0',
            'desc'     => 'nullable|string'
        ]);

        $model = new Expenses();

        $model->add(
            $request->date,
            $request->category,
            floatval($request->amount),
            $request->desc ?? ''
        );

        return redirect()->route('expenses.index');
    }
}

