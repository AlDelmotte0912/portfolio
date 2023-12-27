<?php

namespace classes;

use classes\character;

class npc extends character
{
    private int $killed;

    public function getKilled(): int
    {
        return $this->killed;
    }

    public function setKilled(int $killed): void
    {
        $this->killed = $killed;
    }

}