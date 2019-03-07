-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Mars 2019 à 10:47
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epargne`
--

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `iddepot` int(11) NOT NULL,
  `montantdepot` int(255) NOT NULL,
  `datedepot` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `depot`
--

INSERT INTO `depot` (`iddepot`, `montantdepot`, `datedepot`, `id`) VALUES
(27, 200000, '2018-11-22', 31),
(26, 60000, '2018-11-22', 32),
(28, 5000, '2019-03-14', 32);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `email`, `telephone`, `login`, `password`, `role`) VALUES
(32, 'membre2', 'membre2@membre2.com', '03040506', 'membre2', '5fb089e8055f7cfb0766ee17917db2c0', 'user'),
(33, 'membre3', 'membre3@membre.com', '04050607', 'membre3', 'c5ecd0ce6cfffeca1b85ad0b086ce978', 'user'),
(30, 'admin', 'admin@admin.com', '01020304', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(31, 'membre1', 'membre1@membre1.com', '02030405', 'membre1', 'fe89440999123182414a6a96f7c9397a', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `retrait`
--

CREATE TABLE `retrait` (
  `idretrait` int(11) NOT NULL,
  `montantretrait` int(255) DEFAULT NULL,
  `dateretrait` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `retrait`
--

INSERT INTO `retrait` (`idretrait`, `montantretrait`, `dateretrait`, `id`) VALUES
(26, 15000, '2018-11-22', 32),
(27, 40000, '2018-11-22', 31);

-- --------------------------------------------------------

--
-- Structure de la table `solde`
--

CREATE TABLE `solde` (
  `soldeid` int(11) NOT NULL,
  `soldenom` varchar(255) NOT NULL,
  `soldeemail` varchar(255) NOT NULL,
  `soldetelephone` varchar(255) NOT NULL,
  `soldelogin` varchar(255) NOT NULL,
  `totaldepot` int(255) NOT NULL,
  `totalretrait` int(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`iddepot`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `retrait`
--
ALTER TABLE `retrait`
  ADD PRIMARY KEY (`idretrait`);

--
-- Index pour la table `solde`
--
ALTER TABLE `solde`
  ADD PRIMARY KEY (`soldeid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `iddepot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `retrait`
--
ALTER TABLE `retrait`
  MODIFY `idretrait` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `solde`
--
ALTER TABLE `solde`
  MODIFY `soldeid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
