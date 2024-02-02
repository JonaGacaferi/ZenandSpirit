<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;

    function __construct($name, $email, $password, $role = 'user')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role = $role;
    }

    function getName()
    {
        return $this->name;
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

    function setName($name)
    {
        $this->name = $name;
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

    function isAdmin()
    {
        return $this->role === 'admin';
    }
}
