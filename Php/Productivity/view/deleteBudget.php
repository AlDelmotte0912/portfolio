<?php
// todo donner la possibilité d'affiner la recherche


?>

<form method='post' action='index.php?page=action/budget/delete'>
    <div class="container text-center">
        <div class="row">
            <h5 class="col-12 text-center fw-bold text-info m-3">Supprimer</h5>
            <div class="col-2 text-start"><h5>courses</h5>
                <?= deleteList("courses"); ?></div>
            <div class="col-2 text-start"><h5>abonnement</h5>
                <?= deleteList("abonnement"); ?></div>
            <div class="col-2 text-start"><h5>frais unique</h5>
                <?= deleteList("frais unique"); ?></div>
            <div class="col-2 text-start"><h5>plaisir</h5>
                <?= deleteList("plaisir"); ?></div>
            <div class="col-2 text-start"><h5>revenu</h5>
                <?= deleteList("revenu"); ?></div>
            <div class="col-2 text-start"><h5>epargne</h5>
                <?= deleteList("epargne"); ?></div>
        </div>
        <div class="col-12 text-center">
            <button type="submit">supprimer</button>
        </div>
    </div>

</form>
