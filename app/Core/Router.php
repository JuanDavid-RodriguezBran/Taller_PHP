<?php

namespace Core;

class Router
{
    public function dispatch(array $get): void
    {
        $app = $get['app'] ?? 'home';

        switch ($app) {
            case 'tip':
                (new \Controllers\TipCalculatorController())->index();
                break;
            case 'todo':
                (new \Controllers\TodoController())->index();
                break;
            case 'password':
                (new \Controllers\PasswordController())->index();
                break;
            case 'expenses':
                (new \Controllers\ExpensesController())->index();
                break;
            case 'booking':
                (new \Controllers\BookingController())->index();
                break;
            case 'notes':
                (new \Controllers\NotesController())->index();
                break;
            case 'calendar':
                (new \Controllers\CalendarController())->index();
                break;
            case 'recipes':
                (new \Controllers\RecipesController())->index();
                break;
            case 'memory':
                (new \Controllers\MemoryController())->index();
                break;
            case 'surveys':
                (new \Controllers\SurveysController())->index();
                break;
            case 'stopwatch':
                (new \Controllers\StopwatchController())->index();
                break;
            default:
                (new \Controllers\HomeController())->index();
        }
    }
}