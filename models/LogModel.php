<?php

class LogModel extends Model
{
    //protected string $model = 'NamaModel';
    //protected array $modelDb = [];
    protected string $tableName = 'log';
    protected array $fieldNames = ['nama', 'status', 'timestamp'];
    protected string $primaryKey = 'timestamp';
}