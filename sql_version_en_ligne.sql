-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 19 oct. 2021 à 22:26
-- Version du serveur : 10.3.25-MariaDB-0+deb10u1
-- Version de PHP : 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fatab195806_9ectvj`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `date_creation` date NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `mail`, `date_creation`, `mot_de_passe`) VALUES
(1, 'Macip', 'Fabien', 'fabien.macip@gmail.com', '2021-09-19', '$2y$10$Y6aXByINTa8ApOoWmUpGMOw2B6IW/ikcji4Beyux4pWFdGmqz3U8u'),
(2, 'Tyson', 'Luciles', 'lulutyson@free.fr', '2020-12-25', '$2y$10$gc1pEo7XRhJ/mlR8U5IPUu.e9y2iuPZ0vy4JWuuTHUpXlAcpOQYea'),
(3, 'Martinez', 'Olive', 'olive@popo.fr', '2021-09-23', '$2y$10$K0vByWj7wCw/.G3RX7jWFOoyyfS8rt4eGBv60Vvrwny4/vpvPNswi'),
(4, 'Durand', 'Fabrice', 'coucou@gmail.fr', '2021-09-23', '$2y$10$a79aBP2yH0zMgfOfk2atw.HWMMYy5w1pcaFJ6hjUtAxtCdG5SaWXy'),
(7, 'Toussaint', 'Bruce', 'moi@lui.fr', '2021-09-23', '$2y$10$Z9iMhawYGKv9XxVE/8uLU.1E6WGprZbmn5hAYd0p3B6Jc4vegE.b.'),
(9, 'Marchal', 'Déborah', 'dhmarchal@gmail.com', '2021-10-14', '$2y$10$sU9Cyvgyde4MYMcOy1HbWustlUrWhDlVxA/pfqi1WYqpsC7fcuKa2');

-- --------------------------------------------------------

--
-- Structure de la table `agent_specialite`
--

CREATE TABLE `agent_specialite` (
  `id_agent` int(11) NOT NULL,
  `id_specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agent_specialite`
--

INSERT INTO `agent_specialite` (`id_agent`, `id_specialite`) VALUES
(3, 5),
(3, 2),
(3, 4),
(14, 1),
(14, 1),
(14, 6),
(66, 10),
(49, 7),
(49, 1),
(49, 4),
(65, 7),
(65, 3),
(65, 1),
(8, 3),
(8, 8),
(8, 1),
(50, 7),
(50, 8),
(50, 1),
(50, 4),
(57, 10),
(57, 8),
(57, 6),
(15, 3),
(15, 2),
(15, 12),
(15, 4),
(2, 7),
(2, 3),
(2, 8),
(2, 2),
(2, 12),
(2, 5),
(4, 3),
(4, 8),
(4, 12),
(4, 1),
(4, 5),
(58, 10),
(58, 7),
(58, 3),
(58, 8),
(58, 2),
(58, 13),
(58, 5),
(1, 8),
(1, 2),
(1, 13),
(7, 10),
(7, 7),
(7, 6),
(7, 1),
(7, 4),
(7, 5),
(52, 7),
(52, 3),
(52, 8),
(52, 2),
(52, 12),
(52, 6),
(52, 1),
(52, 5),
(71, 3),
(71, 2),
(71, 12),
(71, 5),
(67, 10),
(67, 3),
(67, 12),
(67, 13),
(67, 6),
(73, 7),
(73, 3),
(73, 8),
(73, 13),
(73, 1),
(73, 5),
(72, 10),
(72, 12),
(72, 6);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `nom_de_code` varchar(40) NOT NULL,
  `pays` int(11) NOT NULL,
  `specialite` int(11) NOT NULL,
  `type_de_mission` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` enum('preparation','cours','terminee','echec') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id`, `titre`, `description`, `nom_de_code`, `pays`, `specialite`, `type_de_mission`, `date_debut`, `date_fin`, `statut`) VALUES
(1, 'Vol de clés', 'Dérober le double des clés du coffre du KGB, auprès de l ambassadeur de Russie, basé à Bruxelles.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt ipsum nisl, pulvinar molestie ante imperdiet ut. Fusce ut ex dui. Vestibulum ut orci tellus. Etiam neque dui, scelerisque sed odio ac, sodales pellentesque erat. Aenean semper pulvinar nulla ac aliquam. In a lacinia magna. Vivamus non lorem sit amet nisi euismod tincidunt eget in nisi.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus bibendum dictum lorem et iaculis. In ornare nisi ornare, sollicitudin massa sit amet, consequat eros. Nam id libero ac purus gravida sagittis ut vitae urna. Cras euismod mauris et aliquet', 'frite codée', 1, 7, 6, '2021-10-03', '2021-10-15', 'preparation'),
(2, 'La place du roi', 'Infiltrer le palais royal et se faire passer pour le roi afin de donner des ordres militaires.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt ipsum nisl, pulvinar molestie ante imperdiet ut. Fusce ut ex dui. Vestibulum ut orci tellus. Etiam neque dui, scelerisque sed odio ac, sodales pellentesque erat. Aenean semper pulvinar nulla ac aliquam. In a lacinia magna. Vivamus non lorem sit amet nisi euismod tincidunt eget in nisi.', 'Joyaux ok', 1, 5, 11, '2021-10-23', '2022-02-10', 'terminee'),
(5, 'Frontière Espagne', 'Traverser les Pyrénées.\r\nEn une nuit.\r\nSans rencontrer l\'ours.', 'pyrénées 3000', 2, 2, 6, '2022-02-05', '2022-03-15', 'terminee'),
(6, 'Mission avec planque', 'Test d\'une mission avec planque,\r\npour voir si ça s\'enregistre bien...', 'plank', 1, 10, 1, '2021-09-30', '2021-09-30', 'terminee'),
(7, 'Echec-et-mat', 'Gagner le champion mondial d\'échecs en se faisant passer pour un jeune joueur.\r\nLa mission se déroule en Russie, sous fausse identité.', 'fou218', 31, 5, 8, '2021-11-12', '0000-00-00', 'preparation'),
(9, 'Finir le studio derrière la maison', 'Plein de trucs...', 'studio34320', 1, 5, 6, '2021-10-01', '2021-11-27', 'cours');

-- --------------------------------------------------------

--
-- Structure de la table `mission_personne`
--

CREATE TABLE `mission_personne` (
  `id_mission` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mission_personne`
