<?php
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    if ($_POST['pseudosel']) {
        $pseudo_choisi=$_POST['pseudosel'];
        
    }
    else if($_POST['pseudochoix']){
        $pseudo_choisi=$_POST['pseudochoix'];
    }

    $sql = "SELECT * FROM t_profil_pfl WHERE cpt_pseudo ='". $pseudo_choisi ."';";
    echo("<br>");

    $resultat = $mysqli->query($sql);
    if ($resultat == false){
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
    } else {
        $ligne =$resultat->fetch_assoc();
        if ($ligne['pfl_validite'] == 'A'){
            $sql2="UPDATE t_profil_pfl SET pfl_validite='D' WHERE cpt_pseudo='".$pseudo_choisi."';";
        } else {
            $sql2="UPDATE t_profil_pfl SET pfl_validite='A' WHERE cpt_pseudo='".$pseudo_choisi."';";
        }
        $resultat = $mysqli->query($sql2);
        if ($resultat == false){
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        } else {
            header("Location:admin_comptes.php");
        }
    }
    $mysqli->close();


?>