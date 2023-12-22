<?php
$connect = getpdo();

?>
<div class="container-fluid my-5">
    <h2>budget du mois de <?php echo month(); ?></h2>
    <div class="row justify-content-around">
        <div class="col-12 my-5">
            <div class="bg-info text-primary py-3 rounded">
                <table class="recap">
                    div marche pas pour modif estétique des fonctions trouver solution
                    <thead>
                    <h4 class=" text-center mb-5 fw-bold">Récap</h4>
                    </thead>
                    <tbody class="recap">
                    <tr class="recap text-start">
                        <td>Revenu</td>
                        <td>Courses</td>
                        <td>Abonnement</td>
                        <td>Frais Unique</td>
                        <td>Plaisir</td>
                        <td class=" mt-4 fw-bold">Total dépense du mois</td>
                        <td class=" fw-bold">revenu - dépense</td>
                        <td>Épargne</td>
                    </tr>
                    <tr class="text-end">
                        <div class="text-info"> <?= sommeCategorieBudget("revenu") ?></div>

                        <?= sommeCategorieBudget("courses") ?>
                        <?= sommeCategorieBudget("abonnement") ?>
                        <?= sommeCategorieBudget("frais unique") ?>
                        <?= sommeCategorieBudget("plaisir") ?>

                        <th class="mt-4 fw-bold"><?= total_depense() ?></th>
                        <th class="fw-bold"><?= diff() ?></th>
                        <?= sommeCategorieBudget("epargne") ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Courses-->
        <div class="col-3 my-5">
            <div class="bg-light py-3">
                <div class="container text-center">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">Courses</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("courses") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("courses") ?>
                                    <?= Budget_price_SQL("courses") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="accordion accordion-flush px-5" id="accordionFlushCourses">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseCourses" aria-expanded="false"
                                                aria-controls="flush-collapseCourses">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseCourses" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushCourses">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="date" name="dateBudget"
                                                       value="<?php echo date('Y-m-d'); ?>">
                                                <!--  <input type="text" name="categorieBudget" value="courses"> -->
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="courses">Courses</option>
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="epargne">epargne</option>
                                                        <option value="revenu">revenu</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Abonnement-->
        <div class="col-3 my-5">
            <div class="bg-light py-3">
                <div class="container text-center">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">récurent</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("abonnement") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("abonnement") ?>
                                    <?= Budget_price_SQL("abonnement") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="accordion accordion-flush px-5" id="accordionFlushAbo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseAbo" aria-expanded="false"
                                                aria-controls="flush-collapseAbo">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseAbo" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushAbo">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="datetime-local" name="dateBudget"
                                                       value="<?php echo date("Y-m-d H:i:s"); ?>">
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="courses">Courses</option>
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="epargne">epargne</option>
                                                        <option value="revenu">revenu</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--frais unique-->
        <div class="col-3 my-5">
            <div class="bg-light py-3">
                <div class="container text-center ">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">frais unique</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("frais unique") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("frais unique") ?>
                                    <?= Budget_price_SQL("frais unique") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="accordion accordion-flush px-5" id="accordionFlushUnique">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseUnique" aria-expanded="false"
                                                aria-controls="flush-collapseUnique">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseUnique" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushUnique">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="date" name="dateBudget"
                                                       value="<?php echo date('Y-m-d'); ?>">
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="courses">Courses</option>
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="epargne">epargne</option>
                                                        <option value="revenu">revenu</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Plaisir-->
        <div class="col-3 my-5 ">
            <div class="bg-light py-3 h-100">
                <div class="container text-center ">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">Plaisir</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("Plaisir") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("Plaisir") ?>
                                    <?= Budget_price_SQL("Plaisir") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12  ">
                            <div class="accordion accordion-flush px-5 " id="accordionFlushPlaisir">
                                <div class="accordion-item ">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapsePlaisir" aria-expanded="false"
                                                aria-controls="flush-collapsePlaisir">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapsePlaisir" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushPlaisir">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="date" name="dateBudget"
                                                       value="<?php echo date('Y-m-d'); ?>">
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="courses">Courses</option>
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="epargne">epargne</option>
                                                        <option value="revenu">revenu</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- revenu -->
        <div class="col-6 my-5">
            <div class="bg-light py-3">
                <div class="container text-center">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">revenu</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("revenu") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("revenu") ?>
                                    <?= Budget_price_SQL("revenu") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="accordion accordion-flush px-5" id="accordionFlushRevenu">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseRevenu" aria-expanded="false"
                                                aria-controls="flush-collapseRevenu">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseRevenu" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushRevenu">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="date" name="dateBudget"
                                                       value="<?php echo date('Y-m-d'); ?>">
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="revenu">revenu</option>
                                                        <option value="courses">Courses</option>
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="revenu">revenu</option>

                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Épargne-->
        <div class="col-6 my-5">
            <div class="bg-light py-3">
                <div class="container text-center">
                    <div class="row">
                        <table>
                            <thead>
                            <h5 class="text-center fw-bold text-info m-3">Épargne</h5>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-bold my-3">Total</td>
                                <?= Budget_title_SQL("Épargne") ?>

                            </tr>
                            <tr>
                                <td>
                                    <?= sommeCategorieBudget("Épargne") ?>
                                    <?= Budget_price_SQL("Épargne") ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="accordion accordion-flush px-5" id="accordionFlushEpargne">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseEpargne" aria-expanded="false"
                                                aria-controls="flush-collapseEpargne">
                                            ajouter une dépense ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseEpargne" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushEpargne">
                                        <div class="accordion-body">
                                            <form action="index.php?page=action/budget/budget" method="post">
                                                <input type="date" name="dateBudget"
                                                       value="<?php echo date('Y-m-d'); ?>">
                                                <div class="form-group">
                                                    <label for="categorieBudget"
                                                           class="form-label mt-4">Catégorie</label>
                                                    <select class="form-select" id="categorieBudget"
                                                            name="categorieBudget">
                                                        <option value="epargne">epargne</option>
                                                        <option value="courses">Courses</option>
                                                        <option value="abonnement">abonnement</option>
                                                        <option value="frais unique">frais unique</option>
                                                        <option value="plaisir">plaisir</option>
                                                        <option value="revenu">revenu</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <input type="text" name="titleBudget"
                                                       placeholder="titre dépense">
                                                <input type="text" name="prixBudget" placeholder="montant">
                                                <button type="submit">ajouter</button>
                                            </form>
                                            <a href="index.php?page=view/deleteBudget" type="btn">supprimer</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

