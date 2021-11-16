<?php

namespace App\Controller;

use App\Model\CastleManager;
use App\Model\TroopManager;
use App\Model\Trooper;

class ResetController extends AbstractController
{
    public const SCORE = 200;
    public const ROUND = 1;
    public const VIGOR = 5;
    /**
     * reset the castle score to 200
     * reset the vigor of all troops to 5
     * back to home page
    */


    /**
     * reset castle and vigor database
     */
    public function reset(): string
    {
        $resetCastle = new CastleManager();
        $resetCastle->setScore(self::SCORE);
        $resetCastle->setRound(self::ROUND);
        $resetVigor = new TroopManager();
        $resetVigor->setVigor(Trooper::ARCHER, self::VIGOR);
        $resetVigor->setVigor(Trooper::PIKEMAN, self::VIGOR);
        $resetVigor->setVigor(Trooper::KNIGHT, self::VIGOR);
        header('Location: /');
        return '';
    }
}
