<?php
$connect = getpdo();

$title = $_POST['titleBudget'];
$prix = $_POST['prixBudget'];
$date = $_POST['dateBudget'];
$categorie = $_POST['categorieBudget'];
$userId = $_SESSION['userId'];


if (empty($_POST['titleBudget']) || empty($_POST['prixBudget'])) {
    createAlert('veillez a ne pas laisser de champ vide.', 'info', 'index.php?page=view/budget');
} else if (!is_numeric($_POST['prixBudget'])) {
    createAlert('vvous ne pouvez mettre que des nombres dans la case prix', 'warning', 'index.php?page=view/budget');
} else {
    try {
        $sql = "INSERT INTO `budget`(`titleBudget` , `prixBudget` , `dateBudget` , `categorieBudget` , `userId`) VALUES ('$title' , '$prix' , '$date' , '$categorie' , '$userId')";

        $connect->exec($sql);
        createAlert(" $title  pour  $prix a bien été ajouté", "success", "index.php?page=view/budget");

    } catch (PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }

}

