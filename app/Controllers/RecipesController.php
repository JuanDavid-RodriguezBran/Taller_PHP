<?php

namespace Controllers;

use Core\Controller;
use Models\RecipesModel;

class RecipesController extends Controller
{
    public function index(): void
    {
        $model = new RecipesModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['favorite'])) {
                $model->toggleFavorite(intval($_POST['id']));
            }
            
            header('Location: index.php?app=recipes'); 
            exit;
        }

        $q = $_GET['q'] ?? '';
        $filter = $_GET['filter'] ?? '';
        
        $recipes = $model->search($q, $filter);
        $favorites = $model->favorites();
        
        $this->view(__DIR__ . '/../Views/recipes/index.php', [
            'recipes' => $recipes,
            'favorites' => $favorites,
            'q' => $q,
            'filter' => $filter
        ]);
    }
}
