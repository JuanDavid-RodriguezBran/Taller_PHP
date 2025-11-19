<?php

namespace Controllers;

use Core\Controller;
use Models\NotesModel;

class NotesController extends Controller
{
    public function index(): void
    {
        $model = new NotesModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            if ($action === 'add') {
                $title = $_POST['title'] ?? '';
                $content = $_POST['content'] ?? '';
                $category = $_POST['category'] ?? '';
                
                $model->add($title, $content, $category);
            }
            
            header('Location: index.php?app=notes');
            exit;
        }

        $notes = $model->all();
        
        $this->view(__DIR__ . '/../Views/notes/index.php', [
            'notes' => $notes
        ]);
    }
}
