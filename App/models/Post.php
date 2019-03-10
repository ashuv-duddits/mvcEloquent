<?php
namespace App\models;

class Post
{
    protected $id;
    protected $user_id;
    protected $message;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? 0;
        $this->user_id = $data['user_id'];
        $this->message = $data['message'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
