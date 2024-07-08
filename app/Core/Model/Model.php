<?php

declare(strict_types=1);

namespace App\Core\Model;

use PDO;
use App\Core\Database\Database;

abstract class Model
{
    protected string $table;
    protected array $data = [];
    protected ?PDO $db = null;

    public function __construct()
    {
        $this->table = strtolower((new \ReflectionClass($this))->getShortName());
        $this->db = Database::getInstance()->getConnection();
    }

    public function find(int $id): ?object
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result ?: null;
    }

    public function all(): array
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

?>
