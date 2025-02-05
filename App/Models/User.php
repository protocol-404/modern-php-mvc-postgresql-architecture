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

    public function singUp()
    {
        try {
            $pdo = Database::getConnection();
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->execute(['username' => $this->username, 'email' => $this->email, 'password' => $hashedPassword]);

            return ("Message successful");
            // $id = $pdo->lastInsertId();
        } catch (\PDOException $e) {
            return ("error msg");
        }

        // return new User((int)$id, $this->username, $this->email, $this->password);
    }

    // public function signin() {
    //     $pdo = Database::getConnection();
    //     $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    //     $stmt->execute(['email' => $this->email]);
    //     $user = $stmt->fetch();
    //     if ($user && password_verify($this->password, $user['password'])) {
    //         return $user;
    //     }
    //     return false;
    // }
}