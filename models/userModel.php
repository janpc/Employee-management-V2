<?php

require MODELS . 'entity/User.php';

class UserModel extends Model
{
    function __construct()
    {
        parent::__construct('user', 'User');
    }

    public function getByEmail($email) {
        try {
            $stmt = $this->database->prepare("SELECT * FROM $this->table WHERE email = '$email'");

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

            $user = new User(
                $data['id'], $data['usename'], $data['password'], $data['email']
            );
        } catch (PDOException $e) {
            return false;
        }
        return $user;
    }
}