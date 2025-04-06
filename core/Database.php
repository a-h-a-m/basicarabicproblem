<?php

class Database
{
    private static $pdo = null;

    public static function getConnection()
    {
        if(self::$pdo == null){
            self::$pdo = new PDO(
                'mysql:host=' . DBHOST . ':3306;dbname=' . DBNAME,
                DBUSER,
                DBPASS
            );
        }

        return self::$pdo;
    }
}