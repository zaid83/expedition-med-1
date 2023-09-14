-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 sep. 2023 à 00:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `expedition-med`
--

-- --------------------------------------------------------

--
-- Structure de la table `prelevements`
--

CREATE TABLE `prelevements` (
  `Sample` varchar(20) DEFAULT NULL,
  `Campagne` int(11) DEFAULT NULL,
  `Sea` int(11) DEFAULT NULL,
  `Manta` varchar(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Trafic` decimal(5,2) DEFAULT NULL,
  `cote_la_plus_proche` decimal(6,2) DEFAULT NULL,
  `courant` decimal(4,2) DEFAULT NULL,
  `Start_Time_UTC` time DEFAULT NULL,
  `End_Time_UTC` time DEFAULT NULL,
  `Start_Latitude` varchar(12) DEFAULT NULL,
  `Start_Longitude` varchar(12) DEFAULT NULL,
  `Mid_Latitude` varchar(12) DEFAULT NULL,
  `Mid_Longitude` varchar(12) DEFAULT NULL,
  `End_Latitude` varchar(12) DEFAULT NULL,
  `End_Longitude` varchar(12) DEFAULT NULL,
  `Boat_Speed_kt` decimal(3,1) DEFAULT NULL,
  `Wind_Force_B` int(11) DEFAULT NULL,
  `Wind_Speed_kt` int(11) DEFAULT NULL,
  `Wind_Direction_deg` int(11) DEFAULT NULL,
  `Sea_State_B` int(11) DEFAULT NULL,
  `Temperature_C` decimal(6,3) DEFAULT NULL,
  `pH` decimal(5,2) DEFAULT NULL,
  `Oxygene_Dissous_mg_L` decimal(5,2) DEFAULT NULL,
  `Salinite_SAL_PSU` decimal(5,2) DEFAULT NULL,
  `Start_Flowmeter` int(11) DEFAULT NULL,
  `End_Flowmeter` int(11) DEFAULT NULL,
  `Volume_Filtered_m3` decimal(7,2) DEFAULT NULL,
  `Volume_Filtered_Corrected_m3` decimal(7,2) DEFAULT NULL,
  `km2` decimal(9,9) DEFAULT NULL,
  `Commentaires` text DEFAULT NULL,
  `Nombre_Particules_gt_1_mm` int(11) DEFAULT NULL,
  `Concentration_nb_km2` varchar(80) DEFAULT NULL,
  `Concentration_nb_m3` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prelevements`
--

INSERT INTO `prelevements` (`Sample`, `Campagne`, `Sea`, `Manta`, `Date`, `Trafic`, `cote_la_plus_proche`, `courant`, `Start_Time_UTC`, `End_Time_UTC`, `Start_Latitude`, `Start_Longitude`, `Mid_Latitude`, `Mid_Longitude`, `End_Latitude`, `End_Longitude`, `Boat_Speed_kt`, `Wind_Force_B`, `Wind_Speed_kt`, `Wind_Direction_deg`, `Sea_State_B`, `Temperature_C`, `pH`, `Oxygene_Dissous_mg_L`, `Salinite_SAL_PSU`, `Start_Flowmeter`, `End_Flowmeter`, `Volume_Filtered_m3`, `Volume_Filtered_Corrected_m3`, `km2`, `Commentaires`, `Nombre_Particules_gt_1_mm`, `Concentration_nb_km2`, `Concentration_nb_m3`) VALUES
('EM23-01', 1, 1, 'EM23-01', '2023-07-08', 2.00, 4.57, 0.07, '19:48:00', '20:08:00', '41°37.028\'N', '012°21.868\'E', '41°36.618\'N', '012°22.231\'E', '41°36.222\'N', '012°22.617\'E', 2.9, 1, 5, 150, 1, 28.055, 7.89, 2.06, 41.62, 79845, 86154, 378.54, 189.27, 0.001074160, 'à côte d\'une réserve naturelle avec amphore romaine. Dernière minute manta hors de l\'eau un peu ', 133, '123817.68079243', 0.70),
('EM23-02', 1, 1, 'EM23-02', '2023-07-09', 3.00, 1.56, 0.06, '17:30:00', '17:50:00', '40°55.531\'N', '12°53.248\'E', '40°55.187\'N', '012°53.706\'E', '40°54.820\'N', '012°54.174\'E', 2.9, 1, 3, 330, 1, 29.400, 8.07, 6.31, 42.20, 87631, 93527, 353.76, 176.88, 0.001074160, 'prélèvement entre deux îles (ponza et palmarola)', 154, '143367.84091755', 0.87),
('EM23-03', 1, 1, 'EM23-03', '2023-07-10', 4.00, 0.25, 0.07, '11:20:00', '11:40:00', '40°53.630\'N', '12°58.510\'E', '40°53.225\'N', '12°58.248\'E', '40°52.847\'N', '12°57.963\'E', 2.6, 0, 0, 0, 0, 28.660, 8.26, 4.89, 42.00, 94234, 100469, 374.10, 187.05, 0.000963040, 'proximité village. Bout sous aile manta. Proche des côtes. Trafic ++.', 147, '152641.63482306', 0.79),
('EM23-04', 1, 1, 'EM23-04', '2023-07-10', 2.00, 12.60, 0.04, '20:43:00', '21:03:00', '41°13.141\'N', '12°37.088\'E', '41°13.591\'N', '12°37.088\'E', '41°13.986\'N', '12°36.743\'E', 2.8, 2, 5, 310, 2, 27.870, 8.34, 5.58, 38.78, 100871, 106935, 363.84, 181.92, 0.001037120, 'loin des côtes, au large entre ponza et rome', 64, '61709.348966368', 0.35),
('EM23-05', 1, 1, 'EM23-05', '2023-07-11', 3.00, 4.29, 0.05, '18:01:00', '18:21:00', '41°43.078\'N', '12°09.245\'E', '41°42.855\'N', '12°08.689\'E', '41°42.642\'N', '12°08.119\'E', 2.8, 0, 0, 0, 0, 31.200, 8.21, 3.27, 0.00, 7486, 13328, 350.52, 175.26, 0.001037120, 'estuaire rome', 17, '16391.545819192', 0.10),
('EM23-06', 1, 2, 'EM23-06', '2023-07-12', 3.00, 2.54, 0.02, '18:08:00', '18:28:00', '41°14.581\'N', '009°05.573\'E', '41°14.368\'N', '009°04.991\'E', '41°14.150\'N', '009°04.390\'E', 2.9, 2, 0, 0, 2, 26.700, 8.34, 2.34, 42.23, 13853, 19428, 334.50, 167.25, 0.001074160, 'vent très fort', 2, '1861.9200119163', 0.01),
('EM23-07', 1, 3, 'EM23-07', '2023-07-13', 2.00, 0.77, NULL, '12:48:00', '13:48:00', '40°57.530\'N', '008°14.332\'E', '40°57.886\'N', '008°14.636\'E', '40°58.272\'N', '008°14.959\'E', 2.6, 2, 7, 70, 0, 26.628, 8.41, 2.62, 38.15, 19529, 25692, 369.78, 184.89, 0.002889120, 'Dans une baie, manta relevé environ 5sec après les 20min règlementaires', 97, '33574.237137952', 0.52),
('EM23-08', 1, 3, 'EM23-08', '2023-07-13', NULL, 0.46, NULL, '20:11:00', '20:31:00', '40°33.766\'N', '008°10.191\'E', '40°34.121\'N', '008°10.502\'E', '40°34.466\'N', '008°10.823\'E', 2.8, 3, 13, 330, 1, 26.380, 8.40, 2.46, 41.87, 26028, 32323, 377.70, 188.85, 0.001037120, NULL, 4, '3856.834310398', 0.02);

-- --------------------------------------------------------

--
-- Structure de la table `sea`
--

CREATE TABLE `sea` (
  `id_sea` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sea`
--

INSERT INTO `sea` (`id_sea`, `name`) VALUES
(1, 'Mer Tyrrhenienne'),
(2, 'Bouches de Bonifacio'),
(3, 'Mer de Sardaigne'),
(4, 'Mer Ligurienne');

-- --------------------------------------------------------

--
-- Structure de la table `tri`
--

CREATE TABLE `tri` (
  `id` int(11) NOT NULL,
  `Sample` varchar(7) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `Color` int(11) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tri`
--

INSERT INTO `tri` (`id`, `Sample`, `Size`, `Type`, `Color`, `Number`) VALUES
(1, 'EM23-02', 1, 1, 1, 1),
(2, 'EM23-02', 1, 1, 2, 5),
(3, 'EM23-02', 1, 1, 3, 4),
(4, 'EM23-02', 1, 1, 4, 35),
(5, 'EM23-02', 1, 1, 5, 2),
(6, 'EM23-02', 1, 1, 6, 30),
(7, 'EM23-02', 1, 2, 2, 1),
(8, 'EM23-02', 1, 2, 4, 4),
(9, 'EM23-02', 1, 2, 6, 11),
(10, 'EM23-02', 1, 3, 2, 1),
(11, 'EM23-02', 1, 3, 4, 1),
(12, 'EM23-02', 1, 3, 6, 1),
(13, 'EM23-02', 1, 5, 4, 5),
(14, 'EM23-02', 1, 4, 4, 2),
(15, 'EM23-02', 2, 1, 1, 2),
(16, 'EM23-02', 2, 1, 4, 2),
(17, 'EM23-02', 2, 1, 6, 3),
(18, 'EM23-02', 2, 2, 4, 3),
(19, 'EM23-02', 2, 2, 6, 5),
(20, 'EM23-02', 2, 3, 2, 4),
(21, 'EM23-02', 2, 3, 3, 2),
(22, 'EM23-02', 2, 5, 4, 1),
(23, 'EM23-02', 2, 4, 8, 1),
(24, 'EM23-02', 2, 4, 6, 1),
(25, 'EM23-02', 3, 1, 1, 4),
(26, 'EM23-02', 3, 1, 4, 2),
(27, 'EM23-02', 3, 1, 6, 2),
(28, 'EM23-02', 3, 2, 4, 8),
(29, 'EM23-02', 3, 2, 6, 1),
(30, 'EM23-02', 3, 3, 1, 4),
(31, 'EM23-02', 3, 3, 3, 2),
(32, 'EM23-02', 3, 3, 4, 1),
(33, 'EM23-02', 3, 3, 5, 2),
(34, 'EM23-02', 3, 4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tri_color`
--

CREATE TABLE `tri_color` (
  `id_color` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tri_color`
--

INSERT INTO `tri_color` (`id_color`, `name`) VALUES
(1, 'Black'),
(2, 'Blue'),
(3, 'Green'),
(4, 'White'),
(5, 'Orange'),
(6, 'Transparent'),
(7, 'Green'),
(8, 'Yellow'),
(9, 'Multicolor'),
(10, 'Brown'),
(11, 'Pink');

-- --------------------------------------------------------

--
-- Structure de la table `tri_size`
--

CREATE TABLE `tri_size` (
  `id_size` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tri_size`
--

INSERT INTO `tri_size` (`id_size`, `name`) VALUES
(1, '1 - 2.5'),
(2, '2.5 - 5'),
(3, '> 5');

-- --------------------------------------------------------

--
-- Structure de la table `tri_type`
--

CREATE TABLE `tri_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tri_type`
--

INSERT INTO `tri_type` (`id_type`, `name`) VALUES
(1, 'Fragment'),
(2, 'Film'),
(3, 'Line'),
(4, 'Pellet'),
(5, 'ESP');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'user@user.fr', '$2y$10$.I0fVtvzUd6LpfzzFFBMBO52HmJIbUtBcZPZDcnNzyJM.wn/4dHTq'),
(3, 'jo@gmail.com', 'jo'),
(5, 'ra@gmail.com', '$2y$10$Tr75fupZMf0XNxo6JaOQf.ngzmj6ChQsy.e9bYqMDOAHvOBAOslBe'),
(6, 'jojo@jojo.fr', '$2y$10$6lUC34czNdDB4RlbtY70KeiBzub9NQl5wPqnEPFgN2D/z2ySqXfTW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `prelevements`
--
ALTER TABLE `prelevements`
  ADD KEY `Sea` (`Sea`);

--
-- Index pour la table `sea`
--
ALTER TABLE `sea`
  ADD PRIMARY KEY (`id_sea`);

--
-- Index pour la table `tri`
--
ALTER TABLE `tri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tri_prelevement` (`Sample`),
  ADD KEY `Type` (`Type`),
  ADD KEY `Size` (`Size`,`Color`),
  ADD KEY `fk_tri_color` (`Color`);

--
-- Index pour la table `tri_color`
--
ALTER TABLE `tri_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Index pour la table `tri_size`
--
ALTER TABLE `tri_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Index pour la table `tri_type`
--
ALTER TABLE `tri_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sea`
--
ALTER TABLE `sea`
  MODIFY `id_sea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tri`
--
ALTER TABLE `tri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `tri_color`
--
ALTER TABLE `tri_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tri_size`
--
ALTER TABLE `tri_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tri_type`
--
ALTER TABLE `tri_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prelevements`
--
ALTER TABLE `prelevements`
  ADD CONSTRAINT `fk_sea` FOREIGN KEY (`Sea`) REFERENCES `sea` (`id_sea`);

--
-- Contraintes pour la table `tri`
--
ALTER TABLE `tri`
  ADD CONSTRAINT `fk_tri_color` FOREIGN KEY (`Color`) REFERENCES `tri_color` (`id_color`),
  ADD CONSTRAINT `fk_tri_size` FOREIGN KEY (`Size`) REFERENCES `tri_size` (`id_size`),
  ADD CONSTRAINT `fk_tri_type` FOREIGN KEY (`Type`) REFERENCES `tri_type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
