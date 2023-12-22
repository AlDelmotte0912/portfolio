<?php
$identifiantErr = $emailErr = $genderErr = $bdayErr = "";
$identifiant = $email = $gender = $bday = "";


?>
<h3>inscription</h3>
<br><br>


<div class="user-container">
    <br><br>
    <form class="user" method="post" action="index.php?page=action/signup">
        <fieldset class="user">
            <p><span class="error">* required field</span></p>
            <div class="form-group">
                <label for="identifiant" class="form-label mt-4">identifiant</label>
                <span class="error">*<?php echo $identifiantErr ?></span>
                <input type="text" class="w-auto form-control" name="identifiant"
                       value="<?php echo $identifiant; ?>"
                       placeholder="entrez votre nom">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <span class="error">*<?php echo $emailErr ?></span>
                <input type="email" name="email" value="<?php echo $email; ?>" class="w-auto
            form-control"
                       placeholder="entrez votre email">
            </div>
            <div class="form-group">
                <label for="Password" class="form-label mt-4">Mot de passe</label>
                <input type="password" name="password" class="w-auto form-control"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <label for="age" class="form-label mt-4">date de naissance</label>
                <span class="error">*<?php echo $bdayErr ?></span>
                <input type="date" name="bday" value="<?php echo $bday; ?>" class="w-auto
            form-control"
                       placeholder="entrez votre age">
            </div>
            <fieldset class="form-group">
                <legend class="mt-4">sexe</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                           value="madame">
                    <label class="form-check-label" for="madame">
                        madame
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender"
                           value="monsieur">
                    <label class="form-check-label" for="monsieur">
                        monsieur
                    </label>
                </div>
                <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gender"
                           value="autre">
                    <label class="form-check-label" for="autre">
                        autre
                    </label>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button><a href="index.php?page=view/BOOK/books">revenir a la page précédente </a>

        </fieldset>
    </form>
</div>


<!-- ! il faudra hash le mot de passe
? crée une session pour le user avec option de déconnection et de suppretion du compte
? dans une 2eme temps lier tout a l'user et donc que la liste de livre soit en fonction de la
 ? personne qui se connect
 todo mais d'abord finir habits


todo créé page connection au compte avec lien vers page d'inscription si pas de compte
todo formulaire de deconnection
todo gerer les restriction du formulaire pour le moment uqoi que je fasse ca passe

? faire en sorte que l'utiliasteur reste connecter et que la liste de livre et habits, note soit
? personnaliser en fonction de l'utilisateur
-->