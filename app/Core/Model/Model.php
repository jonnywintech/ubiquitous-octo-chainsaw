<?php

declare(strict_types=1);

namespace App\Core\Model;

use PDO;
use App\Core\Database\Database;

abstract class Model
{
    protected string $table_name;
    protected array $bindings = [];
    protected ?PDO $db_connection = null;
    protected string $sql_query = '';
    protected ?\PDOStatement $statement = null;
    protected array $results = [];
    protected int $where_count = 0;

    public function __construct()
    {
        $this->table_name = strtolower((new \ReflectionClass($this))->getShortName());
        $this->db_connection = Database::getInstance()->getConnection();
    }

    public function find(int $id): ?object
    {
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id";
        $statement = $this->db_connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result ?: null;
    }

    public function where(string $column, mixed $value, string $operator = '='): self
    {
        if ($this->where_count === 0) {
            $this->sql_query .= " WHERE {$column} {$operator} :{$column}";
        } else {
            $this->sql_query .= " AND {$column} {$operator} :{$column}";
        }
        $this->where_count++;

        $this->bindings[$column] = $value;
        return $this;
    }

    public function raw(string $query): self
    {
        $this->sql_query = $query;
        return $this;
    }

    public function select(string ...$columns): self
    {
        $columns_list = implode(',', $columns);
        $this->sql_query = "SELECT {$columns_list} FROM {$this->table_name}";
        return $this;
    }

    public function toSql(): string
    {
        return $this->sql_query;
    }

    public function get(): array
    {
        if ($this->statement === null) {
            $this->statement = $this->db_connection->prepare($this->sql_query);
            foreach ($this->bindings as $key => $value) {
                $this->statement->bindValue(":{$key}", $value);
            }
            $this->statement->execute();
            $this->results = $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        return $this->results;
    }


    public function all(): array
    {
        $query = "SELECT * FROM {$this->table_name}";
        $statement = $this->db_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}

?>
