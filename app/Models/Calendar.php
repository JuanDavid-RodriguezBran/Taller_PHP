<?php

namespace App\Models;

class Calendar
{
    private $file;

    public function __construct()
    {
        $dir = storage_path('app/json');

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $this->file = $dir . '/calendar.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    private function read(): array
    {
        return json_decode(file_get_contents($this->file), true);
    }

    private function write(array $data): void
    {
        file_put_contents($this->file, json_encode($data));
    }

    public function all(): array
    {
        return $this->read();
    }

    public function find(int $id): ?array
    {
        foreach ($this->read() as $e) {
            if ($e['id'] == $id) return $e;
        }
        return null;
    }

    public function add($date, $time, $title, $reminderTime, $reminderText)
    {
        $events = $this->read();

        $id = count($events) ? end($events)['id'] + 1 : 1;

        $events[] = [
            'id' => $id,
            'date' => $date,
            'time' => $time,
            'title' => $title,
            'reminder_time' => $reminderTime,
            'reminder_text' => $reminderText
        ];

        $this->write($events);
    }

    public function delete(int $id)
    {
        $events = array_filter($this->read(), fn($e) => $e['id'] != $id);
        $this->write(array_values($events));
    }

    public function update($id, $date, $time, $title, $reminderTime, $reminderText)
    {
        $events = $this->read();

        foreach ($events as &$e) {
            if ($e['id'] == $id) {
                $e['date'] = $date;
                $e['time'] = $time;
                $e['title'] = $title;
                $e['reminder_time'] = $reminderTime;
                $e['reminder_text'] = $reminderText;
            }
        }

        $this->write($events);
    }
}
