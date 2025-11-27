<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index()
    {
        return view('memory.index');
    }
}
