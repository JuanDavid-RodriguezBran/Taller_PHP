<?php
namespace Models;

class BookingModel {
    private $file;

    // Horarios disponibles por día (puedes cambiar esto)
    private $availableSlots = [
        "09:00", "10:00", "11:00",
        "14:00", "15:00", "16:00",
    ];

    public function __construct(){
        $dir = __DIR__ . '/../../storage';
        if (!is_dir($dir)) mkdir($dir,0777,true);
        $this->file = $dir . '/bookings.json';
        if (!file_exists($this->file)) file_put_contents($this->file, json_encode([]));
    }

    private function read(){ return json_decode(file_get_contents($this->file), true); }
    private function write($d){ file_put_contents($this->file,json_encode($d)); }

    public function getAll(){ return $this->read(); }

    public function getAvailableSlots($date){
        $booked = array_filter($this->read(), fn($b) => $b['date'] === $date);
        $bookedSlots = array_column($booked, 'time');

        return array_values(array_filter($this->availableSlots, fn($slot) =>
            !in_array($slot, $bookedSlots)
        ));
    }

    public function book($date, $slot, $name, $service){
        $data = $this->read();
        $id = count($data) ? end($data)['id'] + 1 : 1;

        $data[] = [
            'id' => $id,
            'date' => $date,
            'time' => $slot,
            'name' => $name,
            'service' => $service
        ];

        $this->write($data);
    }
}

