<?php

require_once __DIR__ . '/../vendor/autoload.php';


class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private static $pdo;
    private $error;

    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASSWORD'];
        
        $dsn = "pgsql:host={$this->host};dbname={$this->db}";
        try {
            self::$pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public static function getConnection() {
        return self::$pdo;
    }
}