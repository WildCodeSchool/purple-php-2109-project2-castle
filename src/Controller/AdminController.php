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

        if ($_POST['password'] === $info['pass']) {
            $info['logged'] = true;
        }

        if ($info['logged']) {
            (new SessionHandler())->sessionAdmin();
        } else {
            $logged = false;
        }

        header('Location: /');
        return '';
    }

    public function logOut(): string
    {
        (new SessionHandler())->sessionLogOut();
        header('Location: /');
        return '';
    }
}
