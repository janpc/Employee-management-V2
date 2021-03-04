<?php

class User
{
    public ?int $id;
    public ?string $username;
    public ?string $password;
    public ?string $email;

    public function __construct($id = null, $username = null, $password = null, $email = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
