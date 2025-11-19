<?php

namespace Controllers;

use Core\Controller;
use Models\TodoModel;

class TodoController extends Controller
{
    public function index(): void
    {
        $model = new TodoModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            if ($action === 'add') {
                $model->addTask(trim($_POST['task'] ?? ''));
            } elseif ($action === 'delete') {
                $model->deleteTask(intval($_POST['id'] ?? 0));
            } elseif ($action === 'change_status') {
                $model->changeStatus(
                    intval($_POST['id']),
                    $_POST['status'] ?? 'pendiente'
                );
            }

            header('Location: index.php?app=todo');
            exit;
        }

        $tasks = $model->getAll();
        $this->view(__DIR__ . '/../Views/todo/index.php', [
            'tasks' => $tasks
        ]);
    }
}

