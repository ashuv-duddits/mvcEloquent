<?php
namespace App\controllers;

use App\Core\BaseController as BaseController;
use App\models\UserDB as UserDB;
use App\models\FileDB as FileDB;

class UsersController extends BaseController
{
    public function indexAction($requestController)
    {
        $userDB = new UserDB();
        $users = $userDB->getModels();
        $fileDB = new FileDB();
        $files = $fileDB->getModels();
        return $this->render($requestController, 'index', ['users' => $users, 'files' => $files]);
    }
}
