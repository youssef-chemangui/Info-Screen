<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session ouverte</title>
</head>
<body>
    <div class="container">
        <?php
            session_start();
            $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');

            if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {
                $pseudo = htmlspecialchars(addslashes($_POST["pseudo"]));
                $mdp = htmlspecialchars(addslashes($_POST["mdp"]));
            }

            if ($mysqli->connect_errno) {
                echo "Error: Problème de connexion à la BDD \n";
                exit();
            }

            mysqli_report(MYSQLI_REPORT_OFF); 
            $sql = "SELECT cpt_pseudo, cpt_motdepass FROM t_compte_cpt WHERE cpt_pseudo = '" . $pseudo . "' AND cpt_motdepass = MD5('" . $mdp . "');";
            $resultat = $mysqli->query($sql);

            if ($resultat == false) {
                echo "Error: Problème d'accès à la base \n";
                exit();
            } else {
                $sql1 = "SELECT pfl_validite, pfl_role FROM t_profil_pfl WHERE cpt_pseudo = '" . $pseudo . "';";
                $resultat1 = $mysqli->query($sql1);

                if ($resultat1 && $resultat1->num_rows == 1) {
                    $validite = $resultat1->fetch_assoc();

                    if ($validite['pfl_validite'] == 'A') {
                        $_SESSION['login'] = $pseudo;
                        $_SESSION['role'] = $validite['pfl_role']; 
                        header("Location: admin_accueil.php");
                        exit();
                    } else {
                        echo "Compte non valide.";
                    }
                } else {
                    echo "pseudo/mot de passe incorrect(s) ou profil inconnu !";
                    echo "<br /><a href=\"./session.php\">Cliquez ici pour réafficher le formulaire</a>";
                }
            }

            $mysqli->close();
        ?>

        <a href="../liste.php" class="btn">Voir la liste des rédacteurs</a>
        <a href="../index.php" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>