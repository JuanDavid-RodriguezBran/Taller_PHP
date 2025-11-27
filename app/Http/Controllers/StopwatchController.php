<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopwatchController extends Controller
{
    public function index()
    {
        return view('stopwatch.index');
    }
}

