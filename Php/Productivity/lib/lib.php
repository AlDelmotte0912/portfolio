<?php
declare(strict_types=1);
/**
 * @param string $page
 * @return void
 */
function getContent(string $page): void
{
    $exts = ['php'];
    if (!empty($page)) {
        foreach ($exts as $ext) {
            $complete_path = $page . '.' . $ext;
            if (file_exists($complete_path)) {
                include_once $complete_path;
//  die; je l'ai enlevé, car il arrêtait là et donc tout ce qui avait en dessous comme le footer ne pouvait pas s'exécuter
            }
        }
    } else {
        header('Location: index.php?page=view/main');
        die;
    }
}

/**
 * @param $table
 * @param $value
 * @return void
 */
function checkbox($table, $value): void
{
    echo '<label class="custom-checkbox"><input type="checkbox" name="' . $table . '[]" value="' .
        $value
        . '" class="icofont-check"></label>';
    if (isset($_POST['submit'])) {
        if (!empty($_POST[$table])) {
            if (in_array("$value", $_POST[$table])) {
                echo "checked";
            }
        }
    }

}


// compte le nombre de cases cocher et affiche le résultat dans recap
function checked_count($table)
{
    if (!empty($_POST[$table]))
        echo count($_POST[$table]);
}


function createAlert(string $text, string $level = 'info', string $redirect = 'index.php?page=view/main'): void
{
    $_SESSION['alert'] = $text;
    $_SESSION['alert_level'] = $level;
    header('Location: ' . $redirect);
    die;
}

function manageAlerts(): void
{
    if (!empty($_SESSION['alert']) && !empty($_SESSION['alert_level'])) {
        echo '
<div class="alert alert-' . checkAlertLevel() . '">' . $_SESSION['alert'] . '</div>';
        unset($_SESSION['alert']);
        unset($_SESSION['alert_level']);
    }
}

/**
 * @return string
 */
function checkAlertLevel(): string
{
    if (!empty($_SESSION['alert_level'])) {
        if (in_array($_SESSION['alert_level'], ['success', 'danger', 'warning', 'info'])) {
            return $_SESSION['alert_level'];
        } else {
            return 'info';
        }
    }
    return '';
}


// function qui permet d'afficher le mois en cours en francais
/**
 *  obligé de mettre sous forme de string sinon erreur "Parse error: Invalid numeric literal"
 *This comes from the changes made to how integers, specifically octals, are handled in PHP7 (as oppsoed to PHP5).
 * @return false|string
 */
function month()
{
    $numMois = date('m');
    switch ($numMois) {
        case '01':
            $mois = 'janvier';
            break;
        case '02':
            $mois = 'février';
            break;
        case '03':
            $mois = "mars";
            break;
        case '04':
            $mois = "avril";
            break;
        case '05':
            $mois = "mai";
            break;
        case '06':
            $mois = "juin";
            break;
        case '07':
            $mois = "juillet";
            break;
        case '08':
            $mois = "août";
            break;
        case '09':
            $mois = "septembre";
            break;
        case '10':
            $mois = "octobre";
            break;
        case '11':
            $mois = "novembre";
            break;
        case '12':
            $mois = "décembre";
            break;
        default:
            return false;
    }
    return $mois;
}


/**
 * @param $data
 * @return string
 */
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


/**
 * @param $categorie
 * @return string
 */

function Budget_title_SQL($categorie)
{

    if ($_SESSION == null) {
        echo "il faut être connecter pour pouvoir créer une liste d'items";

    } else {
        $connect = getpdo();
        $title = "";
        $var1 = $connect->prepare("SELECT titleBudget FROM budget WHERE categorieBudget = '$categorie' AND userID = ? ORDER BY dateBudget desc  ;");
        $var1->execute([$_SESSION['userId']]);
        $var1->setFetchMode(PDO::FETCH_OBJ);


        foreach ($var1 as $item) {
            $title .= "
<th>" . $item->titleBudget . "</th>";
        }

        return $title;

    }
}


/**
 * @param $categorie
 * @return string
 */
function Budget_price_SQL($categorie)
{
    if ($_SESSION == NULL) {
        return "";
    } else {

        $connect = getpdo();
        $price = "";
        $var2 = $connect->prepare("SELECT  prixBudget FROM budget WHERE categorieBudget = '$categorie' AND userID = ? ORDER BY dateBudget desc  ;");
        $var2->execute([$_SESSION['userId']]);
        $var2->setFetchMode(PDO::FETCH_OBJ);


        foreach ($var2 as $prix) {
            $num = $prix->prixBudget;
            $nombreFormat = number_format($num, 2, ',', ' ');
            $price .= "
<th>" . rtrim(rtrim($nombreFormat, "0"), ",") . "</th>";
        }
    }
    return $price;
}

