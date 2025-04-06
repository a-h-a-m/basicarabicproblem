<?php

class SoalModel extends Model
{
    //protected string $model = 'NamaModel';
    //protected array $modelDb = [];
    protected string $tableName = 'soal';
    protected array $fieldNames = ['soal', 'a', 'b', 'c', 'd', 'kunci'];
    protected string $primaryKey = 'id';
}