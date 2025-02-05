<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Core\Database;

class User {
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;


    public function __construct(?int $id, string $username, string $email, string $password) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function signUp()
    {
        try {
            $pdo = Database::getConnection();
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->execute(['username' => $this->username, 'email' => $this->email, 'password' => $hashedPassword]);

            return ("Message successful");
        } catch (\PDOException $e) {
            return ("error msg");
        }

    }
}