<?php
namespace Controllers;

use Core\Controller;
use Models\BookingModel;

class BookingController extends Controller {
    public function index() {

        $model = new BookingModel();
        $step = $_GET['step'] ?? 'select_date';

        // Paso 2: Confirmación de reserva
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $step === 'confirm') {
            $model->book($_POST['date'], $_POST['slot'], $_POST['name'], $_POST['service']);
            header("Location: index.php?app=booking&step=done");
            exit;
        }

        // Paso 1: Seleccionar fecha y mostrar disponibilidad
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $step === 'select_date') {
            $date = $_POST['date'];
            $available = $model->getAvailableSlots($date);

            $this->view(__DIR__ . '/../Views/booking/slots.php', [
                'date' => $date,
                'available' => $available
            ]);
            return;
        }

        // Step 3: Reserva completada
        if ($step === 'done') {
            $this->view(__DIR__ . '/../Views/booking/done.php');
            return;
        }

        // Step 0: mostrar formulario de fecha
        $this->view(__DIR__ . '/../Views/booking/index.php');
    }
}
