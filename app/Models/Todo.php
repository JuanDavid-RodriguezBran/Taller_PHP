<?php

namespace App\Models;

class Todo
{
    private $file;

    public function __construct()
    {
        $dir = storage_path('app/json');
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $this->file = $dir . '/todos.json';
        if (!file_exists($this->file)) file_put_contents($this->file, json_encode([]));
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
        foreach ($this->read() as $task) {
            if ($task['id'] == $id) return $task;
        }
        return null;
    }

    public function add(string $text, string $status = 'pendiente'): void
    {
        $tasks = $this->read();
        $id = count($tasks) ? end($tasks)['id'] + 1 : 1;

        $tasks[] = [
            'id' => $id,
            'text' => $text,
            'status' => $status
        ];

        $this->write($tasks);
    }

    public function updateStatus(int $id, string $status): void
    {
        $tasks = $this->read();
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) $task['status'] = $status;
        }
        $this->write($tasks);
    }

    public function delete(int $id): void
    {
        $tasks = array_filter($this->read(), fn($t) => $t['id'] != $id);
        $this->write(array_values($tasks));
    }
}
