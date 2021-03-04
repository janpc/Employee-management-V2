<?php

require CONFIG . 'db-constants.php';

class Database
{

    public static function getPDO() {
        return self::connect();
    }

    static private function connect()
    {

        try {
            $connection = "mysql:host=" . HOST . ";dbname=" . DATABASE;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, USERNAME, PASSWORD, $options);

            return $pdo;
        } catch (PDOException $e) {
            ErrorDisplayer::add('Could not connect to database');
            die();
        }
    }
}
