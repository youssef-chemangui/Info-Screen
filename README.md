📺 Info-Screen

Application web permettant la gestion et la diffusion d’actualités liées aux transports en commun, avec un système de rôles (rédacteur / gestionnaire).

🚀 Description

Info-Screen est une application web développée en HTML, CSS, JavaScript et PHP, connectée à une base de données SQL.

Elle permet :

aux rédacteurs de proposer des actualités
aux gestionnaires de valider ces contenus
d’afficher des informations en temps réel sur les transports

Le projet a été conçu pour être utilisé dans un environnement universitaire et déployé sur un serveur local.

⚙️ Fonctionnalités
🔐 Système d’authentification (connexion / inscription)
👤 Gestion des rôles :
Rédacteur (création de contenu)
Gestionnaire (validation des publications)
📰 Publication d’actualités
✅ Validation / refus des contenus
🗄️ Interaction avec base de données SQL
🌐 Interface web simple et fonctionnelle
🛠️ Technologies utilisées
Frontend
HTML5
CSS3
JavaScript
Backend
PHP
Base de données
MySQL / SQL
Serveur
Apache (ex: XAMPP / WAMP)


📂 Structure du projet
Info-Screen/
│── assets/          # CSS, JS, images
│── config/          # Connexion base de données
│── pages/           # Pages principales
│── includes/        # Fonctions PHP
│── database.sql     # Script de la base de données
│── index.php        # Page principale

🧑‍💻 Installation
Cloner le projet :
git clone https://github.com/youssef-chemangui/Info-Screen.git
Placer le dossier dans :
htdocs (XAMPP) ou www (WAMP)
Importer la base de données :
Ouvrir phpMyAdmin
Importer le fichier database.sql
Configurer la connexion :
Modifier le fichier de config (ex: config.php)
http://localhost/Info-Screen


| Rôle         | Permissions                        |
| ------------ | ---------------------------------- |
| Rédacteur    | Créer et soumettre des actualités  |
| Gestionnaire | Valider / refuser les publications |


🎯 Objectif du projet

Ce projet a pour objectif de :

mettre en pratique le développement web complet (front + back)
gérer un système de rôles et permissions
manipuler une base de données relationnelle
simuler un système réel de diffusion d’informations
