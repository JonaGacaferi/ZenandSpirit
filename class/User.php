<?php

class User
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    function __construct($username, $email, $password, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    function getUsername()
    {
        return $this->username;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getRole()
    {
        return $this->role;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setRole($role)
    {
        $this->role = $role;
    }
}
