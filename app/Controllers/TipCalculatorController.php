<?php

namespace Controllers;

use Core\Controller;
use Models\TipModel;

class TipCalculatorController extends Controller
{
    public function index(): void
    {
        $result = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = floatval($_POST['amount'] ?? 0);
            $percent = floatval($_POST['percent'] ?? 0);
            
            $model = new TipModel();
            
            $result = $model->calculate($amount, $percent);
        }

        $this->view(__DIR__ . '/../Views/tip/index.php', [
            'result' => $result
        ]);
    }
}
