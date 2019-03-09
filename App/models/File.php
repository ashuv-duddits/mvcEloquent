<?php
namespace App\models;

class File
{
    protected $id;
    protected $user_id;
    protected $url;

    public function __construct($userData)
    {
        $this->id = $userData['id'] ?? 0;
        $this->user_id = $userData['user_id'];
        $this->url = $userData['url'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        return $this->url = $url;
    }
}