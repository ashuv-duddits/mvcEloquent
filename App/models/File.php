<?php
namespace App\models;

class File
{
    protected $id;
    protected $user_id;
    protected $url;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? 0;
        $this->user_id = $data['user_id'];
        $this->url = $data['url'];
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