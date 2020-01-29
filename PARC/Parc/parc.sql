-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Octobre 2017 à 15:20
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`login`, `pass`) VALUES
('admin', '351fa5e8832e72328e36d6bf2076fd33');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `design_marque` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `design_marque`) VALUES
(1, 'TOYOTA'),
(2, 'RENAULT');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reserv` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix_reserv` float NOT NULL,
  `nom_clt` varchar(50) NOT NULL,
  `prenom_clt` varchar(70) NOT NULL,
  `cin_clt` varchar(20) NOT NULL,
  `id_voit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id_reserv`, `date_debut`, `date_fin`, `prix_reserv`, `nom_clt`, `prenom_clt`, `cin_clt`, `id_voit`) VALUES
(1, '2015-01-23', '2015-01-24', 60, 'bouaziz', 'wajdi', '02455856', 2),
(3, '2015-02-03', '2015-02-10', 75, 'elleuch', 'amine', '024458878', 3),
(4, '2015-03-01', '2015-03-05', 47, 'ben selem', 'ahmed', '01445660', 1),
(5, '2015-01-24', '2015-01-30', 120, 'toumi', 'mohamed', '08556998', 5),
(6, '2016-11-09', '2016-11-10', 45, 'test', 'test', '123456678', 2);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `id_voit` int(11) NOT NULL,
  `nom_voit` varchar(100) NOT NULL,
  `photo_voit` varchar(100) NOT NULL,
  `marque_voit` int(11) NOT NULL,
  `couleur_voit` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voitures`
--

INSERT INTO `voitures` (`id_voit`, `nom_voit`, `photo_voit`, `marque_voit`, `couleur_voit`) VALUES
(2, 'megane', 'tq0f043ggb.jpg', 2, 'bleu'),
(3, 'Clio', '1301572-les-nouveaux-moteurs-de-la-renault-clio-4.jpg', 2, 'rouge'),
(4, 'fluence', '23.jpg', 2, 'noir'),
(5, 'highlander', '2013-Toyota-Highlander-SUV-Base-4dr-Front-wheel-Drive-Photo.png', 1, 'gris'),
(6, 'hilux', '2015-toyota-hilux-spy-photo.jpg', 1, 'noir'),
(10, '', '', 0, ''),
(11, '', '', 0, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`,`pass`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reserv`),
  ADD KEY `id_voit` (`id_voit`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id_voit`),
  ADD KEY `marque_voit` (`marque_voit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
