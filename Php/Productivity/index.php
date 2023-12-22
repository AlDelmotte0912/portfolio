<?php


require_once __DIR__ . "./lib/lib.php";
require_once __DIR__ . "./lib/db.php";
$conn = getpdo();


session_unset();
session_start();


include_once __DIR__ . "./utils/_header.php";
include_once __DIR__ . "./view/nav.php";
if ($_SESSION == null) {
    echo '<p class="bg-info text-light"> vous devez être connecté pour accéder à ce site</p>';
    // createAlert("vous devez être connecté à un compte pour accéder aux différentes pages du site", "info", "index.php?page=view/USER/login");
}
include_once __DIR__ . "./view/main.php";
include_once __DIR__ . "./utils/_footer.php";


?>


