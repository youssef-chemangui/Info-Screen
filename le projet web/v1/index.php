<!-- nom : chemangui
    prénom : youssef
    num étudiant : e22204613-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Projet Bibus - Système de transport public de Brest" />
        <title>Bibus</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
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
                        <img src="ressources/Logo_Bibus_2012.png" alt="Logo Bibus" height="40">
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="inscription/inscription.php">Se connecter/s'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="liste.php">voir la liste des rédacteurs</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Bienvenue sur le projet Bibus</h1>
                <img src="https://cdt29.media.tourinsoft.eu/upload/BIBUS.jpg" alt="Bibus Logo" class="small-img">
                <a class="btn btn-lg btn-light" href="#about">Voir les actualités</a>
                <a class="btn btn-lg btn-light" href="affichage/affichagecategorie.php?indice=0">Voir les informations</a>
            </div>
        </header>
        <!-- About section-->
        

        <section id="about">

        <?php
            $mysqli = new mysqli('localhost','e22204613sql','xdO9N6!G','e22204613_db2');
            if ($mysqli->connect_errno) 
            {
                // Affichage d'un message d'erreur
                echo "Error: Problème de connexion à la BDD \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";
                // Arrêt du chargement de la page
                exit();
                }
                // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
                if (!$mysqli->set_charset("utf8")) {
                    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                    exit();
                }
                $result_total = $mysqli->query("SELECT COUNT(*) FROM t_actualite_new WHERE new_etat = 'V'");
                $total_actualites = $result_total->fetch_row()[0];
                echo "<p class='actualites-message'>Voici les 10 dernières actualités de total de : $total_actualites</p>";

                //Préparation de la requête récupérant tous les profils
                $requete="SELECT * FROM t_actualite_new WHERE new_etat='V' ORDER BY new_date DESC LIMIT 10;";
                //Affichage de la requête préparée
                $result1 = $mysqli->query($requete);
                if ($result1 == false) //Erreur lors de l’exécution de la requête
                { 
                    echo "Error: La requête a echoué \n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit();
                }
                echo "<table class='table'>";
                echo "<thead><tr><th>Title</th><th>Text</th><th>Pseudo</th><th>Date</th></tr></thead><tbody>";
                while ($actu = $result1->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>" . ($actu['new_titre']) . "</td>";
                    echo "<td>" . ($actu['new_text']) . "</td>";
                    echo "<td>" . ($actu['cpt_pseudo']) . "</td>";
                    echo "<td>" . ($actu['new_date']) . "</td>";
                    echo "</tr>";
                                        
                }
                echo "</tbody></table>";
                
                $mysqli->close();
        ?>

        </section>

        <section id="about2">
            
            <img src="https://cdt29.media.tourinsoft.eu/upload/BIBUS1.jpg" alt="Bus de Brest" class="small-img">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>À propos de Bibus</h2>
                        <p class="lead">Bibus est le réseau de transport public de la métropole de Brest. Il propose des solutions de déplacement efficaces et écologiques pour les habitants et les visiteurs.</p>
                        <ul>
                            <li>Bus, tramway et navettes maritimes</li>
                            <li>Horaires adaptés aux besoins des usagers</li>
                            <li>Application mobile pour planifier vos trajets</li>
                            <li>Engagement en faveur du développement durable</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">

        <div class="services-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Alstom_Citadis_302_n°1001_%2B_1016.jpg/640px-Alstom_Citadis_302_n°1001_%2B_1016.jpg" alt="Planification" class="service-img">
            <img src="https://files2.bibus.fr/s3fs-public/images/bus_ligne_2_0.jpg?VersionId=BLn5iBmkdwEXFQACQ5m0GT6fZHYo3t4e" alt="Abonnements" class="service-img">
        </div>

            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Nos Services</h2>
                        <p class="lead">Découvrez les services offerts par Bibus pour faciliter vos déplacements :</p>
                        <ul>
                            <li><strong>Planification de trajets</strong> : Trouvez l'itinéraire le plus rapide.</li>
                            <li><strong>Abonnements</strong> : Abonnez-vous pour des trajets illimités.</li>
                            <li><strong>Informations en temps réel</strong> : Suivez votre bus ou tramway en direct.</li>
                            <li><strong>Accessibilité</strong> : Des solutions pour les personnes à mobilité réduite.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section id="contact">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Contactez-nous</h2>
                        <p class="lead">Pour toute question ou suggestion, n'hésitez pas à nous contacter :</p>
                        <ul>
                            <li><strong>Email</strong> : contact@bibus-brest.fr</li>
                            <li><strong>Téléphone</strong> : 02 98 00 00 00</li>
                            <li><strong>Adresse</strong> : 1 Rue de la Liberté, 29200 Brest</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
        <?php
            $mysqli = new mysqli('localhost', 'e22204613sql', 'xdO9N6!G', 'e22204613_db2');
            $requete3 = "SELECT cfg_devName FROM t_config_cfg WHERE cfg_devName = 'Youssef Chemangui'";
            $result3 = $mysqli->query($requete3);
            $nom = $result3->fetch_assoc();
            $mysqli->close();
        ?>

        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; <?php echo "fait par  " . $nom['cfg_devName'] . "\n" ; ?> </p>
        </div>

        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>