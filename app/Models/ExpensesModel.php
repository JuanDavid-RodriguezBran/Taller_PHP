<?php

namespace Models;

class ExpensesModel
{
    private $file;

    public function __construct()
    {
        $dir = __DIR__ . '/../../storage';
        
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        $this->file = $dir . '/expenses.json';
        
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

    public function add(string $date, string $cat, float $amount, string $desc): void
    {
        $data = $this->read();
        
        // Determinar el ID: si hay datos, toma el ID del último elemento y suma 1; si no hay datos, empieza en 1.
        $id = count($data) ? end($data)['id'] + 1 : 1;
        
        $data[] = [
            'id' => $id,
            'date' => $date,
            'category' => $cat,
            'amount' => $amount,
            'desc' => $desc
        ];
        
        $this->write($data);
    }

    public function all(): array
    { 
        return $this->read(); 
    }

    public function summary(): array
    {
        $data = $this->read();
        $byMonth = [];
        
        foreach ($data as $d) {
            $m = date('Y-m', strtotime($d['date']));
            
            if (!isset($byMonth[$m])) {
                $byMonth[$m] = 0;
            }
            
            $byMonth[$m] += $d['amount'];
        }
        
        return $byMonth;
    }
}
