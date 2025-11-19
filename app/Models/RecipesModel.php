<?php

namespace Models;

class RecipesModel
{
    private $data = [
        ['id' => 1, 'title' => 'Spaghetti Bolognese', 'type' => 'Pasta', 'ingredients' => 'pasta,tomato,beef'],
        ['id' => 2, 'title' => 'Ensalada César', 'type' => 'Salad', 'ingredients' => 'lettuce,croutons,cheese'],
        ['id' => 3, 'title' => 'Tacos al Pastor', 'type' => 'Mexican', 'ingredients' => 'pork,tortilla,onion'],
        ['id' => 4, 'title' => 'Sopa de Lentejas', 'type' => 'Soup', 'ingredients' => 'lentils,carrot,onion']
    ];
    
    public function search(string $q, string $filter): array
    {
        $res = array_filter($this->data, function ($r) use ($q, $filter) {
            $ok = true;
            
            // Lógica de búsqueda (query)
            if ($q !== '') {
                $ok = stripos($r['title'], $q) !== false || stripos($r['ingredients'], $q) !== false;
            }
            
            // Lógica de filtrado (type)
            if ($filter !== '') {
                $ok = $ok && $r['type'] === $filter;
            }
            
            return $ok;
        });
        
        return array_values($res);
    }
    
    public function favorites(): array
    { 
        return $_SESSION['recipes_fav'] ?? []; 
    }
    
    public function toggleFavorite(int $id): void
    {
        if (!isset($_SESSION['recipes_fav'])) {
            $_SESSION['recipes_fav'] = [];
        }
        
        $idx = array_search($id, $_SESSION['recipes_fav']);
        
        if ($idx === false) {
            // Añadir a favoritos
            $_SESSION['recipes_fav'][] = $id;
        } else {
            // Eliminar de favoritos
            unset($_SESSION['recipes_fav'][$idx]); 
            $_SESSION['recipes_fav'] = array_values($_SESSION['recipes_fav']); 
        }
    }
}
