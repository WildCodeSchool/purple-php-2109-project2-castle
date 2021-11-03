<?php

namespace App\Model;

class TroopManager extends AbstractManager
{
    public const TABLE = 'trooper';

    /**
     * SELECT VIGOR OF PLAYER
     */
    public function getVigor($typeTrooper): float
    {
        //SELECT vigor FROM trooper WHERE type_trooper=x AND player=true
        $statement = $this->pdo->prepare("SELECT vigor FROM" . self::TABLE .
         " WHERE type_trooper=$typeTrooper AND player=true");
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * UPDATE VIGOR IN DATABASE
     */

    public function setVigor($typeTrooper, $vigor)
    {
        //UPDATE trooper SET vigor=x WHERE id_trooper=id AND player=true
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
         " SET vigor = :vigor WHERE type_trooper = :type_trooper AND player=true");
        $statement->bindValue(':type_trooper', $typeTrooper, \PDO::PARAM_INT);
        $statement->bindValue(':vigor', $vigor, \PDO::PARAM_INT);
    }
}
