<?php

$suppr = $_POST['suppr'];
$sql = "DELETE FROM budget WHERE idbudget = '$suppr'";
$stmt = getpdo()->prepare($sql);
$stmt->execute();

var_dump($suppr);
var_dump($sql);

if (isset($suppr)) {
    $stmt;
    createAlert("le titre a bien été supprimer", "info", "index.php?page=view/budget");

}

