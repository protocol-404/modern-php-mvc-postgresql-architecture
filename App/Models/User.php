<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Core\Database;

class User {
    private int $id;
    private string $username;
    private string $email;
    private string $password;


    public function __construct(int $id, string $username, string $email, string $password) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function signin() {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $this->email]);
        $user = $stmt->fetch();
        if ($user && password_verify($this->password, $user['password'])) {
            return $user;
        }
        return false;
    }
}