<?php
namespace App\controllers;

use App\Core\BaseController as BaseController;
use App\models\User as User;
use App\models\UserDB as UserDB;

class IndexController extends BaseController
{
    public function indexAction($requestController)
    {
        if (!$this->session->isGuest()) {
            $this->redirect('/user/index');
        }
        $error = !empty($_GET['error']) ? true : false;
        return $this->render($requestController, 'index', ['error' => $error]);
    }

    public function loginAction()
    {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            throw new \Exception('Вы ввели неверные регистрационные данные');
        }
        $userDB = new UserDB();
        $user = $userDB->getModelByLogin($_POST['login']);
        if ($user == null && !empty($_POST['login'])) {
            $receiveLogin = strtolower(trim($_POST['login']));
            $receivePassword = sha1(trim($_POST['password']));
            $user = new User(['login' => $receiveLogin, 'password' => $receivePassword]);
            $userDB = new UserDB();
            $userId = $userDB->saveUser($user);
            $this->session->login($userId);
        } elseif (!empty($_POST['login']) && sha1(trim($_POST['password'])) == $user->getPassword()) {
            $userId = $user->getId();
            $this->session->login($userId);
        } else {
            $this->redirect('/index/index?error=1');
        }
        $this->redirect('/index/index');
    }

    public function logoutAction()
    {
        $this->session->logout();
        $this->redirect('/index/index');
    }
}
