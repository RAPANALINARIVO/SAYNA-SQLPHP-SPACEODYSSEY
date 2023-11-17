-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 nov. 2023 à 11:46
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spaces_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `astronautes`
--

CREATE TABLE `astronautes` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `astronautes`
--

INSERT INTO `astronautes` (`id`, `nom`, `prenom`, `etat`) VALUES
(1, 'nicolas', 'olivier', 'bonne sante'),
(2, 'john', 'brain', 'mauvaise'),
(4, ' RAPANALINARIVO', 'OLIVIER NICOLAS', 'GOOD'),
(5, 'willy', 'jh', 'malade');

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `nomMission` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `dateDepart` datetime NOT NULL,
  `dateArrive` datetime NOT NULL,
  `id_plannete` int(11) NOT NULL,
  `id_vaisseau` int(11) NOT NULL,
  `id_astronaute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`id`, `nomMission`, `status`, `dateDepart`, `dateArrive`, `id_plannete`, `id_vaisseau`, `id_astronaute`) VALUES
(1, 'analyser mars', 'en cours', '2023-11-12 20:08:10', '2023-11-12 20:08:10', 1, 1, 2),
(2, 'visiter mars', 'en cours', '2023-11-12 20:08:10', '2023-11-12 20:08:10', 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `planetes`
--

CREATE TABLE `planetes` (
  `id` int(11) NOT NULL,
  `nomPlanete` varchar(250) NOT NULL,
  `distanceTerre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planetes`
--

INSERT INTO `planetes` (`id`, `nomPlanete`, `distanceTerre`) VALUES
(1, 'Mars', '450km'),
(3, 'mercure', '450km'),
(4, 'neptune', '1000km');

-- --------------------------------------------------------

--
-- Structure de la table `vaisseaux`
--

CREATE TABLE `vaisseaux` (
  `id` int(11) NOT NULL,
  `nomVesseau` varchar(250) NOT NULL,
  `capacite` varchar(250) NOT NULL,
  `anneFabrication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vaisseaux`
--

INSERT INTO `vaisseaux` (`id`, `nomVesseau`, `capacite`, `anneFabrication`) VALUES
(1, 'vaisseau1', '100', '2023-11-12'),
(2, 'vaisseau2', '50', '2023-11-12'),
(3, 'vaisseau3', '70', '2023-11-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `astronautes`
--
ALTER TABLE `astronautes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vaisseau` (`id_vaisseau`),
  ADD KEY `missions_ibfk_1` (`id_plannete`),
  ADD KEY `id_astronaute` (`id_astronaute`);

--
-- Index pour la table `planetes`
--
ALTER TABLE `planetes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaisseaux`
--
ALTER TABLE `vaisseaux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `astronautes`
--
ALTER TABLE `astronautes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `planetes`
--
ALTER TABLE `planetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vaisseaux`
--
ALTER TABLE `vaisseaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_ibfk_1` FOREIGN KEY (`id_plannete`) REFERENCES `planetes` (`id`),
  ADD CONSTRAINT `missions_ibfk_2` FOREIGN KEY (`id_vaisseau`) REFERENCES `vaisseaux` (`id`),
  ADD CONSTRAINT `missions_ibfk_3` FOREIGN KEY (`id_astronaute`) REFERENCES `astronautes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
