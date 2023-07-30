-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 11 sep. 2022 à 12:29
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `laboratory`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) COLLATE latin2_bin DEFAULT NULL,
  `pwd` text COLLATE latin2_bin,
  `session` text COLLATE latin2_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `pwd`, `session`) VALUES
(1, 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 'cd86f8bd2ff90b59768242d3154b1cc1');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin2_bin DEFAULT NULL,
  `specification` text COLLATE latin2_bin,
  `image` text COLLATE latin2_bin,
  `idAdmin` int(11) DEFAULT NULL,
  `idStructure` int(11) DEFAULT NULL,
  `dateEncodage` date DEFAULT NULL,
  `nbreTotal` int(11) NOT NULL,
  `nbreBon` int(11) NOT NULL,
  `nbreMauvais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `periode` text COLLATE latin2_bin NOT NULL,
  `quantite` decimal(10,0) DEFAULT NULL,
  `image` text COLLATE latin2_bin,
  `idAdmin` int(11) DEFAULT NULL,
  `dateEncodage` date DEFAULT NULL,
  `produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `description` text COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `structure` varchar(50) COLLATE latin2_bin DEFAULT NULL,
  `description` text COLLATE latin2_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structure` (`structure`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
