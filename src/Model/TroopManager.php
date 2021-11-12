<?php

namespace App\Model;

use PDO;

class TroopManager extends AbstractManager
{
    /**
     * SELECT VIGOR AND TYPE OF TROOP FOR PLAYER
     */
    public function selectTroopPlayer(): array
    {
        $statement = $this->pdo->query("SELECT * FROM trooper;");
        $statement->setFetchMode(PDO::FETCH_CLASS, Trooper::class, []);
        return $statement->fetchAll();
    }

    /* create ennemy troop*/
    public function selectTroopEnemy(int $typeEnemy, int $vigorEnemey): Trooper
    {
        $enemy = new Trooper();
        $enemy->setType($typeEnemy);
        $enemy->setVigor($vigorEnemey);
        return $enemy;
    }

    /**
    * UPDATE VIGOR IN DATABASE
    */
    public function setVigor(int $type, int $vigor): void
    {
        $statement = $this->pdo->prepare("UPDATE trooper SET vigor = :vigor WHERE type = :type");
        $statement->bindValue(':type', $type, \PDO::PARAM_INT);
        $statement->bindValue(':vigor', $vigor, \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * update of the different vigor points according to who is used
     * save in database
     */
    public function updateVigor(int $id): void
    {
        $troop = $this->selectTroopPlayer();
        $vigor0 = $troop['0']->getVigor();
        $vigor1 = $troop['1']->getVigor();
        $vigor2 = $troop['2']->getVigor();
        switch ($id) {
            case 0:
                $vigor0 = Trooper::lessVigor($vigor0);
                $vigor1 = Trooper::moreVigor($vigor1);
                $vigor2 = Trooper::moreVigor($vigor2);
                break;
            case 1:
                $vigor0 = Trooper::moreVigor($vigor0);
                $vigor1 = Trooper::lessVigor($vigor1);
                $vigor2 = Trooper::moreVigor($vigor2);
                break;
            case 2:
                $vigor0 = Trooper::moreVigor($vigor0);
                $vigor1 = Trooper::moreVigor($vigor1);
                $vigor2 = Trooper::lessVigor($vigor2);
                break;
        }
        // save in database
        $this->setVigor(Trooper::ARCHER, $vigor0);
        $this->setVigor(Trooper::PIKEMAN, $vigor1);
        $this->setVigor(Trooper::KNIGHT, $vigor2);
        
    }
}
