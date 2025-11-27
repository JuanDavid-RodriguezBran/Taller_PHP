<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        return view('propinas.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'percent' => 'required|numeric|min:0'
        ]);

        $amount = $request->amount;
        $percent = $request->percent;

        $tip = round(($amount * $percent) / 100, 2);
        $total = round($amount + $tip, 2);

        $result = [
            'amount' => $amount,
            'percent' => $percent,
            'tip' => $tip,
            'total' => $total
        ];

        return view('propinas.index', compact('result'));
    }
}

