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

	</style>
<?php
    $mysqli = new mysqli('localhost','e22204613sql','xdO9N6!G','e22204613_db2');
    $sql1="SELECT cat_num,cat_intitule FROM `t_categorie_cat` WHERE cat_statu = 'A';";
    echo '<h1>4éme catégorie <h1>';
    echo ("<br />");
    header("refresh:5;url=affichagecategorie.php");
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