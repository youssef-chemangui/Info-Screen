<?php   
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    if ( !empty($_POST["texte"]) ) {
        $texte = htmlspecialchars(addslashes($_POST["texte"]));

        $sqlnombre = "SELECT MAX(cat_num) AS max_id FROM t_categorie_cat;";

        $result = $mysqli->query($sqlnombre);
        $row = $result->fetch_assoc();
        $new_id = $row['max_id'] + 1;

        $sqlcat = "INSERT INTO t_categorie_cat VALUES ($new_id,'A', CURDATE(), '$texte');";
        if ($mysqli->query($sqlcat)) {
            echo "Insertion réussie";
        } else {
            echo "Erreur: " . $sqlcat . "<br>" . $mysqli->error;
        }

    }
?>

<?php
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    if ($_POST['numero']) {
        $num_choisi=$_POST['numero'];
    }
    

    $sql = "SELECT * FROM t_categorie_cat WHERE cat_num ='". $num_choisi ."';";
    echo("<br>");

    $resultat = $mysqli->query($sql);
    if ($resultat == false){
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
    } else {
        $ligne =$resultat->fetch_assoc();
        $sql1 = "DELETE FROM t_information_inf WHERE cat_num='".$num_choisi."';";
        $result1 = $mysqli->query($sql1);
        $sql2 = "DELETE FROM t_categorie_cat WHERE cat_num='".$num_choisi."';";
        $result2 = $mysqli->query($sql2);
        if ($resultat == false){
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        } else {
            header("Location:admin_categories.php");
        }
    }
    $mysqli->close();
?>