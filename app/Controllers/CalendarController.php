<?php
namespace Controllers;

use Core\Controller;
use Models\CalendarModel;

class CalendarController extends Controller {

    public function index() {
        $m = new CalendarModel();

        // Crear evento
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
            $m->add(
                $_POST['date'],
                $_POST['time'],
                $_POST['title'],
                $_POST['reminder_time'],
                $_POST['reminder_text']
            );
            header('Location: index.php?app=calendar'); exit;
        }

        // Eliminar evento
        if (isset($_GET['delete'])) {
            $m->delete(intval($_GET['delete']));
            header('Location: index.php?app=calendar'); exit;
        }

        // Editar página
        if (isset($_GET['edit'])) {
            $event = $m->find(intval($_GET['edit']));
            $this->view(__DIR__ . '/../Views/calendar/edit.php', ['event' => $event]);
            return;
        }

        // Guardar edición
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update') {
            $m->update(
                intval($_POST['id']),
                $_POST['date'],
                $_POST['time'],
                $_POST['title'],
                $_POST['reminder_time'],
                $_POST['reminder_text']
            );
            header('Location: index.php?app=calendar'); exit;
        }

        // Listado normal
        $events = $m->all();
        $this->view(__DIR__ . '/../Views/calendar/index.php', ['events'=>$events]);
    }
}

