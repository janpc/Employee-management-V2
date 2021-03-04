<?php

class User
{
    public Int $id;
    public String $username;
    public String $password;
    public String $email;

    public function __construct($id = -1, $username = "", $password = "", $email = "")
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
