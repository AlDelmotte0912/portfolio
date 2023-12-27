<?php


namespace classes ;

use classes\equipement;

class magic extends equipement
{

  public function __construct(int $id, string $name, int $min, int $max  , int $categorie = self::CAT_OFFENSIVE)
  {
      parent::__construct($id, $name, $min, $max , $categorie );
  }


     public static function generateMagic():array
    {
        $feu = new \classes\magic(1 , 'feu' , 1 , 8);
        $eclair = new  \classes\magic(2 , 'eclair' , 1 , 6);
        $pierre = new \classes\magic(3,'bouclier' , 1 , 2 ,SELF::CAT_DEFENSIVE);

        return [$feu , $eclair , $pierre];

    }


}