<?php

namespace classes;

use classes\character;

class pc extends character
{

   public string $pseudo;

   public function __construct(string $name, int $id , string $pseudo)
{
    parent::__construct($name, $id);
    $this->pseudo = $pseudo;
    $this->name = $pseudo;
}



    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }


}