<?php

namespace App\Model;

class TroopManager extends AbstractManager
{
    /**
     * SELECT VIGOR AND TYPE OF TROOP FOR PLAYER
     */
    public function getVigor($type): array
    {
        $statement = $this->pdo->query("SELECT vigor FROM trooper WHERE type_trooper = $type;");
        
        return $statement->fetchAll();
    }

    /**
     * UPDATE VIGOR IN DATABASE
     */

    public function setVigor($typeTroop, $vigor): void
    {
        //UPDATE trooper SET vigor=x WHERE id_trooper=id 
        $statement = $this->pdo->prepare("UPDATE trooper
        SET vigor = :vigor WHERE type_trooper = :type_trooper");
        $statement->bindValue(':type_trooper', $typeTroop, \PDO::PARAM_INT);
        $statement->bindValue(':vigor', $vigor, \PDO::PARAM_INT);
    }
}