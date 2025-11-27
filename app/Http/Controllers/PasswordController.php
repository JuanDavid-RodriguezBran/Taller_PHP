<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordGenerator;

class PasswordController extends Controller
{
    public function index()
    {
        return view('password.index', ['pwd' => null]);
    }

    public function generate(Request $request)
    {
        $request->validate([
            'length' => 'required|integer|min:4|max:64',
        ]);

        $generator = new PasswordGenerator();

        $pwd = $generator->generate(
            $request->length,
            $request->has('upper'),
            $request->has('numbers'),
            $request->has('symbols')
        );

        return view('password.index', compact('pwd'));
    }
}
