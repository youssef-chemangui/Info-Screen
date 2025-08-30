<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Projet Bibus - Système de transport public de Brest" />
        <title>les informations</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
    </head>
	<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
            <?php
                $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
                $requete5 = "SELECT cfg_theme FROM t_config_cfg WHERE cfg_id = 2";
                $result5 = $mysqli->query($requete5);
                $titre = $result5->fetch_assoc();
                $mysqli->close();
            ?>

                <a class="navbar-brand" href="#page-top"><?php echo  $titre['cfg_theme']  ; ?></a>
                <a class="navbar-brand" href="#page-top">
                        <img src="../ressources/Logo_Bibus_2012.png" alt="Logo Bibus" height="40">
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../inscription/inscription.php">Se connecter/s'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../liste.php">voir la liste des rédacteurs</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	<style>

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background-color: #f5f5f5;
			color: #333;
			line-height: 1.6;
			padding: 20px;
			max-width: 1200px;
			margin: 0 auto;
			display: flex;
			flex-direction: column;
			align-items: center;
			min-height: 100vh;
		}

		h1 {
			color: #0066cc;
			text-align: center;
			margin: 30px 0;
			padding-bottom: 15px;
			border-bottom: 2px solid #0066cc;
			font-size: 2.5em;
			width: 100%;
		}

		.information-container {
			background-color: white;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			padding: 30px;
			margin: 20px 0;
			transition: transform 0.3s ease;
			width: 80%;
			max-width: 800px;
			text-align: center;
		}

		.information-text {
			font-size: 1.5em;
			margin: 0;
			color: #444;
			line-height: 1.8;
		}

		/* Animation pour le changement de catégorie */
		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(20px); }
			to { opacity: 1; transform: translateY(0); }
		}

		.information-container {
			animation: fadeIn 0.8s ease-out;
		}

		/* Responsive design */
		@media (max-width: 768px) {
			body {
				padding: 15px;
			}
			
			h1 {
				font-size: 2em;
			}
			
			.information-container {
				width: 95%;
				padding: 20px;
			}
			
			.information-text {
				font-size: 1.3em;
			}
		}
	</style>
<?php
    $mysqli = new mysqli('localhost','e22204613sql','xdO9N6!G','e22204613_db2');
    $sql1="SELECT cat_num, cat_intitule FROM `t_categorie_cat` WHERE cat_statu='A';";

	
    $result1 = $mysqli->query($sql1);

    for ($i=0;$i<4;$i++)
    {
        
        $cat = $result1->fetch_assoc(); //récupération d’une ligne de résultat
        $id[$i]=$cat['cat_num']; //affectation de l’ID dans une case du tableau
		$titre[$i]=$cat['cat_intitule'];
        //echo ($id[$i] . "\n");
		//echo ($titre[$i]);
        echo ("<br />");
    }
	if (!isset($_GET['indice']) || !is_numeric($_GET['indice']) || ($_GET['indice']) < 0 || ($_GET['indice']) >8 ){
		echo "indice non valide";
		exit ();
	}else {
		$indice =  (int)$_GET['indice']+1;
		$sql3="SELECT cat_num, cat_intitule FROM `t_categorie_cat` WHERE cat_num = $indice;";
		$result3 = $mysqli->query($sql3);
		$cat1 = $result3->fetch_assoc();
		echo '<h1>Catégorie ' . $indice . ' ' . $cat1['cat_intitule'] . '</h1>';
		if ($result1->num_rows == $indice) {

			header("refresh:5;url=affichagecategorie.php?indice=0");

		}else 
			header("refresh:5;url=affichagecategorie.php?indice=". $indice  );
		}
		

		$sql2 = "SELECT * FROM t_information_inf WHERE cat_num = $indice";	
		$result2 = $mysqli->query($sql2);	
		echo ("<br />");
		while ($inf = $result2->fetch_assoc()) {
			
			echo ("-". $inf["inf_text"] . "\n");
			echo ("<br />");
	}
    $mysqli->close();
?>
</body>
</html>