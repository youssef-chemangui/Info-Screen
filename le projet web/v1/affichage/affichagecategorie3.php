<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Projet Bibus - Système de transport public de Brest" />
        <title>Bibus</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
    </head>
    <style>
		h1 {
		color:#006EAA;
		font-weight:bold;
		font-size:24pt;
		font-family:Arial, sans-serif;
		font-style:italic;
		}

		h3 {
		color:#006EFF;
		font-weight:bold;
		font-size:20pt;
		font-family:Arial, sans-serif;
		font-style:italic;
		color:green;
		}

		body{
		display:flex;
		flex-direction:column;
		align-items:center;
		}

		#navigation {
		font-size:28pt;
		color:black;
		width:90%;
		height:auto;
		order:1;
		background-color:white;
		padding:10px;
		font-family:Arial, sans-serif;
		font-weight:bold;
		}

		#contenu {
		width:90%;
		height:auto;
		order:2;
		background-color:white;
		padding:10px;
		margin-top:40px;
		}
            /* Styles pour la page Bibus */
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #F4F4F4;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #006EAA;
        font-weight: bold;
        font-size: 24pt;
        font-style: italic;
        text-align: center;
    }

    h3 {
        color: #008000;
        font-weight: bold;
        font-size: 20pt;
        font-style: italic;
        text-align: center;
    }

    #navigation {
        font-size: 24pt;
        color: white;
        width: 90%;
        background-color: #FFD700;
        padding: 15px;
        font-weight: bold;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    #contenu {
        width: 90%;
        background-color: white;
        padding: 20px;
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    button {
        background-color: #006EAA;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #00558C;
    }


	</style>
<?php
    $mysqli = new mysqli('localhost','e22204613sql','xdO9N6!G','e22204613_db2');
    $sql1="SELECT cat_num,cat_intitule FROM `t_categorie_cat`;";
    echo '<h1>3éme catégorie <h1>';
    echo ("<br />");
    header("refresh:5;url=affichagecategorie4.php");
    $result1 = $mysqli->query($sql1);
    for ($i=0;$i<4;$i++)
    {
        
        $cat = $result1->fetch_assoc(); //récupération d’une ligne de résultat
        $id[$i]=$cat['cat_num']; //affectation de l’ID dans une case du tableau
		$titre[$i]=$cat['cat_intitule'];
        echo ($id[$i] . "\n");
		echo ($titre[$i]);
        echo ("<br />");
    }

    $mysqli->close();
?>
</body>
</html>