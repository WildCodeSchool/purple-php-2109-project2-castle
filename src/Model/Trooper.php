<?php

namespace App\Model;

/*"Trooper" class will be used to instantiate our different fighters and
solve the fight between them*/
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
    private int $vigor;
    private ?string $image = null;
    private ?string $indice = null;
    private ?string $imgVigor = null;

    /*define bonus*/
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
    /*fight algorithm*/
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
    /*display image according to type*/
    public function getImage(): string
    {
        if ($this->image === null) {
            switch ($this->type) {
                case 1:
                    $this->image = "../assets/images/mobile/archer.png";
                    break;
                case 2:
                    $this->image = "../assets/images/mobile/pikeman.png";
                    break;
                case 3:
                    $this->image = "../assets/images/mobile/knight.png";
                    break;
            }
        }
        return $this->image;
    }
    /*definir l'image indice*/
    public function getIndice(): string
    {
        if ($this->indice === null) {
            switch ($this->type) {
                case 1:
                    $this->indice = "../assets/images/mobile/tent-archer.png";
                    break;
                case 2:
                    $this->indice = "../assets/images/mobile/tent-pikeman.png";
                    break;
                case 3:
                    $this->indice = "../assets/images/mobile/tent-knight.png";
                    break;
            }
        }
        return $this->indice;
    }
    /*retourne la vigueur*/
    public function getVigor(): int
    {
        return $this->vigor;
    }
    /*modifie la vigueur*/
    public function setVigor($vigor): void
    {
        $this->vigor = $vigor;
    }
    /*modifie le type*/
    public function setType($type): void
    {
        $this->type = $type;
    }
    /*retourne le type*/
    public function getType(): int
    {
        return $this->type;
    }
    /* retourne le bonne image en fonction du niveau de vigueur*/
    public function getImgVigor(): string
    {
        if ($this->imgVigor === null) {
            switch ($this->vigor) {
                case 0:
                    $this->imgVigor = "../assets/images/mobile/vigor0-5.png";
                    break;
                case 1:
                    $this->imgVigor = "../assets/images/mobile/vigor1-5.png";
                    break;
                case 2:
                    $this->imgVigor = "../assets/images/mobile/vigor2-5.png";
                    break;
                case 3:
                    $this->imgVigor = "../assets/images/mobile/vigor3-5.png";
                    break;
                case 4:
                    $this->imgVigor = "../assets/images/mobile/vigor4-5.png";
                    break;
                case 5:
                    $this->imgVigor = "../assets/images/mobile/vigor5-5.png";
                    break;
            }
        }
        return $this->imgVigor;
    }
}
