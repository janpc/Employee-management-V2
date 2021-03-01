<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        require ASSETS . 'database/db-constants.php';
        $this->host     = constant('HOST');
        $this->db       = constant('DATABASE');
        $this->user     = constant('USERNAME');
        $this->password = constant('PASSWORD');
        $this->connect();
    }

    private function connect()
    {

        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    function query() {

    }
}
