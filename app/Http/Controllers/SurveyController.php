<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveyModel = new Survey();
        $surveys = $surveyModel->all();

        return view('encuestas.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'options' => 'required|string'
        ]);

        $surveyModel = new Survey();
        $surveyModel->create(
            $request->title,
            $request->options
        );

        return redirect()->back();
    }

    public function respond(Request $request, $id)
    {
        $request->validate([
            'choice' => 'required|integer'
        ]);

        $surveyModel = new Survey();
        $surveyModel->respond($id, $request->choice);

        return redirect()->back();
    }
}
