<?php
namespace App\models;

class UserDB extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['login', 'password'];
    public $timestamps = false;

    /**
     * @param int $id
     * @return null|User
     */
    public function getModelById(int $id)
    {
        $userData = $this
            ->where('id', $id)
            ->first();
        if ($userData == null) {
            return null;
        } else {
            return new User($userData->toArray());
        }
    }

    /**
     * @param string $login
     * @return null|User
     */
    public function getModelByLogin(string $login)
    {
        $userData = $this
            ->where('login', $login)
            ->first();
        if ($userData == null) {
            return null;
        } else {
            return new User($userData->toArray());
        }
    }

    /**
     * @param User $user
     * @return int $userId
     */
    public function saveUser(User $user)
    {
        $data = [
            'login' => $user->getLogin(),
            'password' => $user->getPassword()
        ];
        $user = $this->create($data);
        $userId = $user->id;
        return $userId;
    }

    public function getModels()
    {
        $usersData = $this->all();
        if (!$usersData) {
            return null;
        }
        $users = [];
        foreach ($usersData->toArray() as $userData) {
            $users[] = new User($userData);
        }
        return $users;
    }
}
