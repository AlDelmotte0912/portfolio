<?php

$login = "";


?>
-l'adresse mail et user doivent être unique <br>

<div class="user-container">
    <form class="user" method="post" action="index.php?page=action/login">

        <div class="form-group">
            <label for="login" class="form-label mt-4">login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="form-group">
            <label for="Pwd" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="pwd" class="w-auto form-control"
                   placeholder="Password">
        </div>
        <br><br>
        <div class="form-group">
            <button type="submit">se connecter</button>
        </div>
        <button><a href="index.php?page=view/USER/signup">pas de compte ? Inscrivez-vous !</a>


    </form>
</div>