<?php

namespace config;

use PDO;

class Database
{
    private static $instance = NULL;
    public static function getPdo(): PDO
    {
        if (self::$instance === NULL) {
            self::$instance = new PDO('mysql:host=localhost;dbname=zbi;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}
