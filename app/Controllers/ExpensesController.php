<?php

namespace Controllers;

use Core\Controller;
use Models\ExpensesModel;

class ExpensesController extends Controller
{
    public function index(): void
    {
        $model = new ExpensesModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            if ($action === 'add') {
                $date = $_POST['date'] ?? '';
                $category = $_POST['category'] ?? '';
                $amount = floatval($_POST['amount'] ?? 0);
                $description = $_POST['desc'] ?? '';

                $model->add($date, $category, $amount, $description);
            }
            
            header('Location: index.php?app=expenses'); 
            exit;
        }

        $summary = $model->summary();
        $items = $model->all();
        
        $this->view(__DIR__ . '/../Views/expenses/index.php', [
            'items' => $items,
            'summary' => $summary
        ]);
    }
}