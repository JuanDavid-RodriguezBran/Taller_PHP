<?php

namespace App\Models;

class Recipe
{
    private array $data = [
        ['id' => 1, 'title' => 'Spaghetti Bolognese', 'type' => 'Pasta', 'ingredients' => 'pasta,tomato,beef'],
        ['id' => 2, 'title' => 'Ensalada César', 'type' => 'Salad', 'ingredients' => 'lettuce,croutons,cheese'],
        ['id' => 3, 'title' => 'Tacos al Pastor', 'type' => 'Mexican', 'ingredients' => 'pork,tortilla,onion'],
        ['id' => 4, 'title' => 'Sopa de Lentejas', 'type' => 'Soup', 'ingredients' => 'lentils,carrot,onion'],
    ];

    public function search(string $q, string $filter): array
    {
        $res = array_filter($this->data, function ($r) use ($q, $filter) {
            $ok = true;

            if ($q !== '') {
                $ok = stripos($r['title'], $q) !== false ||
                      stripos($r['ingredients'], $q) !== false;
            }

            if ($filter !== '') {
                $ok = $ok && $r['type'] === $filter;
            }

            return $ok;
        });

        return array_values($res);
    }

    public function favorites(): array
    {
        return session('recipes_fav', []);
    }

    public function toggleFavorite(int $id): void
    {
        $fav = session('recipes_fav', []);

        if (in_array($id, $fav)) {
            $fav = array_values(array_diff($fav, [$id]));
        } else {
            $fav[] = $id;
        }

        session(['recipes_fav' => $fav]);
    }
}
