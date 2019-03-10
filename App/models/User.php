<?php
namespace App\models;

class User
{
    protected $id;
    protected $login;
    protected $password;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? 0;
        $this->login = $data['login'];
        $this->password = $data['password'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }
}