<?php

namespace App\Model;

class SessionHandler
{
    /*check if the session keys exist and replace them or create them accordingly
    to save our information */
    public function saveEnemy(Trooper $enemy): void
    {
        session_start();
        if (!isset($_SESSION['saveEnemy'])) {
            $_SESSION['saveEnemy'] = $enemy;
        } else {
            unset($_SESSION['saveEnemy']);
            $_SESSION['saveEnemy'] = $enemy;
        }
    }
    // return enemy select in getready
    public function getEnemy(): Trooper
    {
        session_start();
        return $_SESSION['saveEnemy'];
    }
}
