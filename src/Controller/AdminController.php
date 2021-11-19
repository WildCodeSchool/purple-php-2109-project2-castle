<?php

namespace App\Controller;

use App\Model\AdminManager;
use App\Model\SessionHandler;

class AdminController extends AbstractController
{
    public function password(): string
    {
        return $this->twig->render('Admin/password.html.twig');
    }

    public function checking(): string
    {
        $info = new AdminManager();
        $info = $info->selectInfoAdmin();

        if (empty($_POST['password'])) {
            header('Location: /');
            return '';
        }

        if ($_POST['password'] === $info['pass']) {
            if ($info['pass'] === "dearinstructor") {
                return $this->twig->render('Admin/firstpassword.html.twig');
            }
        }

        if (password_verify($_POST['password'], $info['pass'])) {
            $info['logged'] = true;
            (new SessionHandler())->sessionAdmin();
        }
        header('Location: /');
        return '';
    }

    public function newpassword()
    {
        $info = new AdminManager();
        $info = $info->selectInfoAdmin();

        if (empty($_POST['newpassword'])) {
            header('Location: /');
            return '';
        } elseif ($info['pass'] === "dearinstructor") {
            $crypt = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
            (new AdminManager())->setNewPass($crypt);
            header('Location: /admin');
            return '';
        }
    }

    public function logOut(): string
    {
        (new SessionHandler())->sessionLogOut();
        header('Location: /');
        return '';
    }
}
