<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        
        .user-info {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
        }
        
        .user-info p {
            margin: 5px 0;
        }
        
        .info-label {
            font-weight: bold;
            color: #2c3e50;
        }
        
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmation d'inscription</h1>

        <?php
            // Connexion à la base de données
            $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
            if ($mysqli->connect_errno) {
                echo '<div class="error">Error: Problème de connexion à la BDD<br>';
                echo "Errno: " . $mysqli->connect_errno . "<br>";
                echo "Error: " . $mysqli->connect_error . "</div>";
                exit();
            }
            
            // Encodage en UTF-8
            if (!$mysqli->set_charset("utf8")) {
                echo'<div class="error">Pb de chargement du jeu de car. utf8 : %s</div>', $mysqli->error;
                exit();
            }

            if (!empty($_POST["pseudo"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp1"]) && !empty($_POST["code"])) {
                $pseudo = htmlspecialchars(addslashes($_POST["pseudo"]));
                $prenom = htmlspecialchars(addslashes($_POST["prenom"]));
                $nom = htmlspecialchars(addslashes($_POST["nom"]));
                $email = htmlspecialchars(addslashes($_POST["email"]));
                $mdp = htmlspecialchars(addslashes($_POST["mdp"]));
                $mdp1 = htmlspecialchars(addslashes($_POST["mdp1"]));
                if ($mdp !== $mdp1) {
                    echo '<div class="error">Les mots de passe ne correspondent pas.</div>';
                    exit();
                }
                $code = htmlspecialchars(addslashes($_POST["code"]));
                $sql_code = "SELECT cfg_code FROM t_config_cfg WHERE cfg_devName = 'Youssef Chemangui'";
                

                $result_code = $mysqli->query($sql_code);
            
                $code1 = $result_code->fetch_assoc();
                if ($code1['cfg_code'] !== $code) {
                    echo '<div class="error">Code d\'inscription invalide.</div>';
                    exit ();
                } 
            } else {
                echo'<div class="error">tous les champs obligatoire</div>' ;
                exit();
            }
            
            $sqlcompte = "INSERT INTO t_compte_cpt VALUES ('$pseudo', MD5('$mdp'))";
            if (!$mysqli->query($sqlcompte)) {
                echo '<div class="error">Erreur lors de l\'insertion dans t_compte_cpt: ' . $mysqli->error . '</div>';
                exit();
            }

            $sqlprofil = "INSERT INTO t_profil_pfl VALUES ('$pseudo', '$nom', '$prenom', '$email', 'R', 'A', CURDATE())";
            if (!$mysqli->query($sqlprofil)) {
                echo '<div class="error">Erreur lors de l\'insertion dans t_profil_pfl: ' . $mysqli->error . '</div>';
            
                $deleteCompte = "DELETE FROM t_compte_cpt WHERE cpt_pseudo = '$pseudo';";
                
                if (!$mysqli->query($deleteCompte)) {
                    echo '<div class="error">Erreur lors de la suppression du compte: ' . $mysqli->error . '</div>';
                }
            
                exit();
            }else {
                
            }
            

            echo '<div class="success-message">Inscription réussie !</div>';
            echo '<div class="user-info">';
            echo '<p><span class="info-label">Prénom:</span> ' . $prenom . '</p>';
            echo '<p><span class="info-label">Nom:</span> ' . $nom . '</p>';
            echo '<p><span class="info-label">Email:</span> ' . $email . '</p>';
            echo '<p><span class="info-label">Pseudo:</span> ' . $pseudo . '</p>';
            echo '</div>';

            $mysqli->close();
        ?>
        <a href="../liste.php" class="btn">Voir la liste des rédacteurs</a>
        <a href="../index.php" class="btn">Retour à l'aceuil</a>
    </div>
</body>
</html>