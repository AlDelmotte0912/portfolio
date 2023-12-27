<?php

namespace classes;

use classes\equipement;

class weapon extends equipement
{
public int $portee;

public static array $_portee = [self::CAT_MELEE  , self::CAT_DISTANCE];
    const CAT_MELEE = 1;
    const CAT_DISTANCE = 2;

public function __construct(int $id, string $name, int $min, int $max  , string $categorie = self::CAT_OFFENSIVE , int $portee = self::CAT_MELEE)
{
    parent::__construct($id, $name, $min, $max , $categorie);
    if (!in_array($portee, self::$_portee)) {
        $portee = self::CAT_MELEE;
    }
    $this->portee = $portee;
}

    public function getPortee(): string
    {
        return $this->portee;
    }


    public function setPortee(string $portee): void
    {
        $this->portee = $portee;
    }

   public static function generateWeapons():array
    {
        $epee = new \classes\weapon(1 , 'épée' , 6 , 12);
        $arc = new  \classes\weapon(2 , 'arc' , 4 , 8, self::CAT_DISTANCE);
        $hache = new \classes\weapon(3,'hache' , 5 , 10);
        $bouclier = new \classes\weapon(4 , 'bouclier' , 1 , 5 ,SELF::CAT_DEFENSIVE);
        return [$epee , $arc , $hache, $bouclier];

    }


}
