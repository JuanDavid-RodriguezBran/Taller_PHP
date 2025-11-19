<?php

namespace Controllers;

use Core\Controller;
use Models\PasswordModel;

class PasswordController extends Controller
{
    public function index(): void
    {
        $pwd = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $len = intval($_POST['length'] ?? 12);
            $useUpper = isset($_POST['upper']);
            $useNumbers = isset($_POST['numbers']);
            $useSymbols = isset($_POST['symbols']);
            
            $model = new PasswordModel();
            
            $pwd = $model->generate($len, $useUpper, $useNumbers, $useSymbols);
        }

        $this->view(__DIR__ . '/../Views/password/index.php', [
            'pwd' => $pwd
        ]);
    }
}
