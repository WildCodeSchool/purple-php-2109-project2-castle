<?php

namespace App\Controller;

use App\Model\CastleManager;
use App\Model\SessionManager;
use App\Model\TroopManager;

class FightController extends AbstractController
{
    /**
     * show player and ennemy troops
     * stocage avant la rolustion de combat
     * recuperation des info de jeu (score, round)
     * renvoi vers la vue get_ready
    */
    public function getTroops(): string
    {
        session_start();
        // recuperation info de la partie
        $gameInfo = new CastleManager();
        $game = $gameInfo->selectGame();
        //recuperation des troupe joueur et creation troupe enemy
        $troopManager = new TroopManager();
        $troops = $troopManager->selectTroopPlayer();
        $enemy = $troopManager->selectTroopEnemy((rand(1, 3)), 5);
        // pour stoker les troupes dans une session
        $session = new SessionManager();
        $_SESSION = $session->saveElement($enemy, $troops, $game);
        //vers la vue get_ready
        return $this->twig->render('Fight/get_ready.html.twig', [
            'troops' => $troops,
            'session' => $_SESSION,
            'game' => $game,
        ]);
    }
    /**
     * resolution du combat
     * mise a jour de de la base de donné
     * renvoi des info vers la vue result
     */
    public function result($id)
    {
        //verifie la coherance de $id
        if ($id != 1 && $id != 2 && $id != 3) {
            return $this->twig->render('Home/index.html.twig');
        }
        session_start();
        // fait correspondre id du numero de type de troupe avec l'index du tableau
        $id--;
        //retourne nos données stokées dans la session
        $trooperPlayer = $_SESSION['troops'][$id];
        //resolution du combat
        $result = $trooperPlayer->fight($_SESSION['saveEnemy']);
        //calcul du nouveau score du chateau , impossible d'etre negatif
        $newScore = intval($_SESSION['score']) + $result;
        if ($newScore < 0) {
            $newScore = 0;
        }
        //envoyer le nouveau score dans la BDD
        $saveScore = new CastleManager();
        $saveScore->setScore($newScore);
        //incremente le round
        $round = intval($_SESSION['round']) + 1;
        //envoyer le nouveau round dans la BDD
        $saveRound = new CastleManager();
        $saveRound->setRound($round);
        //mise a jour de la vigor des troupes et envoie dans la BDD
        $majVigor = new TroopManager();
        $majVigor->majVigor($id);
        // return les element sur la vue result
        return $this->twig->render('Fight/result.html.twig', [
            'trooperPlayer' => $trooperPlayer,
            'result' => $result,
            'newScore' => $newScore,
            'session' => $_SESSION,
        ]);
    }
}
