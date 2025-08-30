-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 avr. 2025 à 22:17
-- Version du serveur : 10.11.6-MariaDB-0+deb12u1-log
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e22204613_db2`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_actualite_new`
--

CREATE TABLE `t_actualite_new` (
  `new_id` int(11) NOT NULL,
  `cpt_pseudo` varchar(20) NOT NULL,
  `new_titre` varchar(50) NOT NULL,
  `new_date` date NOT NULL,
  `new_text` varchar(300) DEFAULT NULL,
  `new_etat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_actualite_new`
--

INSERT INTO `t_actualite_new` (`new_id`, `cpt_pseudo`, `new_titre`, `new_date`, `new_text`, `new_etat`) VALUES
(1, 'Youssef123', 'Amélioration du réseau de tramway', '2025-03-16', 'Le réseau de tramway de la ville sera élargi avec de nouvelles lignes pour mieux desservir les quartiers périphériques.', 'V'),
(2, 'Amine456', 'Modification des horaires de bus', '2025-03-15', 'Les horaires des bus de la ligne 12 seront modifiés à partir du 20 mars pour une meilleure desserte en heures de pointe.', 'V'),
(3, 'Sara789', 'Lancement de la ligne de tramway 5', '2025-03-14', 'La nouvelle ligne de tramway 5 ouvre ce lundi. Elle reliera le centre-ville à la zone industrielle en 15 minutes.', 'V'),
(4, 'Khalil001', 'Accès gratuit au tram le week-end', '2025-03-13', 'Tous les trajets en tramway seront gratuits pendant les week-ends de mars pour encourager l’utilisation des transports en commun.', 'V'),
(5, 'Fatma234', 'Amélioration de la fréquence des bus', '2025-03-12', 'Les bus de la ligne 7 verront leur fréquence augmenter, notamment pendant les heures de pointe du matin et du soir.', 'V'),
(6, 'Ali678', 'Réduction des prix des tickets de tram', '2025-03-11', 'Les prix des tickets de tramway seront réduits de 10 % à partir du mois d’avril pour rendre les transports plus accessibles.', 'V'),
(7, 'Mouna555', 'Nouveaux arrêts de tram', '2025-03-10', 'Trois nouveaux arrêts de tramway seront ajoutés dans le quartier nord de la ville pour améliorer l’accessibilité des habitants.', 'V'),
(8, 'Youssef123', 'Système de bus électriques', '2025-03-09', 'La ville met en place un système de bus électriques pour réduire l’empreinte carbone des transports publics.', 'V'),
(9, 'Omar999', 'Retards sur la ligne de tramway 3', '2025-03-08', 'Des travaux sur la ligne de tramway 3 entraînent des retards importants. Des alternatives en bus sont mises en place.', 'V'),
(10, 'Nadia777', 'Augmentation du nombre de bus en soirée', '2025-03-07', 'Le nombre de bus circulant en soirée sera doublé pour offrir plus de choix aux passagers.', 'V'),
(11, 'youssef123', 'Transport en commun gratuit pour les étudiants', '2025-03-06', 'Les étudiants bénéficieront d’un transport en commun gratuit à partir du mois de mai pour favoriser l’utilisation des transports publics.', 'V'),
(12, 'Fatma234', 'Prolongation de la ligne de tramway 4', '2025-03-05', 'La ligne de tramway 4 sera prolongée jusqu’au parc technologique à partir du 1er avril, réduisant ainsi les temps de trajet pour les habitants du sud.', 'V'),
(13, 'Sara789', 'Lancement de l’application mobile ', '2025-03-04', 'Une nouvelle application mobile permet de suivre les bus en temps réel, avec des alertes en cas de retard ou de perturbation sur les lignes.', 'V'),
(14, 'Omar999', 'fermeture de la station de tramway liberté', '2025-03-03', 'La station de tramway République sera fermée pendant deux semaines pour des travaux de rénovation, avec un service de bus de remplacement.', 'V'),
(15, 'Nadia777', 'Renouvellement de la flotte de tramways', '2025-03-02', 'La ville procède au renouvellement de sa flotte de tramways. De nouveaux véhicules plus écologiques entreront en service à partir de fin mars.', 'V');

-- --------------------------------------------------------

--
-- Structure de la table `t_association_assc`
--

CREATE TABLE `t_association_assc` (
  `url_num` int(11) NOT NULL,
  `cat_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_association_assc`
--

INSERT INTO `t_association_assc` (`url_num`, `cat_num`) VALUES
(1, 1),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_cat`
--

CREATE TABLE `t_categorie_cat` (
  `cat_num` int(11) NOT NULL,
  `cat_statu` char(1) NOT NULL,
  `cat_date` date NOT NULL,
  `cat_intitule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_categorie_cat`
--

INSERT INTO `t_categorie_cat` (`cat_num`, `cat_statu`, `cat_date`, `cat_intitule`) VALUES
(1, 'A', '2025-02-01', 'TRAM'),
(2, 'A', '2025-02-02', 'BUS\r\n'),
(3, 'A', '2025-02-03', 'Recrutement'),
(4, 'A', '2025-02-04', 'Mises à jour'),
(5, 'A', '2025-04-21', 'Télepherique');

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(20) NOT NULL,
  `cpt_motdepass` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_motdepass`) VALUES
('abdelm1', '81dc9bdb52d04dc20036dbd8313ed055'),
('Ali678', '2f6c9bf911a707bd6368ae3cba799b8e'),
('Amine456', 'dcab7ef43ca522f6af7370bdaa510af2'),
('aziz123', '77f96d74d75182a5a4fa205443bbc7e0'),
('azizjaz', '25d98d5d4fe8b4a69525dfbaf2c9452f'),
('bousrih123', '5bfe0c405c67de32b1de9ea40d093666'),
('fatima', 'ab515fc8490c32d3077a01f329f2cf4a'),
('Fatma234', 'e8b6358b1538625c38504cdb72bd5da8'),
('foufa123', '262a4760512b4f3605e3137c790da0d8'),
('foufa1234', '262a4760512b4f3605e3137c790da0d8'),
('gestionnaire1', '5533962e2f5addc1885fcee922524a6f'),
('hamous', '632cd0863fe5cfb19eebb4f5c7a6067c'),
('hamza12', '7013ca1a10b4375f4ca2ddc0b74a651f'),
('hamza123', '8950259507cd8ce2a99f8b94674f2b77'),
('hamza1234', '28936322a5eb164c9ced5a0166f93f15'),
('hamza1235', '8950259507cd8ce2a99f8b94674f2b77'),
('Hichem321', 'a0814e9591b2f17302eb300326f2bc1e'),
('josef', '253ac76646ffffae0ad77df23dd7eac7'),
('ka123', '81ef9c35ace337d0a7dcd285ad514b44'),
('Khalil001', '1eb5aa69e3562327d773da3d032a06e5'),
('manou', 'efbcb8e88f2b06de17495dab473f056f'),
('Mouna555', 'be931076ab5271c87ca664ddae3d0a4a'),
('mv', '94d035945b3d82182669c4d3f6daa104'),
('Nadia777', '675eb85e0a03e2becea1eb53fe13c3b4'),
('noura123', '7efe9cc4a6d011044602027ba33dfdfb'),
('Omar999', '501c9826d32de6f34acd731a13c90bfc'),
('Sara789', 'baf1bff5df1ec45281a95ecaf3c1974d'),
('tux', '57192b58f8f6ae6f53423112b0c25927'),
('yassine123', '42478b0ad44efdb652e8b61efb8e84fe'),
('youssef', '253ac76646ffffae0ad77df23dd7eac7'),
('Youssef123', '31e81849cb4a84895c728462183b2c17'),
('youssefha', '80daaa9f8440b5bf98b10ccadf9f7c00'),
('youzou', '22fe90fb4fa3c84ed6568660473a8539'),
('zou123', '6d55e02f385f45605879fbeb1bb42fb9'),
('zou1234', '6d55e02f385f45605879fbeb1bb42fb9'),
('zou12345', '6d55e02f385f45605879fbeb1bb42fb9');

-- --------------------------------------------------------

--
-- Structure de la table `t_config_cfg`
--

CREATE TABLE `t_config_cfg` (
  `cfg_id` int(11) NOT NULL,
  `cfg_theme` varchar(80) NOT NULL,
  `cfg_date` date NOT NULL,
  `cfg_code` char(12) DEFAULT NULL,
  `cfg_devName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_config_cfg`
--

INSERT INTO `t_config_cfg` (`cfg_id`, `cfg_theme`, `cfg_date`, `cfg_code`, `cfg_devName`) VALUES
(2, 'BIBUS BREST', '2025-02-02', 'XYZ456123ABC', 'Youssef Chemangui');

-- --------------------------------------------------------

--
-- Structure de la table `t_information_inf`
--

CREATE TABLE `t_information_inf` (
  `inf_num` int(11) NOT NULL,
  `cpt_pseudo` varchar(20) NOT NULL,
  `cat_num` int(11) NOT NULL,
  `inf_text` varchar(300) NOT NULL,
  `inf_date` date NOT NULL,
  `inf_fichierImage` varchar(300) DEFAULT NULL,
  `inf_etat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_information_inf`
--

INSERT INTO `t_information_inf` (`inf_num`, `cpt_pseudo`, `cat_num`, `inf_text`, `inf_date`, `inf_fichierImage`, `inf_etat`) VALUES
(4, 'Khalil001', 4, 'Mise à jour des règles de sécurité.', '2025-02-04', 'security_update.png', 'V'),
(7, 'Hichem321', 3, 'Recrutement de conducteurs de bus', '2025-02-10', NULL, 'B'),
(9, 'gestionnaire1', 2, '7  lignes desservant les zones d&#039;activités (Aéroport Brest-Bretagne, base navale, serres etc.),', '2025-04-22', 'NULL', 'V'),
(10, 'gestionnaire1', 2, '3 lignes secondaires desservant Brest (remplacement du tramway, Noctybus, ligne bleue),', '2025-04-22', 'NULL', 'V'),
(11, 'gestionnaire1', 2, '20 lignes scolaires desservant les établissements des communes de Brest métropole,', '2025-04-22', 'NULL', 'V'),
(12, 'josef', 1, 'La ligne A du tramway circule :  de 5h00 à 23h30 du lundi au samedi,', '2025-04-22', 'NULL', 'V'),
(13, 'josef', 4, 'Des lignes de transport à la demande', '2025-04-22', 'NULL', 'V'),
(14, 'josef', 4, 'le service VéloZef est désormais entièrement renouvelé et repensé.', '2025-04-22', 'NULL', 'V'),
(15, 'josef', 3, 'Responsable études et méthodes (H/F)', '2025-04-22', 'NULL', 'V'),
(16, 'josef', 3, 'nous sommes besoin d&#039;un chauffeur', '2025-04-22', 'NULL', 'V'),
(17, 'josef', 2, '10 lignes desservant les communes de Brest métropole,', '2025-04-22', 'NULL', 'V'),
(18, 'josef', 2, '7 lignes en transport à la demande (TAD).', '2025-04-22', 'NULL', 'V'),
(19, 'josef', 1, 'La ligne A du tramway circule :   de 7h30 à 23h30 le dimanche.', '2025-04-22', 'NULL', 'V'),
(20, 'josef', 1, 'Au départ du terminus Porte de Plouzané, elle dessert les quartiers de Fort Montbarey, Kerourien, Vali Hir, Queliverzan, Recouvrance, Centre-ville, Pilier Rouge, Pontanezen et Europe.', '2025-04-22', 'NULL', 'V'),
(21, 'josef', 3, 'nous sommes besoin d&#039;un controleur ', '2025-04-22', 'NULL', 'V'),
(22, 'josef', 3, 'offre pour un chauffeur de nuit', '2025-04-22', 'NULL', 'V'),
(23, 'josef', 4, 'Le réseau Bibus met des parkings relais et vélos à votre service', '2025-04-22', 'NULL', 'V'),
(24, 'josef', 4, 'Accès gratuit (sur présentation d’un titre de transport, voir modalité d’accès ci-dessous).', '2025-04-22', 'NULL', 'V');

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `cpt_pseudo` varchar(20) NOT NULL,
  `pfl_nom` varchar(80) NOT NULL,
  `pfl_prenom` varchar(80) NOT NULL,
  `pfl_email` varchar(80) NOT NULL,
  `pfl_role` char(1) NOT NULL,
  `pfl_validite` char(1) NOT NULL,
  `pfl_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`cpt_pseudo`, `pfl_nom`, `pfl_prenom`, `pfl_email`, `pfl_role`, `pfl_validite`, `pfl_date`) VALUES
('gestionnaire1', 'Youssef', 'Chemangui', 'jozefchmengui@gmail.com', 'G', 'D', '2024-02-07'),
('hamza1234', 'mrabet', 'hamza ', 'hamzamrabet@gmail.com', 'R', 'A', '2025-04-17'),
('Hichem321', 'Dridi', 'Hichem', 'hichem@email.com', 'R', 'D', '2025-01-29'),
('josef', 'Chemangui', 'Youssef', 'jozefchmengui@gmail.com', 'G', 'A', '2025-04-20'),
('ka123', 'razgallah', 'karim', 'karim@gmail.com', 'R', 'D', '2025-03-27'),
('Khalil001', 'Haddad', 'Khalil', 'khalil@email.com', 'R', 'A', '2025-02-04'),
('manou', 'Amorri', 'Manar', 'manaramorri@gmail.com', 'R', 'A', '2025-03-26'),
('Mouna555', 'Zouari', 'Mouna', 'mouna@email.com', 'R', 'A', '2025-01-30'),
('Nadia777', 'Gharbi', 'Nadia', 'nadia@email.com', 'R', 'A', '2025-02-03'),
('noura123', 'chemangui', 'nourreddine', 'nourchemangui@gmail.com', 'R', 'A', '2025-03-25'),
('Sara789', 'Mejri', 'Sara', 'sara@email.com', 'R', 'A', '2025-02-05'),
('yassine123', 'amorri', 'yassine', 'yassine@gmail.com', 'R', 'A', '2025-03-26'),
('youssef', 'Chemangui', 'Youssef', 'jozefchmengui@gmail.com', 'R', 'A', '2025-03-31'),
('youssefha', 'hannachi', 'youssef', 'youssefhannachi@gmail.com', 'G', 'A', '2025-04-22'),
('youzou', 'o&#039;conel', 'youzou', 'youzou@gmail.com', 'R', 'A', '2025-03-27');

-- --------------------------------------------------------

--
-- Structure de la table `t_url_url`
--

CREATE TABLE `t_url_url` (
  `url_num` int(11) NOT NULL,
  `url_nom` varchar(100) NOT NULL,
  `url_chaine` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_url_url`
--

INSERT INTO `t_url_url` (`url_num`, `url_nom`, `url_chaine`) VALUES
(1, 'Site officiel', 'https://www.exemple.com'),
(2, 'Forum', 'https://forum.exemple.com'),
(3, 'Documentation', 'https://docs.exemple.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_actualite_new`
--
ALTER TABLE `t_actualite_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `cpt_pseudo` (`cpt_pseudo`);

--
-- Index pour la table `t_association_assc`
--
ALTER TABLE `t_association_assc`
  ADD PRIMARY KEY (`url_num`,`cat_num`),
  ADD KEY `cat_num` (`cat_num`);

--
-- Index pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD PRIMARY KEY (`cat_num`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_config_cfg`
--
ALTER TABLE `t_config_cfg`
  ADD PRIMARY KEY (`cfg_id`);

--
-- Index pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  ADD PRIMARY KEY (`inf_num`),
  ADD KEY `cpt_pseudo` (`cpt_pseudo`),
  ADD KEY `cat_num` (`cat_num`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_url_url`
--
ALTER TABLE `t_url_url`
  ADD PRIMARY KEY (`url_num`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_actualite_new`
--
ALTER TABLE `t_actualite_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  MODIFY `cat_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_config_cfg`
--
ALTER TABLE `t_config_cfg`
  MODIFY `cfg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  MODIFY `inf_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `t_url_url`
--
ALTER TABLE `t_url_url`
  MODIFY `url_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_actualite_new`
--
ALTER TABLE `t_actualite_new`
  ADD CONSTRAINT `t_actualite_new_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_association_assc`
--
ALTER TABLE `t_association_assc`
  ADD CONSTRAINT `t_association_assc_ibfk_1` FOREIGN KEY (`url_num`) REFERENCES `t_url_url` (`url_num`),
  ADD CONSTRAINT `t_association_assc_ibfk_2` FOREIGN KEY (`cat_num`) REFERENCES `t_categorie_cat` (`cat_num`);

--
-- Contraintes pour la table `t_information_inf`
--
ALTER TABLE `t_information_inf`
  ADD CONSTRAINT `t_information_inf_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`),
  ADD CONSTRAINT `t_information_inf_ibfk_2` FOREIGN KEY (`cat_num`) REFERENCES `t_categorie_cat` (`cat_num`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `t_profil_pfl_ibfk_1` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
