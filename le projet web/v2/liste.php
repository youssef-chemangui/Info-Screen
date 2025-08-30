<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Profils</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #007bff;
            color: white;
        }
        p {
            font-size: 16px;
            color: #333;
            margin-top: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
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
        <h2 class="text-center mb-4">Liste des Profils</h2>
        <div class="table-responsive">
        <a href="index.php" class="btn">Retour à l'aceuil</a>
            <table class="table table-striped table-hover text-center">
                <tbody>
                    <?php
                        $mysqli = new mysqli('localhost','e22204613sql','xdO9N6!G','e22204613_db2');
                        $requete1="SELECT * FROM t_profil_pfl ORDER BY pfl_date ASC;";
                        $resultat1 = $mysqli->query($requete1);
                        if ($resultat1 == false)
                        {
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                        }
                        else
                        {
                            echo "<br />";
                            echo "<p>Le nombre total des Rédacteur, : $resultat1->num_rows 
                            que ce que vous attend allez rejoignez nous en cliquant sur <a href='inscription/inscription.php'>ce lien</a></p>";
                            echo "<table class='table'>";
                            echo "<thead><tr><th>Nom</th><th>Prenom</th><th>Pseudo</th><th>Role</th></tr></thead><tbody>";
                        while ($personne = $resultat1->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td>" . ($personne['pfl_prenom']) . "</td>";
                            echo "<td>" . ($personne['pfl_nom']) . "</td>";
                            echo "<td>" . ($personne['cpt_pseudo']) . "</td>";
                            echo "<td>" . ($personne['pfl_role']) . "</td>";
                            echo "</tr>";
                        }
                        }
                        
                        $mysqli->close();
                    ?>
                </tbody>
            </table>
            
        </div>
    </div>
</body>
</html>