--

INSERT INTO `mission_personne` (`id_mission`, `id_personne`) VALUES
(1, 5),
(2, 2),
(2, 4),
(2, 6),
(6, 67),
(6, 8),
(6, 57),
(6, 14),
(6, 6),
(5, 46),
(5, 43),
(1, 25),
(1, 43),
(2, 11),
(6, 25),
(6, 9),
(6, 5),
(6, 20),
(6, 10),
(5, 47),
(5, 47),
(5, 47),
(5, 25),
(5, 17),
(5, 52),
(5, 66),
(5, 67),
(5, 7),
(5, 35),
(5, 48),
(1, 34),
(1, 2),
(1, 1),
(1, 7),
(2, 49),
(6, 11),
(2, 17),
(2, 20),
(2, 20),
(7, 49),
(7, 8),
(7, 70),
(7, 69),
(5, 69),
(7, 1),
(7, 4),
(9, 25),
(9, 3),
(9, 58),
(9, 66),
(9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `mission_planque`
--

CREATE TABLE `mission_planque` (
  `id_mission` int(11) NOT NULL,
  `id_planque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mission_planque`
--

INSERT INTO `mission_planque` (`id_mission`, `id_planque`) VALUES
(2, 1),
(2, 3),
(6, 3),
(6, 4),
(1, 1),
(1, 37),
(2, 37),
(2, 37),
(5, 16),
(7, 39),
(5, 15),
(9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'France'),
(2, 'Espagne'),
(3, 'Belgique'),
(4, 'Suisse'),
(27, 'Algérie'),
(28, 'Bénin'),
(29, 'Canada'),
(30, 'Ethiopie'),
(31, 'Russie'),
(32, 'Japon'),
(36, 'Royaume-Uni'),
(37, 'R.D. Congo'),
(38, 'Andorre'),
(39, 'Nicaragua'),
(44, 'Egypte');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `secret_code` varchar(20) NOT NULL,
  `nationalite` int(11) NOT NULL,
  `type` enum('agent','cible','contact') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `dob`, `secret_code`, `nationalite`, `type`) VALUES
(1, 'Dupont', 'Jean', '1998-03-10', 'dd007', 1, 'agent'),
(2, 'Richardson', 'Mike', '1980-05-25', 'ricardo', 1, 'agent'),
(3, 'Gomez', 'Lucien', '1970-05-30', 'bout de gomme', 1, 'cible'),
(4, 'Rodrigues', 'Ginette', '2000-06-25', 'Rodgi421', 2, 'agent'),
(5, 'Martinez', 'Julios', '1985-09-20', 'juma', 1, 'contact'),
(6, 'Borg', 'Bjon', '1978-06-01', 'bibi', 1, 'contact'),
(7, 'Murray', 'Dave', '1965-07-30', 'davy', 1, 'agent'),
(8, 'Dupontel', 'Henri III', '2010-01-19', 'riri3434', 1, 'agent'),
(9, 'Marcelin', 'Albert', '1980-03-03', 'Bébert', 38, 'contact'),
(10, 'Durantou', 'Lionel', '1998-10-11', 'lio', 36, 'contact'),
(11, 'Fifi', 'Brindacier', '2020-10-10', 'fifi3300', 38, 'cible'),
(14, 'Macip', 'Fabius', '1977-05-06', 'fatabien', 1, 'agent'),
(15, 'Ramirou', 'Lucien', '1987-05-05', 'ramzy', 1, 'agent'),
(17, 'Lozano', 'Juliette', '2000-02-20', 'Juju-lo', 36, 'cible'),
(20, 'Hernandez', 'Patrick', '1981-03-06', 'pat', 38, 'cible'),
(22, 'MARTY', 'Olive', '1988-01-01', 'TOTO', 36, 'contact'),
(25, 'Donado', 'Eric', '1985-12-15', 'Petit papillon', 2, 'cible'),
(26, 'Sanchez', 'Philippe', '1978-07-12', 'paella', 1, 'cible'),
(34, 'Ziman', 'Mohamed', '1956-03-01', 'momoAlger', 1, 'contact'),
(35, 'GOMEZ', 'Bertrand', '1989-12-15', 'gogo', 2, 'contact'),
(37, 'Ricard', 'Pierre', '1956-10-30', '51', 1, 'cible'),
(43, 'Heriot', 'Jean-Luc', '1999-01-01', 'HJL', 2, 'cible'),
(46, 'Mac-Brain', 'juju', '1977-06-06', 'juju444', 36, 'cible'),
(47, 'Marin', 'Hugues', '1997-06-06', 'spicy-63', 2, 'contact'),
(48, 'Testud', 'Tanguy', '1991-01-01', 'squatteur-221', 2, 'cible'),
(49, 'Arawak', 'Yakari', '1977-01-01', 'Yaka', 1, 'agent'),
(50, 'Berk', 'Oui', '1977-01-01', 'qsdmflkj', 38, 'agent'),
(52, 'Roustit', 'Ange', '1977-01-01', 'renardeau', 38, 'agent'),
(57, 'Lapraline', 'Gérard', '1973-04-16', 'gégé-21', 36, 'agent'),
(58, 'Harris', 'Janick', '1977-01-01', 'spe4', 36, 'agent'),
(65, 'GOMES', 'Pedro', '1977-01-01', 'pedritto', 2, 'agent'),
(66, 'Abi', 'Jaob', '1977-01-01', 'ABI', 38, 'agent'),
(67, 'Marty', 'Lucien', '1943-01-01', 'yes', 1, 'agent'),
(68, 'Gimenez', 'Françoise', '1973-07-24', 'Scarabée', 38, 'contact'),
(69, 'Gasparuf', 'Ivanoff', '1965-12-01', 'roi200', 31, 'cible'),
(70, 'Krouchtchev', 'Luciano', '1963-01-06', 'la-taupe', 31, 'contact'),
(71, 'Gorbatchouv', 'Lilian', '1978-12-15', 'rouble2000', 31, 'agent'),
(72, 'Hoarau', 'Leelou', '2002-11-12', 'lilitiktok', 1, 'agent'),
(73, 'Marchal', 'Déborah', '1977-10-10', 'lavieestbelle', 1, 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `planque`
--

CREATE TABLE `planque` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planque`
--

INSERT INTO `planque` (`id`, `code`, `adresse`, `ville`, `pays`, `type`) VALUES
(1, 'Cygogne38', '3 rue des charmes', 'Paris', 1, 5),
(2, 'cinéma101', '49 avenue des chocolats', 'Bruxelles', 3, 1),
(3, 'La-cabane-bleue', 'gps N.15.43.34 O.30.34.55', 'FearCity', 1, 1),
(4, 'grotte421', '34, avenue de Castres', 'St-Pons-de-Thomières', 1, 1),
(7, 'kgb38', '54 avenue des marguerites', 'Paris', 4, 4),
(15, 'Pont-levis', '13, calle de las Ramblas', 'Barcelone', 2, 7),
(16, 'Pont-31', 'Rue de France', 'Le Caïre', 2, 3),
(30, 'toutou341', 'Rue des chiens', 'Toulouse', 30, 3),
(33, 'pizza-38', '21, jump Street', 'Londres', 36, 3),
(34, 'paella-55', '89, calle del turon', 'Andorre-la-vieille', 38, 3),
(35, 'chips', '54, avenida del viento', 'Andorra-nueva', 38, 3),
(36, 'pudding-308', '15, crimson road', 'Oxford', 36, 3),
(37, 'Cachette-bleue', '75, rue des violettes', 'Nissan-les-Ensérunes', 1, 6),
(39, 'igloo21', '815 avenue des rois', 'Moscou', 31, 6);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `intitule`) VALUES
(1, 'snipper'),
(2, 'filatures'),
(3, 'empoisonnement'),
(4, 'traçage numérique'),
(5, 'transformisme'),
(6, 'Plongeur sous-marin'),
(7, 'Démineur'),
(8, 'Escalade'),
(10, 'Course à pied'),
(12, 'Pilote de ligne'),
(13, 'Pilote hélicoptère');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_mission`
--

CREATE TABLE `type_de_mission` (
  `id` int(11) NOT NULL,
  `intitule` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_de_mission`
--

INSERT INTO `type_de_mission` (`id`, `intitule`) VALUES
(1, 'Assassinat'),
(2, 'Vol'),
(3, 'Rapt'),
(4, 'Copie numérique'),
(5, 'Surveillance'),
(6, 'Infiltrations'),
(7, 'Copie numérique'),
(8, 'Usurpation identité'),
(10, 'Plongée en apnée'),
(11, 'Plongée bouteilles'),
(12, 'Traque en hélicoptère');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_planque`
--

CREATE TABLE `type_de_planque` (
  `id` int(11) NOT NULL,
  `intitule` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_de_planque`
--

INSERT INTO `type_de_planque` (`id`, `intitule`) VALUES
(1, 'hôtel'),
(2, 'appartement'),
(3, 'maison'),
(4, 'camionnette'),
(5, 'voiturette'),
(6, 'commerce'),
(7, 'cabane');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent_specialite`
--
ALTER TABLE `agent_specialite`
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `id_specialite` (`id_specialite`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays` (`pays`),
  ADD KEY `specialite` (`specialite`),
  ADD KEY `type_de_mission` (`type_de_mission`);

--
-- Index pour la table `mission_personne`
--
ALTER TABLE `mission_personne`
  ADD KEY `id_mission` (`id_mission`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `mission_planque`
--
ALTER TABLE `mission_planque`
  ADD KEY `id_mission` (`id_mission`),
  ADD KEY `id_planque` (`id_planque`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nationalite` (`nationalite`);

--
-- Index pour la table `planque`
--
ALTER TABLE `planque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays` (`pays`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_de_mission`
--
ALTER TABLE `type_de_mission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_de_planque`
--
ALTER TABLE `type_de_planque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `planque`
--
ALTER TABLE `planque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type_de_mission`
--
ALTER TABLE `type_de_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `type_de_planque`
--
ALTER TABLE `type_de_planque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent_specialite`
--
ALTER TABLE `agent_specialite`
  ADD CONSTRAINT `agent_specialite_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `agent_specialite_ibfk_2` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id`);

--
-- Contraintes pour la table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`pays`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `mission_ibfk_2` FOREIGN KEY (`specialite`) REFERENCES `specialite` (`id`),
  ADD CONSTRAINT `mission_ibfk_3` FOREIGN KEY (`type_de_mission`) REFERENCES `type_de_mission` (`id`);

--
-- Contraintes pour la table `mission_personne`
--
ALTER TABLE `mission_personne`
  ADD CONSTRAINT `mission_personne_ibfk_1` FOREIGN KEY (`id_mission`) REFERENCES `mission` (`id`),
  ADD CONSTRAINT `mission_personne_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `mission_planque`
--
ALTER TABLE `mission_planque`
  ADD CONSTRAINT `mission_planque_ibfk_1` FOREIGN KEY (`id_mission`) REFERENCES `mission` (`id`),
  ADD CONSTRAINT `mission_planque_ibfk_2` FOREIGN KEY (`id_planque`) REFERENCES `planque` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`nationalite`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `planque`
--
ALTER TABLE `planque`
  ADD CONSTRAINT `planque_ibfk_1` FOREIGN KEY (`pays`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `planque_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type_de_planque` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
