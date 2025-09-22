
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPACE ADMINISTRATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    
    /* Style pour les messages de connexion */
    body{
        text-align: center;
        font-weight: bold;
        color: #27ae60;
        margin: 20px 0;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .ligne {
            padding: 15px;
        }
        
        h1 {
            font-size: 24px;
        }
    }
</style>
<body>
</body>
</html>
<?php
    /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
    autorisé à un utilisateur connecté. */
    session_start();
    if(!isset($_SESSION['login'])) { //A COMPLETER pour tester aussi le rôle...
    //Si la session n'est pas ouverte, redirection vers la page du formulaire
    header("Location:session.php");
    exit();
    }
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'R') {
            echo "Connexion établie pour le rédacteur.";
        } elseif ($_SESSION['role'] == 'G') {
            echo "Connexion établie pour le gestionnaire.";
        }
    }
    
?>

<body>
    <!--contenu du fichier HTML-->
    <h1>ESPACE ADMINISTRATION</h1>
    <!--Suite du contenu du fichier HTML-->
    <?php
    /* Code PHP permettant de souhaiter la bienvenue à l’utilisateur connecté et
    d’afficher le détail de son profil. */
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    $login = htmlspecialchars($_SESSION['login']);
    $role = htmlspecialchars($_SESSION['role']);
    $sql = "SELECT * FROM t_profil_pfl WHERE cpt_pseudo = '" . $login . "';";
    $resultat = $mysqli->query($sql);
    while ($personne = $resultat->fetch_assoc()) {
        echo "<div class='ligne'>";
        echo "<div><strong>Nom:</strong> " . ($personne['pfl_nom']) . "</div>";
        echo "<div><strong>Prénom:</strong> " . ($personne['pfl_prenom']) . "</div>";
        echo "<div><strong>Pseudo:</strong> " . ($personne['cpt_pseudo']) . "</div>";
        echo "<div><strong>Rôle:</strong> " . ($personne['pfl_role']) . "</div>";
        echo "<br>"; // Saut de ligne entre chaque personne
        echo "</div>";
    }
    ?>
</body>
</html>