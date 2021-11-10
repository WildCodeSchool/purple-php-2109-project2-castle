<?php

namespace App\Controller;

use App\Model\CastleManager;
use App\Model\SessionManager;
use App\Model\TroopManager;

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
        session_start();
        // recovery of game info (score, round)
        $gameInfo = new CastleManager();
        $game = $gameInfo->selectGame();
        // recovery of player troop and creation of enemy troop
        $troopManager = new TroopManager();
        $troops = $troopManager->selectTroopPlayer();
        $enemy = $troopManager->selectTroopEnemy((rand(1, 3)), 5);
        // to stall troops in a session
        $session = new SessionManager();
        $_SESSION = $session->saveElement($enemy, $troops, $game);
        //return to view get_ready
        return $this->twig->render('Fight/get_ready.html.twig', [
            'troops' => $troops,
            'session' => $_SESSION,
            'game' => $game,
        ]);
    }
    /**
     * save castle data
     */
    private function saveCastle($newScore, $round): void
    {
        $save = new CastleManager();
        $save->setRound($round);
        $save->setScore($newScore);
    }
    /**
     * Update and save vigor data
     */
    private function saveVigor($id): void
    {
        $updateVigor = new TroopManager();
        $updateVigor->updateVigor($id);
    }
    /**
     * resolution of the battle,
     * calculation of the new score, round, vigor of the troops
     * return to the fight.html.twig view
     */
    public function fightOutcome($id)
    {
        //checks the coherence of $id
        if ($id != 1 && $id != 2 && $id != 3) {
            return $this->twig->render('Home/index.html.twig');
        }
        session_start();
        // match troop type number id with table index
        $id--;
        //returns our data stored in the session
        $trooperPlayer = $_SESSION['troops'][$id];
        //resolution of the battle
        $result = $trooperPlayer->fight($_SESSION['saveEnemy']);
        //calculation of the new score of the castle, impossible to be negative
        $newScore = intval($_SESSION['score']) + $result;
        if ($newScore < 0) {
            $newScore = 0;
        }
        //increment the round, return new score and round in database
        $round = intval($_SESSION['round']) + 1;
        $this->saveCastle($newScore, $round);
        //updating the vigor of the troops and sending them to the database
        $this->saveVigor($id);
        // return to the fight.html.twig view
        return $this->twig->render('Fight/fight.html.twig', [
            'trooperPlayer' => $trooperPlayer,
            'result' => $result,
            'newScore' => $newScore,
            'session' => $_SESSION,
        ]);
    }
}
