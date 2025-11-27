<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $model = new Recipe();

        $q = $request->query('q', '');
        $filter = $request->query('filter', '');

        $recipes = $model->search($q, $filter);
        $favorites = $model->favorites();

        return view('recetas.index', compact('recipes', 'favorites', 'q', 'filter'));
    }

    public function toggle(Request $request)
    {
        $model = new Recipe();
        $model->toggleFavorite($request->id);

        return redirect()->route('recetas.index');
    }
}

