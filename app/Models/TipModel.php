<?php

namespace Models;

class TipModel
{
    public function calculate(float $amount, float $percent): array
    {
        $tip = ($amount * $percent) / 100.0;
        $total = $amount + $tip;
        
        return [
            'amount' => $amount,
            'percent' => $percent,
            'tip' => round($tip, 2),
            'total' => round($total, 2)
        ];
    }
}
