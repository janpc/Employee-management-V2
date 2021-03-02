<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        require CONFIG . '/db-constants.php';
        $this->host     = constant('HOST');
        $this->db       = constant('DATABASE');
        $this->user     = constant('USERNAME');
        $this->password = constant('PASSWORD');
        $this->connect();
    }

    public function connect()
    {

        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user,$this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            setcookie('error', $e->getMessage());
            header('Location: ' . "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/' . "error");
        }
    }

    function query() {

    }
}
