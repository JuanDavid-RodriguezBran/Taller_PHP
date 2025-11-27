<?php

namespace App\Models;

class Notes
{
    private $file;

    public function __construct()
    {
        $dir = storage_path('app/json');

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $this->file = $dir . '/notes.json';

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

    public function add(string $title, string $content, string $category): void
    {
        $data = $this->read();
        $id = count($data) ? end($data)['id'] + 1 : 1;

        $data[] = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'category' => $category
        ];

        $this->write($data);
    }

    public function all(): array
    {
        return $this->read();
    }
}
