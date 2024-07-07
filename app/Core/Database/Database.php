<?php

declare(strict_types=1);

namespace App\Core\Database;

use PDO;
use PDOException;

class Database 
{
    private static ?Database $instance = null;
    private PDO $connection;

    private function __construct()
    {
       $dbname = loadEnv('DB_NAME') ?? '';
       $host = loadEnv('DB_HOST') ?? '';
       $username = loadEnv('DB_USERNAME') ?? '';
       $password = loadEnv('DB_PASSWORD') ?? '';
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: ". $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}