<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div id="contenu">
    <form action="session_action.php" method="post">
        <fieldset>
            <legend>Veuillez saisir votre pseudo et votre mot de passe :</legend>
            <p>Votre pseudo :
                <input type="text" name="pseudo" placeholder="pseudo" required="required" />
            </p>
            <p>Votre mot de passe :
                <input type="password" name="mdp" placeholder="mot de passe" required="required" />
            </p>
            <p><input type="submit" value="Valider"></p>
        </fieldset>
    </form>
    </div>
</body>
</html>
