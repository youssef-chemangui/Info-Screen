<!DOCTYPE html>
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
    
    /* Style pour les menus */
    .menu {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .menu-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }
    
    .menu-button {
        padding: 8px 15px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        font-size: 14px;
    }
    
    .menu-button:hover {
        background-color: #2980b9;
    }
    
    /* Responsive */
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
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location:session.php");
        exit();
    }
?>

<body>
    <h1>ESPACE ADMINISTRATION</h1>
    
    <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'R') {
                echo "<a style='color: #e74c3c;'>Vous etes un Rédacteur</a>";
                echo "<div class='menu'>";
                echo "<div class='menu-container'>";
                echo "<a href='admin_accueil.php' class='menu-button'>Accueil</a>";
                echo "<a href='actualites.php' class='menu-button'>Actualités</a>";
                echo "<a href='admin_categories.php' class='menu-button'>Catégories / informations</a>";
                echo "<a href='url.php' class='menu-button'>URL</a>";
                echo "<a href='deconnexion.php' class='menu-button' style='background-color: #e74c3c;'>Déconnexion</a>";
                echo "</div>";
                echo "</div>";
                
            } elseif ($_SESSION['role'] == 'G') {
                echo "Vous etes un Gestionnaire";
                echo "<div class='menu'>";
                echo "<div class='menu-container'>";
                echo "<a href='admin_accueil.php' class='menu-button'>Accueil</a>";
                echo "<a href='admin_comptes.php' class='menu-button'>Comptes</a>";
                echo "<a href='actualites.php' class='menu-button'>Actualités</a>";
                echo "<a href='admin_categories.php' class='menu-button'>Catégories / informations</a>";
                echo "<a href='url.php' class='menu-button'>URL</a>";
                echo "<a href='deconnexion.php' class='menu-button' style='background-color: #e74c3c;'>Déconnexion</a>";
                echo "</div>";
                echo "</div>";
            }
        }
    ?>

    <div id="contenu">
        <h2>Ajouter une categorie</h2>
        <form action="cat_action.php" method="post">
            <p>nom  : <input type="text" name="texte" /></p>
            <p><input type="submit" value="Valider"></p>
        </form>
    </div>
    <?php
        $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
        $login = htmlspecialchars($_SESSION['login']);
        $role = htmlspecialchars($_SESSION['role']);
        $sql = "SELECT * FROM t_profil_pfl WHERE cpt_pseudo = '" . $login . "';";
        $resultat = $mysqli->query($sql);
        
        if (isset($_SESSION['role'])) {
            echo ("<br />");
                $requete3="SELECT * FROM `t_categorie_cat`;";
                $resultat3 = $mysqli->query($requete3);
                if ($resultat3 == false) {
                    echo "Error: La requête a échoué \n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit();
                } else {

                    echo("<br>");
                    echo("<table class='table table-hover'>");

                    echo("<tr>");
                    echo("<th>"); echo ("Numéro de catégorie"); echo("</th>");
                    echo("<th>"); echo ("Statut"); echo("</th>");
                    echo("<th>"); echo ("Date"); echo("</th>");
                    echo("<th>"); echo ("Titre"); echo("</th>");
                    echo("<th>"); echo ("Actions"); echo("</th>");
                    echo("</tr>");

                    while ($cat=$resultat3->fetch_assoc()){
                        echo ("<tr>");
                        echo ("<td>"); 
                        echo ($cat['cat_num']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($cat['cat_statu']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($cat['cat_date']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($cat['cat_intitule']); 
                        echo ("</td>"); 
                        echo ("<td>");
                            echo ("<td>");
                            echo "<form action='cat_action.php' method='POST'>"; 
                            echo "<input type='hidden' name='numero' value='".$cat['cat_num']."'/>";
                            echo "<button type='submit' class='btn btn-default'
                            name='desactive'>supprimer</button>";
                        echo "</form>";
                        echo "</form>";
                        echo ("</td>");
                        echo ("</tr>");
                    } 
                    echo ("</table>");
                }

            }
            $mysqli->close();
        
    ?>
    <div id="contenu">
        <h2>Ajouter une information</h2>
        <form action="inf_action.php" method="post">
            <p>numéro de catégorie  : <input type="text" name="num"  /></p>
            <p>contenu : <input type="text" name="texte" /></p>
            <p><input type="submit" value="Valider"></p>
        </form>
    </div>
    <?php
        $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
        $login = htmlspecialchars($_SESSION['login']);
        $role = htmlspecialchars($_SESSION['role']);
        $sql = "SELECT * FROM t_profil_pfl WHERE cpt_pseudo = '" . $login . "';";
        $resultat = $mysqli->query($sql);
        
        if (isset($_SESSION['role'])) {
            echo ("<br />");
                $requete2="SELECT * FROM t_information_inf JOIN t_compte_cpt USING (cpt_pseudo) ORDER BY cat_num ;";
                $resultat2 = $mysqli->query($requete2);
                if ($resultat2 == false) {
                    echo "Error: La requête a échoué \n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit();
                } else {

                    echo("<br>");
                    echo("<table class='table table-hover'>");

                    echo("<tr>");
                    echo("<th>"); echo ("Auteur"); echo("</th>");
                    echo("<th>"); echo ("La catégorie"); echo("</th>");
                    echo("<th>"); echo ("Texte"); echo("</th>");
                    echo("<th>"); echo ("Date"); echo("</th>");
                    echo("<th>"); echo ("etat"); echo("</th>");
                    echo("<th>"); echo ("Actions"); echo("</th>");
                    echo("</tr>");

                    while ($inf=$resultat2->fetch_assoc()){
                        echo ("<tr>");
                        echo ("<td>"); 
                        echo ($inf['cpt_pseudo']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($inf['cat_num']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($inf['inf_text']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($inf['inf_date']); 
                        echo ("</td>"); 
                        echo ("<td>"); 
                        echo ($inf['inf_etat']); 
                        echo ("</td>"); 
                        echo ("<td>");
                            echo "<form action='inf_action.php' method='POST'>"; 
                            echo "<input type='hidden' name='pseudosel' value='".$inf['inf_num']."'/>";
                            echo "<button type='submit' class='btn btn-default'
                            name='desactive'>supprimer</button>";
                        echo "</form>";
                        echo ("</td>");
                        echo ("</tr>");
                    } 
                    echo ("</table>");
                }

            }
            $mysqli->close();
        
    ?>
</body>
</html>