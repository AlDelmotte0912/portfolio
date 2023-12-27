<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p:nth-child(even) {color: BLUE}
        p:nth-child(odd) {  color: RED}
        p.final { color : black}
        table { border: 1px solid black}
        tr { display: block; float: left; border:  1px solid black }
        th, td { display: block; }
    </style>
</head>
<body>


<?php

/**
 * Le script suivant simulera un combat entre 2 personnages (un PC et un NPC)
 *
 * Chaque personnage possède des "points de vie" (attribut hp) symbolisant leur capacité à rester debout.
 * Lorsque hp atteint 0, le personnage est vaincu.
 *
 * Tour à tour, les adversaires lanceront une attaque l'un vers l'autre, affectant le nombre de points de vie restant,
 * jusqu'à ce qu'un des deux soit vaincu.
 */

// Auto chargement des classes
spl_autoload_register(function ($class) {
    require __DIR__ . '/' . strtolower(str_replace('\\', DIRECTORY_SEPARATOR, $class)) . '.php';
});

//todo 1 : créez au moins 4 armes différentes.
// lorsqu'un pc ou un npc est généré, il doit recevoir une arme aléatoire.

//todo 2 : modifiez l'attaque (method) afin de prendre en compte l'utilisation de l'arme.
// lorsqu'un personnage réussit une attaque, les dégâts doivent provenir de l'arme utilisée par le personnage.
// les dégâts doivent être égal à une valeur aléatoire comprise entre les dégâts minimum et maximum de l'arme.
// pour les valeurs aleatoie les definire avant de la boucle

//todo 3 : créez un nouvel élément (class) : les capacités magiques (que vous pouvez appeler simplement "magic")
// lorsqu'un pc ou un npc est généré, il doit recevoir une capacité magique aléatoire.

//todo 4 : créez 2 catégories d'armes : les armes de corps à corps et les armes à distance.

//todo 5 : créez deux nouvelles catégories, autant valable pour les armes que pour la magie : offensive et défensive
// les capacités offensives permettront d'effectuer une attaque, tandis que les capacités défensives permettront d'esquiver OU de bloquer

//todo 6 : ajoutez la possibilité d'esquiver et de parer pour les personnages.
// les attaques des armes de corps à corps ne permettent pas d'esquive, mais permettent la parade si le personnage possède une arme défensive
// les armes à distance permettent l'esquive, mais pas la parade.


//todo 7 : Si un personnage possède une capacité magique offensive, l'attaque standard est remplacée par une attaque magique, ignorant la parade et l'esquive
// Si un personnage possède une capacité magique défensive, la valeur de défense de la capacité magique s'ajoute à la parade ou à l'esquive

//todo 8 : esquive et parade
// l'esquive accorde 10% de chance d'éviter une attaque par tranche de 10 points en valeur de défense.
// la parade accorde 10% de chance de riposter (le défenseur effectue une attaque contre l'attaquant, en plus de ses attaques normales) par tranche de 10 points en valeur d'attaque.


// ? trouver une fonction qui donne le pourcentage de chance en fonction des points de def
// ? avec surement une boucle avec un if a l'interieur ou les valuer de la condition sont incrementer a chaque fois
//? pourquoi definir cont CAT_... comme int ? parceque ca m'empeche de faire resortir le type de l'arme dan ma phrase..


$weapons = \classes\weapon::generateWeapons();
$magic = \classes\magic::generateMagic();
// instanciation des objets nécessaires à l'exécution du programme
$pc = new \classes\pc('PC', 1 , 'Jacques');
$pc->setHp(20);
$pc->setAttack(10);
$pc->setDefense(10);
$pc->giveWeapons($weapons);
$pc->givemagic($magic);
$pc->parry();

$npc = new \classes\npc('NPC', 2);
$npc->setHp(20);
$npc->setAttack(10);
$npc->setDefense(10);
$npc->giveWeapons($weapons);
$npc->givemagic($magic);
// attaque simple
//echo $pc->Attack($npc);

?>
<table>
    <tr>
    <th><?=$pc->name?></th>
        <td><?=$pc->getAttack()?></td>
        <td><?=$pc->getDefense()?></td>
        <td><?=$pc->getHp()?></td>
        <td><?=$pc->getWeapon()->name?></td>
        <td><?=$pc->getWeapon()->getmin()?></td>
        <td><?=$pc->getWeapon()->getmax()?></td>
        <td><?=$pc->getMagic()->name?></td>
        <td><?=$pc->getMagic()->getmin()?></td>
        <td><?=$pc->getMagic()->getmax()?></td>
        <td><?=$pc->parry()?></td>
    </tr>
    <tr>
        <th><?=$npc->name?></th>
        <td><?=$npc->getAttack()?></td>
        <td><?=$npc->getDefense()?></td>
        <td><?=$npc->getHp()?></td>
        <td><?=$npc->getWeapon()->name?></td>
        <td><?=$npc->getWeapon()->getmin()?></td>
        <td><?=$npc->getWeapon()->getmax()?></td>
        <td><?=$npc->getMagic()->name?></td>
        <td><?=$npc->getMagic()->getmin()?></td>
        <td><?=$npc->getMagic()->getmax()?></td>


    </tr>
</table>
<?php

// attaque & riposte jusqu'à la mort d'un des candidats
while($pc->getHp() > 0 && $npc->getHp() > 0) {
    echo '<p id="1">' .  $pc->Attack($npc) . "</p>";
    if ($pc->getHp() > 0 && $npc->getHp() > 0) {
        echo '<p id="2">' .  $npc->Attack($pc) . "</p>" ;
    }
}
// combat terminé, le vainqueur
if ($pc->getHp() == 0) {
    $winner = $npc->getName();
} else {
    $winner = $pc->getName();
}
echo '<p class="final">Le combat est terminé! Le vainqueur est : ' . $winner . '</p>';

// le NPC ne sera plus déterminé par le script index, mais proviendra d'une base de données où l'adversaire sera déterminé aléatoirement




?>
</body>
</html>

