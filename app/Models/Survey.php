<?php

namespace App\Models;

class Survey
{
    private string $file;

    public function __construct()
    {
        $this->file = storage_path('app/surveys.json');

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    private function read(): array
    {
        return json_decode(file_get_contents($this->file), true) ?? [];
    }

    private function write(array $data): void
    {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function all(): array
    {
        return $this->read();
    }

    public function create(string $title, string $options): void
    {
        $data = $this->read();
        $id = count($data) ? end($data)['id'] + 1 : 1;

        $opts = array_map('trim', explode(',', $options));

        $data[] = [
            'id' => $id,
            'title' => $title,
            'options' => $opts,
            'results' => array_fill(0, count($opts), 0)
        ];

        $this->write($data);
    }

    public function respond(int $id, int $choice): void
    {
        $data = $this->read();

        foreach ($data as &$survey) {
            if ($survey['id'] === $id) {
                if (isset($survey['results'][$choice])) {
                    $survey['results'][$choice]++;
                }
                break;
            }
        }

        $this->write($data);
    }
}
