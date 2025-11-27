<?php

namespace App\Models;

class PasswordGenerator
{
    public function generate(int $length = 12, bool $upper = true, bool $numbers = true, bool $symbols = true): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz';

        if ($upper) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        if ($numbers) {
            $chars .= '0123456789';
        }

        if ($symbols) {
            $chars .= '!@#$%^&*()-_=+[]{};:,.<>?';
        }

        $pwd = '';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $pwd .= $chars[random_int(0, $max)];
        }

        return $pwd;
    }
}
