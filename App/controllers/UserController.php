<?php
namespace App\controllers;

use App\Core\BaseController as BaseController;
use App\models\UserDB as UserDB;
use App\models\FileDB as FileDB;
use App\models\Post as Post;
use App\models\PostDB as PostDB;

class UserController extends BaseController
{
    public function indexAction($requestController)
    {
        $id = $_SESSION['user_id'];
        $user = new UserDB();
        $userModel = $user->getModelById($id);
        $error = !empty($_GET['error']) ? true : false;
        return $this->render($requestController, 'index', ['user' => $userModel, 'error' => $error]);
    }
    public function dataAction($requestController)
    {
        $message = htmlspecialchars($_POST['message']);
        if (empty($message)) {
            $this->redirect('/user/index?error=1');
            exit();
        }
        $userId = $this->session->getUser();
        $post = new Post(['user_id' => $userId, 'message' => $message]);
        $postDB = new PostDB();
        $postId = $postDB->savePost($post);

        if (!empty($_FILES['userfile']['tmp_name'])) {
            $fileContent = file_get_contents($_FILES['userfile']['tmp_name']);
            $nameFile = $postId . '.png';
            $url = realpath('images') . DIRECTORY_SEPARATOR . $nameFile;
            $fileDB = new FileDB();
            $fileModel = $fileDB->getModelById($postId);
            $fileModel->setUrl($nameFile);
            $fileDB = new FileDB();
            $fileDB->updateFile($fileModel);
            file_put_contents($url, $fileContent);
        }
        return $this->render($requestController, 'data');
    }
}
