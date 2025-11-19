<?php
namespace Models;

class TodoModel {
    private $key = 'todo_tasks';

    public function __construct() {
        if (!isset($_SESSION[$this->key])) $_SESSION[$this->key] = [];
    }

    public function addTask(string $text) {
        if ($text === '') return;
        $tasks = $_SESSION[$this->key];
        $id = count($tasks) ? end($tasks)['id'] + 1 : 1;

        $tasks[] = [
            'id' => $id,
            'text' => $text,
            'status' => 'pendiente'  // estado inicial
        ];

        $_SESSION[$this->key] = $tasks;
    }

    public function deleteTask(int $id) {
        $tasks = array_filter($_SESSION[$this->key], fn($t) => $t['id'] !== $id);
        $_SESSION[$this->key] = array_values($tasks);
    }

    public function changeStatus(int $id, string $status) {
        foreach ($_SESSION[$this->key] as &$t) {
            if ($t['id'] === $id) {
                $t['status'] = $status;
            }
        }
        unset($t);
    }

    public function getAll() {
        return $_SESSION[$this->key];
    }
}
