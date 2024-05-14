<?php

namespace App\Service ; 

class DB 
{
    private static $pdo = null ; 

    public static function get_pdo()  
    {
        if (self::$pdo == null)
        {
            $host = '127.0.0.1';
            $db   = 'smmplanner(prject)';
            $user = 'root';
            $pass = 'iamkirill15';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            self::$pdo = new \PDO($dsn, $user, $pass, $options);  
        }

        return self::$pdo ; 

        
    }
}