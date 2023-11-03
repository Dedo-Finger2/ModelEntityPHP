<?php

namespace app\database\model;
use app\database\Connection;
use app\database\entity\Entity;

abstract class Model
{
    /**
     * Nome da tabela
     *
     * @var string
     */
    protected string $table;


    public function all(string $fields = "*"): array
    {
        try {
            $connection = Connection::getConnection();

            $query = "select {$fields} from {$this->table}";
            $stm = $connection->query($query);

            
            return $stm->fetchAll(\PDO::FETCH_CLASS, $this->getEntity());
        } catch (\PDOException $e) {
            var_dump($e->getMessage(), $e->getTrace());
            return [];
        }
    }


    private function getEntity()
    {
        $reflect = new \ReflectionClass(static::class);  
        $className = $reflect->getShortName();
        $entity = "app\\database\\entity\\{$className}Entity";

        if (!class_exists($entity)) {
            throw new \Exception("Entity {$entity} does not exists.");
        }

        return $entity;
    }


    public function create(Entity $entity)
    {
        try {
            $connection = Connection::getConnection();

            $query = "insert into {$this->table} (";
            $query .= implode(",", array_keys($entity->getAttributes())) . ") values(";
            $query .= ':' . implode(",:", array_keys($entity->getAttributes())). ")";
            
            $prepare = $connection->prepare($query);

            return $prepare->execute($entity->getAttributes());
        } catch (\PDOException $e) {
            var_dump($e->getMessage(), $e->getTrace());
        }
    }
}
