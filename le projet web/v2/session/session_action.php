<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session ouverte</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
        line-height: 1.6;
        padding: 20px;
    }
    
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #3498db;
    }
    
    .ligne {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .ligne div {
        margin-bottom: 10px;
    }
    
    strong {
        color: #3498db;
        min-width: 80px;
        display: inline-block;
    }
    body{
        text-align: center;
        font-weight: bold;
        color:rgb(255, 0, 0);
        margin: 20px 0;
    }
    
    @media (max-width: 768px) {
        .ligne, .menu {
            padding: 15px;
        }
        
        h1 {
            font-size: 24px;
        }
        
        .menu-container {
            flex-direction: column;
        }
        
        .menu-button {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>
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
                    echo "pseudo/mot de passe incorrect ou profil inconnu !";
                    echo "<br /><a href=\"./session.php\">Cliquez ici pour réafficher le formulaire</a>";
                }
            }

            $mysqli->close();
        ?>
        <a href="../index.php" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>