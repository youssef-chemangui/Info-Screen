<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <div id="contenu">
        <h2>Inscription</h2>
        <form action="action.php" method="post">
            <p>Votre prénom : <input type="text" name="prenom"  /></p>
            <p>Votre nom : <input type="text" name="nom"  /></p>
            <p>Votre email : <input type="email" name="email" /></p>
            <p>Votre pseudo : <input type="text" name="pseudo" /></p>
            <p>Votre mot de passe : <input type="password" name="mdp"  /></p>
            <p>Confirmation mot de passe : <input type="password" name="mdp1"  /></p>
            <p>Code d'inscription <input type="text" name="code"  /></p>
            <p><input type="submit" value="Valider"></p>
        </form>
        <button class="btn btn-primary" onclick="window.location.href='../index.php'">Retour</button>
    </div>
</body>
</html>
