<?php

namespace Models;

class SurveysModel
{
    private $file;

    public function __construct()
    {
        $dir = __DIR__ . '/../../storage'; 
        
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        $this->file = $dir . '/surveys.json'; 
        
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

    public function create(string $title, string $optionsStr): void
    {
        $data = $this->read(); 
        $id = count($data) ? end($data)['id'] + 1 : 1;
        
        $opts = array_map('trim', explode(',', $optionsStr));
        
        $data[] = [
            'id' => $id,
            'title' => $title,
            'options' => $opts,
            'results' => array_fill(0, count($opts), 0)
        ];
        
        $this->write($data);
    }

    public function respond(int $id, string $choice): void
    {
        $data = $this->read();
        
        foreach ($data as &$survey) { 
            if ($survey['id'] === $id) { 
                $idx = intval($choice); 
                
                if (isset($survey['results'][$idx])) {
                    $survey['results'][$idx]++; 
                }
                
                break;
            } 
        } 
        
        $this->write($data);
    }

    public function all(): array
    { 
        return $this->read(); 
    }
}
