<?php

namespace App\Models;

class Booking
{
    private $file;

    private $availableSlots = [
        "09:00", "10:00", "11:00",
        "14:00", "15:00", "16:00",
    ];

    public function __construct()
    {
        $dir = storage_path('app/json');

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $this->file = $dir . '/bookings.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    private function read()
    {
        return json_decode(file_get_contents($this->file), true);
    }

    private function write($data)
    {
        file_put_contents($this->file, json_encode($data));
    }

    public function all()
    {
        return $this->read();
    }

    public function getAvailableSlots($date)
    {
        $bookings = array_filter($this->read(), fn($b) => $b['date'] === $date);
        $taken = array_column($bookings, 'time');

        return array_values(array_filter($this->availableSlots, fn($slot) =>
            !in_array($slot, $taken)
        ));
    }

    public function book($date, $slot, $name, $service)
    {
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
