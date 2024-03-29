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
        $this->password = $password;
        $this->role = $role;
    }

    function getId()
    {
        return $this->id;
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

    function setId($id)
    {
        $this->id = $id;
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
        return $this->getRole() === 'admin';
    }
}
