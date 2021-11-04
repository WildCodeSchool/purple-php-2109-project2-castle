<?php

namespace App\model;

//"Trooper" class will be used to instantiate our different fighters and solve the fight between them
class Trooper
{
    public const DEXTERITY = 30;
    public const MIN_ATTACK = 1;
    public const MAX_ATTACK = 10;
    public const MAX_VIGOR = 5;
    public const ARCHER = 1;
    public const PIKEMAN = 2;
    public const KNIGHT = 3;
    // type, player and vigor values from database.
    private int $type;
    private bool $player;
    private int $vigor = 5;
    private string $image;

    // constructor
    public function __construct($type, $player)
    {
        $this->type = $type;
        $this->player = $player;
        //switch to display the correct picture, according to type of fighter
        switch ($type) {
            case 1:
                $this->image = "../../assets/images/archer.png";
                break;
            case 2:
                $this->image = "../../assets/images/pikeman.png";
                break;
            case 3:
                $this->image = "../../assets/images/knight.png";
                break;
        }
    }
    // define bonus
    public function bonus(Trooper $enemy): int
    {
        $bonus = 0;
        //define attack bonus for player : archer>pikeman>knight>archer
        if ($this->type === self::ARCHER && $enemy->type === self::PIKEMAN) {
            $bonus = 15;
        }
        if ($this->type === self::PIKEMAN && $enemy->type === self::KNIGHT) {
            $bonus = 15;
        }
        if ($this->type === self::KNIGHT && $enemy->type === self::ARCHER) {
            $bonus = 15;
        }
        return $bonus;
    }
    // fight algorithm
    public function fight(Trooper $enemy): int
    {
        $bonusPlayer = $this->bonus($enemy);
        $bonusEnemy = $enemy->bonus($this);
        //fight resolution
        $attackPlayer = (rand(self::MIN_ATTACK, self::MAX_ATTACK) + $bonusPlayer) +
        (self::DEXTERITY * ($this->vigor / self::MAX_VIGOR));
        $attackEnemy = (rand(self::MIN_ATTACK, self::MAX_ATTACK) + $bonusEnemy) + (self::DEXTERITY);
        $result = $attackPlayer - $attackEnemy;
        return $result;
    }
    // display image according to type
    public function getImage(): string
    {
        return $this->image;
    }
}
