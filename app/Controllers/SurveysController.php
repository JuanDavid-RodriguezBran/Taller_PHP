<?php

namespace Controllers;

use Core\Controller;
use Models\SurveysModel;

class SurveysController extends Controller
{
    public function index(): void
    {
        $model = new SurveysModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create'])) {
                $title = $_POST['title'] ?? '';
                $options = $_POST['options'] ?? '';
                $model->create($title, $options);
            }
            
            if (isset($_POST['respond'])) {
                $id = intval($_POST['id'] ?? 0);
                $choice = $_POST['choice'] ?? '';
                $model->respond($id, $choice);
            }
            
            header('Location: index.php?app=surveys'); 
            exit;
        }

        $surveys = $model->all();
        
        $this->view(__DIR__ . '/../Views/surveys/index.php', [
            'surveys' => $surveys
        ]);
    }
}