<?php

class LogginModel extends Model
{

    function compare(string $userEmail, string $password)
    {
        try {
            $user = $this->db->connect()->query("SELECT * FROM user WHERE email='" . $userEmail . "'")->fetch();
        } catch (PDOException $e) {
            setcookie('error', $e->getMessage());
            header('Location: ' . BASE_PATH . "error");
        }

        if (isset($user)) {

            $isPasswordCorrect = password_verify($password, $user['password']);

            if ($isPasswordCorrect) {
                setcookie("userId", $user["userId"], time() + 600, '/');
                return true;
            } else {
                return false;
            }
        } else {

            return false;
        }
    }

    function out(): bool
    {
        unset($_COOKIE['userId']);
        if (isset($_COOKIE['userId'])) {
            return false;
        } else {
            return true;
        }
    }

    function signIn($params)
    {
        //toDo
    }

    function signOut($id)
    {
        //toDo
    }
}
