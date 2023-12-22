<h2>ToDo</h2>

- régler problème d'alerte dans index <br>
- corriger décalage dans le résumé budget <br>
-crée page timer <br>
- créer page todo avec possibilité de les ajouter ou supprimer depuis le site <br>


<?php
$num = 1325.78;
echo $num;

$nombreFR = number_format($num, 2, ',', ' ');

echo '<br> ' . $num;
echo '<br> ' . $nombreFR;


if (!empty($_POST['titleBudget']) && !empty($_POST['prixBudget']) && is_numeric($_POST['prixBudget'])) {
    try {
        $sql = "INSERT INTO `budget`(`titleBudget` , `prixBudget` , `dateBudget` , `categorieBudget` , `userId`) VALUES ('$title' , '$prix' , '$date' , '$categorie' , '$userId')";

        $conn->exec($sql);
        createAlert(" $title  pour  $prix a bien été ajouté", "success", "index.php?page=view/budget");

    } catch (PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }
} else {
    createAlert('veuillez vérifier que vous aillez bien remplis les cases.', 'info', 'index.php?page=view/budget');
}
/*
//////////////////////////////contenu tableau résumer de budget////////////////////////////////////////////////////////////////////////////////////////////////////////////

 <ul class="col-6">
                            <li class="my-2  text-light fw-bold">revenu</li>
                            <li class="my-2 text-light fw-bold">epargne</li>
                            <?php
                            $sql = "SELECT categorieBudget  FROM productivity.budget WHERE userId = ? AND categorieBudget <> 'epargne' AND categorieBudget <> 'revenu' group by categorieBudget ;";
                            $stmt = $connect->prepare($sql);
                            $stmt->execute([$_SESSION['userId']]);
                            while ($sum = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li class="my-2 text-light"><?php echo $sum ['categorieBudget'] ?></li>
                            <?php }

                            ?>
                            <li class="my-2 mt-5 text-light fw-bold"> total des dépenses du mois</li>
                            <li class="my-2 text-light fw-bold"> Revenu - Dépense</li>
                        </ul>
                        <ul class="col-6">
                            <!--Revenu-->
                            <li class="my-2  text-light fw-bold">
                                <?php $sql = "SELECT SUM(prixBudget) AS prix_sum FROM productivity.budget WHERE userId = ? AND categorieBudget = 'revenu' ;";
                                $stmt = $connect->prepare($sql);
                                $stmt->execute([$_SESSION['userId']]);
                                $total = $stmt->fetch();
                                echo $total ['prix_sum'];
                                ?>
                            </li>
                            <!--Épargne-->
                            <li class="my-2 text-light fw-bold">
                                <?php $sql = "SELECT SUM(prixBudget) AS prix_sum FROM productivity.budget WHERE userId = ? AND categorieBudget = 'epargne' ;";
                                $stmt = $connect->prepare($sql);
                                $stmt->execute([$_SESSION['userId']]);
                                $total = $stmt->fetch();
                                echo $total ['prix_sum'];
                                ?>
                            </li>
                            <!--dépense par catégorie-->
                            <?php
                            $sql = "SELECT SUM(prixBudget) AS prix_sum FROM productivity.budget WHERE  userId = ? AND categorieBudget <> 'epargne' AND categorieBudget <> 'revenu'  group by categorieBudget ;";
                            $stmt = $connect->prepare($sql);
                            $stmt->execute([$_SESSION['userId']]);
                            while ($sum = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $nombreFormat = number_format($sum['prix_sum'], 2, ',', ' ');
                                echo var_dump($sum);
                                ?>

                                <li class="my-2 text-light"><?php if ($nombreFormat != null) {
                                        echo rtrim(rtrim($nombreFormat, "0"), ",");
                                    } else {
                                        echo " ,- ";
                                    } ?></li>
                            <?php }

                            ?>
                            <!--total des dépenses-->
                            <li class="mt-5 my-2 text-light fw-bold">  <?php $sql = "SELECT SUM(prixBudget) AS prix_sum FROM productivity.budget WHERE userId = ? AND categorieBudget <> 'revenu' ;";
                                $stmt = $connect->prepare($sql);
                                $stmt->execute([$_SESSION['userId']]);
                                $total = $stmt->fetch();
                                $nombreFormat = number_format($total['prix_sum'], 2, ',', ' ');

                                echo rtrim(rtrim($nombreFormat, "0"), ",");
                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                $nombreFormat = number_format($finDeMois, 2, ',', ' ');
                                ?>
                            </li>
                            <!--revenu - dépense-->
                            <li class="my-2 text-light fw-bold"><?= rtrim(rtrim($nombreFormat, "0"), ",") ?></li>
                        </ul>

//////////////////////////////////////Requêtes SQL Résumé////////////////////////////////////////////////////////

$sql = "SELECT SUM(prixBudget) AS 'prix_sum' FROM productivity.budget WHERE  userId = ?;";
$stmt = $connect->prepare($sql);
$stmt->execute([$_SESSION['userId']]);
$sum = $stmt->fetch((PDO::FETCH_ASSOC));
if ($sum == null) {
    echo ", -";
} else {
    $nombreFormat = number_format($sum['prix_sum'], 2, ',', ' ');
    echo '<li class="fw-bold">' . $nombreFormat . "</li>";
}








<h5 class="col-12 text-center fw-bold text-info m-3">Courses</h5>
<ul class="mh-100 col-6 " style="height: 144px; overflow:hidden;">
    <li class="fw-bold">Total</li>
    <?= Budget_title_SQL("courses") ?>
</ul>
<ul class="mh-100 col-6 " style="height: 144px;  overflow:hidden; overflow-y:scroll;">
    <?= sommeCategorieBudget("courses") ?>
    <?= Budget_price_SQL("courses") ?>
</ul>



   <style> table {
                height: 144px;
                overflow: hidden;
                overflow-y: scroll;
            }  </style>
*/
?>
