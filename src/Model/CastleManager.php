<?php

namespace App\Model;

class CastleManager extends AbstractManager
{
    /*
        SELECT SCORE OF CASTLE
    */
    public function selectGame(): array
    {
        $statement = $this->pdo->query("SELECT * FROM game;");
        return $statement->fetch();
    }
    /*
        UPDATE SCORE OF CASTLE
    */
    public function setScore($score): void
    {
        $statement = $this->pdo->prepare("UPDATE game SET score = :score");
        $statement->bindValue(':score', $score, \PDO::PARAM_INT);
        $statement->execute();
    }
    /*
        UPDATE ROUND
    */
    public function setRound($round): void
    {
        $statement = $this->pdo->prepare("UPDATE game SET round = :round");
        $statement->bindValue(':round', $round, \PDO::PARAM_INT);
        $statement->execute();
    }
    
}
