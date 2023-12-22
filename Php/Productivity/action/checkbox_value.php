<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['df'])) {
        // Compter le nombre de cases cochées.
        $checked_count = count($_POST['df']);
        echo "Vous avez sélectionné les " . $checked_count . " option(s) suivante(s): <br/>";
        // Boucle pour stocker et afficher les valeurs de chaque case cochée.
        foreach ($_POST['df'] as $selected) {
            echo "<p>" . $selected . "</p>";
        }
    } else {
        echo "<b>Veuillez sélectionner au moins une option.</b>";
    }
}
$_POST['df'] = "";
