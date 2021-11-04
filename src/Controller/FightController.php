<?php

namespace App\Controller;

use App\Model\Trooper;
use App\Model\TroopManager;

class FightController extends AbstractController
{
    /*
        show player and ennemy troops
    */
    public function getReady(): string
    {
        $enemy = $this->createEnemy();
        $archer = $this->createPlayer(1);
        $pikeman = $this->createPlayer(2);
        $knight = $this->createPlayer(3);
        
        return $this->twig->render('Fight/get_ready.html.twig', ['enemy' => $enemy, 'archer' => $archer, 'pikeman' => $pikeman, 'knight' => $knight]);
    }
    /*
        instance of class Trooper for ennemy, with a random type.
    */
    public function createEnemy(): Trooper
    {
        $typeEnemy = rand(1, 3);
        $enemy = new Trooper($typeEnemy);

        return $enemy;
    }
    /*
        instance of class Trooper for the player, with a vigor from database
    */
    public function createPlayer($type): Trooper
    {
        $troopManager = new TroopManager();
        $vigor = $troopManager->getVigor($type);
        //vigor is converted from string to int
        $vigor = intval($vigor[0]['vigor']);
        $fighter = new Trooper($type, $vigor);
        return $fighter;
    } 
}


