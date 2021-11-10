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

    /* calculation of the increase of the vigor */
    public function moreVigor(int $vigor): int
    {
        $vigor++;
        if ($vigor > 5) {
            $vigor = 5;
        }
        return $vigor;
    }

    /* calculation of the decrease of the vigor */
    public function lessVigor(int $vigor): int
    {
        $vigor--;
        if ($vigor < 0) {
            $vigor = 0;
        }
        return $vigor;
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
        if (isset($_SESSION['troops'])) {
            $vigor0 = $_SESSION['troops']['0']->getVigor();
            $vigor1 = $_SESSION['troops']['1']->getVigor();
            $vigor2 = $_SESSION['troops']['2']->getVigor();
            switch ($id) {
                case 0:
                    $vigor0 = $this->lessVigor($vigor0);
                    $vigor1 = $this->moreVigor($vigor1);
                    $vigor2 = $this->moreVigor($vigor2);
                    break;
                case 1:
                    $vigor0 = $this->moreVigor($vigor0);
                    $vigor1 = $this->lessVigor($vigor1);
                    $vigor2 = $this->moreVigor($vigor2);
                    break;
                case 2:
                    $vigor0 = $this->moreVigor($vigor0);
                    $vigor1 = $this->moreVigor($vigor1);
                    $vigor2 = $this->lessVigor($vigor2);
                    break;
            }
            // save in database
            $this->setVigor(1, $vigor0);
            $this->setVigor(2, $vigor1);
            $this->setVigor(3, $vigor2);
        }
    }
}
