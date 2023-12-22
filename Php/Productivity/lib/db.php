<?php

// Constantes d'environnement
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "Productivity");


function getpdo(): PDO
{
    try {

        $connect = new PDO('mysql:dbname=' . DBNAME . ';host=' . DBHOST . ';charset=utf8', DBUSER, DBPASS, [

            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC     // permet de mettre la sortie des données en tableaux assosiatifs par default

        ]);
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
    return $connect;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
