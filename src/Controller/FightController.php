<?php

namespace App\Controller;

use App\Model\CastleManager;
use App\Model\SessionHandler;
use App\Model\TroopManager;
use App\Model\Trooper;

class FightController extends AbstractController
{
    /**
     * recovery of game info (score, round, trooper's player)
     * create ennemy troops
     * storage before fight resolution in session
     * return to the get_ready view
    */
    public function getTroops(): string
    {
        // recovery of game info (score, round)
        $gameInfo = new CastleManager();
        $game = $gameInfo->selectGame();
        // recovery of player troop and creation of enemy troop
        $troopManager = new TroopManager();
        $troops = $troopManager->selectTroopPlayer();
        $enemy = $troopManager->selectTroopEnemy((rand(0, 2)), 5);
        // to save enemy troop in a session
        $session = new SessionHandler();
        $session->saveEnemy($enemy);
        //return to view get_ready
        return $this->twig->render('Fight/get_ready.html.twig', [
            'troops' => $troops,
            'enemy' => $enemy,
            'game' => $game,
        ]);
    }

    /**
     * resolution of the battle,
     * calculation of the new score, round, vigor of the troops
     * return to the fight.html.twig view
     */
    public function fightOutcome($id)
    {
        //checks the coherence of $id
        if ($id != (Trooper::ARCHER) && $id != (Trooper::PIKEMAN) && $id != (Trooper::KNIGHT)) {
            header("Location: /");
            return"";
        }
        //recovery of troop enemy
        $enemy = new SessionHandler();
        $enemy = $enemy->getEnemy();
        // recovery of player troop
        $trooper = new TroopManager();
        $troops = $trooper->selectTroopPlayer();
        //return trooper before change
        $vigorTroopPlayer = $troops[$id]->getVigor();
        $imgVigorTroopPlayer = $troops[$id]->getImgVigor();
        //resolution of the battle
        $result = $troops[$id]->fight($enemy);
        //recovery score
        $gameInfo = new CastleManager();
        $game = $gameInfo->selectGame();
        //calculation of the new score of the castle, impossible to be negative
        $newScore = $game['score'] + $result;
        //increment the round, return new score and round in database
        $round = $game['round'] + 1;
        $gameInfo->setScore($newScore);
        $gameInfo->setRound($round);
        //updating the vigor of the troops and sending them to the database
        $troops[$id]->modifyVigor($id, $troops);
        $trooper->setVigor(Trooper::ARCHER, $troops[Trooper::ARCHER]->getVigor());
        $trooper->setVigor(Trooper::PIKEMAN, $troops[Trooper::PIKEMAN]->getVigor());
        $trooper->setVigor(Trooper::KNIGHT, $troops[Trooper::KNIGHT]->getVigor());
        // return to the fight.html.twig view
        return $this->twig->render('Fight/fight.html.twig', [
            'vigorTroopPlayer' => $vigorTroopPlayer,
            'imgVigorTroopPlayer' => $imgVigorTroopPlayer,
            'trooperPlayer' => $troops[$id],
            'result' => $result,
            'newScore' => $newScore,
            'score' => $game['score'],
            'enemy' => $enemy,
        ]);
    }
}
