<?php

class Model
{
    protected PDO $connection;
    protected string $model = 'NamaModel';
    protected array $modelDb = [];
    protected string $tableName = 'namatabel';
    protected array $fieldNames = ['field', 'field', 'yang', 'ada', 'di', 'database'];
    protected string $primaryKey = 'primarykey';

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    // Create (INSERT)
    public function save(...$data){
            $fieldConcat = join(',', $this->fieldNames);
            $prepareConcat = join(',', array_fill(0, count($this->fieldNames), '?'));

            $sql = "INSERT INTO {$this->tableName} ({$fieldConcat})
                    VALUES ({$prepareConcat})";
            
            $data = array_values($data);

            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
            //return $data;
    }

    // Read (SELECT)
    public function findAll(): array{
        $sql = "SELECT * FROM {$this->tableName}";
        $statement = $this->connection->query($sql);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }

    // Read by ID (SELECT WHERE id = ...)
    public function findById(int $id){
        $sql = "SELECT *
                FROM {$this->tableName}
                WHERE {$this->primaryKey} = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                return $row;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findSoundex(string $field, $value){
        $value = (string) $value;
        $sql = "SELECT *
                FROM {$this->tableName}
                WHERE SOUNDEX({$field}) = SOUNDEX('{$value}')";
        $statement = $this->connection->query($sql);
        //$statement->execute([$value]);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }
  
    // Read by field (SELECT WHERE namafield = ...)
    public function findByField(string $field, $value){
        $value = (string) $value;
        $sql = "SELECT *
                FROM {$this->tableName}
                WHERE {$field} = '{$value}'";
        $statement = $this->connection->query($sql);
        //$statement->execute([$value]);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }

    // Update (UPDATE)
    public function update($id, ...$data){
        //$prepareConcat = join(',', array_fill(0, count($this->modelDb), '?'));
        $concat = [];
        $data = array_values($data);
    
        foreach($this->fieldNames as $f){
            $concat[] = $f . '=?';
        }
        $data[] = $id;
        $concat = join(',', $concat);
        $sql = "UPDATE {$this->tableName}
                SET {$concat}
                WHERE {$this->primaryKey} = ?";
        
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        //return $data;
    }

    // Delete by ID (DELETE WHERE id = ...)
    public function deleteById(int $id){
        $sql = "DELETE FROM {$this->tableName}
                WHERE {$this->primaryKey} = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
    }

    // SELECT with INNER JOIN
    public function findInner(string $table2, array $on, string $option = '', string $select = '*'){
        return $this->sqlJoin('INNER', $table2, $on, $option, $select);
    }

    // SELECT with RIGHT JOIN
    public function findOuterRight(string $table2, array $on, string $option = '', string $select = '*'){
        return $this->sqlJoin('RIGHT', $table2, $on, $option, $select);
    }

    // SELECT with LEFT JOIN
    public function findOuterLeft(string $table2, array $on, string $option = '', string $select = '*'){
        return $this->sqlJoin('LEFT', $table2, $on, $option, $select);
    }

    protected function sqlJoin(string $type, string $table2, array $on, string $option = '', string $select = '*'){
        $sql = "SELECT {$select}
                FROM {$this->tableName}
                {$type} JOIN
                {$table2}
                ON {$this->tableName}.{$on[0]}={$table2}.{$on[1]}
                {$option}";
        $statement = $this->connection->query($sql);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }

    // getter
    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getFieldNames(): array
    {
        return $this->fieldNames;
    }

    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}