/**
 * @param $categorie
 * @return void
 *
 * * Warning: Trying to access array offset on value of type bool in C:\wamp64\www\Perso\Productivity\lib\lib.php on line 203
 * "You are trying to handle a variable as if it was an array, but it is set to null, hence the error."
 * j'avais déclarer la variable $categorie au debut de la function
 */
function sommeCategorieBudget($categorie)
{
    if ($_SESSION == NULL) {
        return "";
    } else {
        $connect = getpdo();
        $sql = "SELECT SUM(prixBudget) AS 'prix_sum' FROM productivity.budget WHERE categorieBudget = '$categorie' AND userId = ? group by categorieBudget;";
        $stmt = $connect->prepare($sql);
        $stmt->execute([$_SESSION['userId']]);
        $sum = $stmt->fetch((PDO::FETCH_ASSOC));
        if ($sum == null) {
            echo "<th> ,- </th>";
        } else {
            $nombreFormat = number_format($sum['prix_sum'], 2, ',', ' ');
            echo '
<th class="fw-bold">' . $nombreFormat . "</th>";
        }
    }
}


function total_depense()
{
    $connect = getpdo();
    $sql = "SELECT SUM(prixBudget) AS 'prix_sum' FROM productivity.budget WHERE categorieBudget <> 'revenu' AND  categorieBudget <> 'epargne' AND userId = ?;";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$_SESSION['userId']]);
    $depense = $stmt->fetch((PDO::FETCH_ASSOC));
    if ($depense == null) {
        echo ", -";
    } else {
        $nombreFormat = number_format($depense['prix_sum'], 2, ',', ' ');
        echo rtrim(rtrim($nombreFormat, "0"), ",");
    }
}


/**
 * @return string
 */
function diff()
{

    $connect = getpdo();
    $sql = "select round(prix_sum1-prix_sum2 , 2 ) as diff from
(SELECT SUM(prixBudget) AS 'prix_sum1' FROM productivity.budget WHERE categorieBudget = 'revenu'  ) T1,
(SELECT SUM(prixBudget) AS 'prix_sum2' FROM productivity.budget WHERE categorieBudget <> 'revenu' AND  categorieBudget <> 'epargne' ) T2;
WHERE userId = ?";

    $stmt = $connect->prepare($sql);
    $stmt->execute([$_SESSION['userId']]);
    $diff = $stmt->fetch((PDO::FETCH_ASSOC));

    $diffFormat = number_format($diff["diff"], 2, ',', ' ');
    return rtrim(rtrim($diffFormat, "0"), ",");
}

/**
 * @param $categorie
 * @return mixed|string|void
 */


function deleteList($categorie)
{

    if ($_SESSION == null) {
        echo "il faut être connecter pour pouvoir supprimer des items";

    } else {
        $connect = getpdo();
        $title = "";
        $var1 = $connect->prepare("SELECT titleBudget , prixBudget , idbudget FROM budget WHERE categorieBudget = '$categorie'  AND userID = ? ;");
        $var1->execute([$_SESSION['userId']]);
        $var1->setFetchMode(PDO::FETCH_OBJ);

        foreach ($var1 as $item) {
            $title .= "
<tr>
    <td>" . "<input type='checkbox' name='suppr' value='$item->idbudget'>" . "</td>
    <td>" . $item->titleBudget . "</td>
    <td>" . $item->prixBudget . "</td>
</tr> <br>";
        }
        return $title;
    }
}

/*
function revenu_depense()
{
$connect = getpdo();
$sql = "SELECT SUM(prixBudget) AS 'prix_sum' FROM productivity.budget WHERE categorieBudget <> 'revenu' AND  categorieBudget <> 'epargne' AND userId = ?;";
$stmt = $connect->prepare($sql);
$stmt->execute([$_SESSION['userId']]);
$depense = $stmt->fetch((PDO::FETCH_ASSOC));
$depenseFormat = number_format($depense['prix_sum'], 2, '.', ' ');
$Depense = (double)filter_var($depenseFormat, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


$sql2 = "SELECT SUM(prixBudget) AS 'prix_sum' FROM productivity.budget WHERE categorieBudget = 'revenu' AND userId = ?;";
$stmt = $connect->prepare($sql2);
$stmt->execute([$_SESSION['userId']]);
$revenu = $stmt->fetch((PDO::FETCH_ASSOC));
$revenuFormat = number_format($revenu['prix_sum'], 2, '.', ' ');
$Revenu = (double)filter_var($revenuFormat, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$diff = $Revenu - $Depense;
$diffFormat = number_format($diff, 2, ',', ' ');

return rtrim(rtrim($diffFormat, "0"), ",");

}
*/
