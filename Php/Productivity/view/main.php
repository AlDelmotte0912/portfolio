<main role="main" class="container-fluid">
    <?php
    manageAlerts();
    if (!empty($_GET['page'])) {
        getContent($_GET['page']);
    } else {
        echo '<h2 class="d-flex justify-content-center">Productivity</h2>
              <div class="alert alert-success ">Bienvenue sur mon app !</div>';
    }
    ?>
</main>
