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
}
