<?php
if (!empty($_POST['login']) && !empty($_POST['pwd'])) {
    $connect = getpdo();
    $users = $connect->prepare('SELECT * FROM user WHERE userLogin = ?');
    $users->execute([$_POST['login']]);
    $user = $users->fetchObject();
    if ($user) {

        if ($user->userPassword) {
            $update = $connect->prepare('UPDATE user SET userLastlogin = NOW() WHERE userId = ?');
            $update->execute([$user->userId]);
            $_SESSION['userId'] = $user->userId;

            createAlert("Bienvenue " . $user->userLogin, "info", "index.php?page=view/USER/profile");

        } else {
            echo 'c\'est la que ca déconne';
        }
    } else {
        echo 'ca marche pas du tout ton truc mon frérot...';
    }
}