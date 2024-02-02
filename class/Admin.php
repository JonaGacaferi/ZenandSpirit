<?php

class Admin
{
    private $username;
    private $email;
    private $password;
    private $type;
    private $premissionLevel;
    private $role;

    function __construct($username, $email, $password, $type, $premissionLevel, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
        $this->premissionLevel = $premissionLevel;
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
    function getType()
    {
        return $this->type;
    }
    function getPremissionLevel()
    {
        return $this->premissionLevel;
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
    function setType($type)
    {
        $this->type = $type;
    }
    function setPremissionLevel($premissionLevel)
    {
        $this->premissionLevel = $premissionLevel;
    }
    function setRole($role)
    {
        $this->role = $role;
    }
}
