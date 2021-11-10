<?php

namespace App\Model;

class SessionManager extends AbstractManager
{
    /*check if the session keys exist and replace them or create them accordingly
    to save our information */
    public function saveElement(Trooper $enemy, array $troops, array $game): array
    {
        if (!isset($_SESSION['saveEnemy'])) {
            $_SESSION['saveEnemy'] = $enemy;
        } else {
            unset($_SESSION['saveEnemy']);
            $_SESSION['saveEnemy'] = $enemy;
        }
        if (!isset($_SESSION['troops'])) {
            $_SESSION['troops'] = $troops;
        } else {
            unset($_SESSION['troops']);
            $_SESSION['troops'] = $troops;
        }
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = $game['score'];
        } else {
            unset($_SESSION['score']);
            $_SESSION['score'] = $game['score'];
        }
        if (!isset($_SESSION['round'])) {
            $_SESSION['round'] = $game['round'];
        } else {
            unset($_SESSION['round']);
            $_SESSION['round'] = $game['round'];
        }
        return $_SESSION;
    }
}
