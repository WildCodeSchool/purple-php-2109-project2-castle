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
}
