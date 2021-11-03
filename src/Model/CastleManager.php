<?php

namespace App\Model;

class CastleManager extends AbstractManager
{
    public const TABLE = 'game';

    // SELECT SCORE OF CASTLE
    public function getScore(): int
    {
        $statement = $this->pdo->prepare("SELECT score FROM " . self::TABLE);
        $statement->execute();
        return $statement->fetch();
    }

    // SELECT ROUND NUMBER
    public function getRound(): int
    {
        $statement = $this->pdo->prepare("SELECT round FROM " . self::TABLE);
        $statement->execute();
        return $statement->fetch();
    }

    // UPDATE SCORE OF CASTLE
    public function setScore($score)
    {
        //UPDATE game SET score=x
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET score = :score");
        $statement->bindValue(':score', $score, \PDO::PARAM_INT);
    }

    // UPDATE ROUND
    public function setRound($round)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET round = :round");
        $statement->bindValue(':round', $round, \PDO::PARAM_INT);
    }
}
