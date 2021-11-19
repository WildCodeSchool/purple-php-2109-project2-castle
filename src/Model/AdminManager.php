<?php

namespace App\Model;

class AdminManager extends AbstractManager
{
    /*
        SELECT INFO ABOUT ADMIN
    */
    public function selectInfoAdmin(): array
    {
        $statement = $this->pdo->query("SELECT * FROM admin;");
        return $statement->fetch();
    }

    public function setNewPass($crypt): void
    {
        $statement = $this->pdo->prepare("UPDATE admin SET pass = :pass WHERE user = :user;");
        $statement->bindValue(':pass', $crypt, \PDO::PARAM_STR);
        $statement->bindValue(':user', 'admin', \PDO::PARAM_STR);
        $statement->execute();
    }
}
