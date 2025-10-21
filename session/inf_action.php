<?php   
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location:session.php");
        exit();
    }
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    if (!empty($_POST["num"]) && !empty($_POST["texte"]) ) {
        $login = htmlspecialchars($_SESSION['login']);
        $num = htmlspecialchars(addslashes($_POST["num"]));
        $texte = htmlspecialchars(addslashes($_POST["texte"]));

        $sqlnombre = "SELECT MAX(inf_num) AS max_id FROM t_information_inf;";

        $result = $mysqli->query($sqlnombre);
        $row = $result->fetch_assoc();
        $new_id = $row['max_id'] + 1;

        $sqlcat = "SELECT MAX(cat_num) AS max_cat FROM t_categorie_cat;";
        $result1 = $mysqli->query($sqlcat);
        $row1 = $result1->fetch_assoc();

        if ($num > $row1['max_cat']){
            echo " categorie n'existe pas";
        } else {
            $sqlinfo = "INSERT INTO t_information_inf VALUES ($new_id, '$login', $num, '$texte', CURDATE(), 'NULL', 'V');";
            if ($mysqli->query($sqlinfo)) {
                echo "Insertion réussie";
            } else {
                echo "Error: " . $sqlinfo . "<br>" . $mysqli->error;
            }

        }

        

    }
?>

<?php
    $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
    if ($_POST['pseudosel']) {
        $pseudo_choisi=$_POST['pseudosel'];
    }

    $sql = "SELECT * FROM t_information_inf WHERE inf_num ='". $pseudo_choisi ."';";
    echo("<br>");

    $resultat = $mysqli->query($sql);
    if ($resultat == false){
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
    } else {
        $ligne =$resultat->fetch_assoc();
        $sql2="DELETE FROM t_information_inf WHERE inf_num='".$pseudo_choisi."';";
        $resultat = $mysqli->query($sql2);
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