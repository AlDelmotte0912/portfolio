<?php
$conn = getpdo();
$lu = "SELECT * FROM book WHERE bookstatus = '1'  ORDER BY bookEnd asc";
$req = $conn->query($lu);


$aLire = "SELECT * FROM book WHERE bookstatus = '0'";
$pasLu = $conn->query($aLire);
?>


    <h3>Books</h3>

    <div class="flex-container">
        <div class="aLire">
            <h4>à lire</h4>
            <ul>
                <?php while ($row = $pasLu->fetch()) { ?>
                    <li><?php echo $row['bookTitle'] . '   <span class="autheur">' . $row['bookAuthor'] . '</span>'; ?></li>
                <?php }
                ?>
                <li>
                    <button><a href="index.php?page=view/BOOK/crudBook">modifier la
                            liste</a></button>
                </li>
            </ul>
        </div>

        <div class="lu">
            <h4>lu</h4>
            <ul>
                <?php while ($row = $req->fetch()) { ?>
                    <li><?php echo $row['bookTitle'] . '   <span class="autheur">' .
                            $row['bookAuthor'] . '</span>'; ?></li>
                <?php }
                $req->closeCursor();
                ?>
                <li>
                    <button><a href="index.php?page=view/BOOK/crudBook">modifier la
                            liste</a></button>
                </li>
            </ul>
        </div>
    </div>

<?php
/*todo ajouter possibiliter d'ajouter des livres ,de les modifier ou suprimer
avoir la possibiliter de cliquer sur le titre et avoir acces a mes notes sur le livre
? comment faire pour que quand je clique sur un button modifier l'utilisateur peut sans changer
? de page modifier ajouter et supprimer dynamiquement ce qu'il veut
? pour que le onclick sur les li marche il faudrait d'abord que le onclick du bouton soit activer
The oninput event occurs when an element gets input.

The oninput event occurs when the value of an <input> or <textarea> element is changed.

The oninput event does NOT occur when a <select> element changes.
Note

The oninput event is similar to the onchange event.

The difference is that the oninput event occurs immediately after the content has been changed, while onchange occurs when the element loses focus.


*/
