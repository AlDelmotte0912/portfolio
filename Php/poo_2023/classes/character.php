<?php

namespace classes;
/**
 * Que sont les espaces de noms ? Dans leur définition la plus large, ils représentent un moyen d'encapsuler des éléments.
 * Cela peut être conçu comme un concept abstrait, pour plusieurs raisons. Par exemple, dans un système de fichiers,
 * les dossiers représentent un groupe de fichiers associés et servent d'espace de noms pour les fichiers qu'ils contiennent.
 * Un exemple concret est que le fichier foo.txt peut exister dans les deux dossiers /home/greg et /home/other,
 * mais que les deux copies de foo.txt ne peuvent pas co-exister dans le même dossier.
 * De plus, pour accéder au fichier foo.txt depuis l'extérieur du dossier /home/greg,
 * il faut préciser le nom du dossier en utilisant un séparateur de dossier, tel que /home/greg/foo.txt.
 * Le même principe s'applique aux espaces de noms dans le monde de la programmation.
 *
 * Dans le monde PHP,
 * les espaces de noms sont conçus pour résoudre deux problèmes que rencontrent les auteurs de bibliothèques et d'applications lors de la réutilisation d'éléments tels que des classes ou des bibliothèques de fonctions :
 * - Collisions de noms entre le code que vous créez, les classes, fonctions ou constantes internes de PHP, ou celle de bibliothèques tierces.
 * - La capacité de faire des alias ou de raccourcir des Noms_Extremement_Long pour aider à la résolution du premier problème, et améliorer la lisibilité du code.
 *
 * Note: Les noms d'espaces de noms ne sont pas sensible à la casse.
 * Note: Les espaces de noms PHP (PHP\...) sont réservés pour l'utilisation interne du langage.
 */

class character
{
    public string $name = 'character';
    private int $id;
    private int $hp;
    private int $attack;
    private int $defense;
    private object $weapon;
    private object $magic;

    /**
     * @return object
     */
    public function getMagic(): object
    {
        return $this->magic;
    }

    /**
     * @param object $magic
     */
    public function setMagic(object $magic): void
    {
        $this->magic = $magic;
    }


    /**
     * @param string $name
     * @param int $id
     */
    public function __construct(string $name, int $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * GETTERS
     */

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getWeapon(): object
    {
        return $this->weapon;
    }
    /**
     * SETTERS
     */

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function setAttack(int $attack): void
    {
        $this->attack = $attack;
    }

    public function setDefense(int $defense): void
    {
        $this->defense = $defense;
    }


    public function setWeapon(object $weapon): void
    {
        $this->weapon = $weapon;
    }
    public function giveMagic(array $magic): void
    {
        $this->magic = $magic[array_rand($magic)];
    }

    /**
     * @param object $target
     * @return string
     */
    public function Attack(object $target): string
    {
        // la valeur d'attack sert a savoir si l'attaque touche ou pas et ensuite si et seulement
        // si l'attaque touche alors on fait la valeur aleatoire de l'arme - la defense.
        // a corriger

        $dodge = false ;
        $parry = false ;
        $damage = 0;
        $atk = rand(1, $this->attack);
        $def = rand(1, $target->getDefense());
        if ($this->getMagic()->categorie == equipement::CAT_OFFENSIVE) {
            //magic attack
            $damage = $this->getMagic()->getDamage();
        }elseif($this->getweapon()->categorie == equipement::CAT_OFFENSIVE){
            //weapon attack
            $damage = $this->getWeapon()->getDamage();
            $def = $target->getDefense();
    // parry
    if ($this->getWeapon()->portee == weapon::CAT_MELEE && $target->getweapon()->categorie == equipement::CAT_DEFENSIVE) {
        $parry = true;
    }
    //dodge
    if($target->getWeapon()->portee == $target->getWeapon()::CAT_DISTANCE){
        $dodge = true;
    }
    // defensive magic bonus
    if ($target->getMagic()->categorie == equipement::CAT_DEFENSIVE) {
        $def += $target->getMagic()->getDefense();
    }

}else{
            //cancel attack
    return $this->name . ' échoue dans son attaque contre ' . $target->name . ' car il ne possède pas de capacité offensive !<br>';
}


       // $randDdef = rand(1, $def ) ;
       // $randAttack = rand(1, $this->attack);
        $randMagic = rand($this->magic->min, $this->magic->max);
        $randAttackWithWeapon = rand($this->weapon->min, $this->weapon->max);
        $result = $atk - $def ;
        if ($result > 0) {
            $live = $target->getHp() - $randAttackWithWeapon - $randMagic ;
            $string = 'touché! ' . $this->name . ' inflige ' . $randAttackWithWeapon . ' dégâts à ' . $target->name . ' avec ' . $this->weapon->name . ', cette arme est une arme de ' . $this->weapon->portee .
                '. <br> En plus de cela ' . $this->name . ' invoque sa capacité magique ' . $this->magic->name . ' qui ajoute ' . $randMagic . ' de dégât à '  . $target->name . ' qui est ';
            if ($live > 0) {
                $string .= 'blessé! Il lui reste ' . $live . ' points de vie';
            } else {
                $live = 0;
                $string .= 'mort!';
            }
            $target->setHp($live);
        } elseif ($result < 0) {
            $string = 'raté';
        } else {
            $this->dodge();
            $string = 'paré';
        }

        return  $this->name . ' attaque ' . $target->name . ' son score d\'attaque est de ' . $atk . ' contre une defense de ' . $def . '<br> Résultat :' . $result . ' : ' . $string . '<br>' ;


    }



    public function giveWeapons(array $weapons)
    {

        $this->weapon = $weapons[array_rand($weapons,1)];

    }

    public function parry()
    {

    }

    public function dodge()
    {

        $total = $this->getDefense();
        $defense = floor($total / 10);
        $x = $defense * 10;

        if ($total == 0) {
            return 0;
        } else {
            $i = 0;
            while ($i == $x) {
                $i += 10;
            }
            return  $i . "test";
        }


    }
}