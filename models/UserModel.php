<?php

class UserModel extends Model
{
    //protected string $model = 'NamaModel';
    //protected array $modelDb = [];
    protected string $tableName = 'users';
    protected array $fieldNames = ['nama', 'no_wa', 'password', 'tahun'];
    protected string $primaryKey = 'id';
}