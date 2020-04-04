-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 04 Avril 2020 à 15:27
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `traineeship`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnementclient`
--

CREATE TABLE `abonnementclient` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recu` varchar(255) NOT NULL,
  `valider` int(11) NOT NULL,
  `archiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `abonnementclient`
--

INSERT INTO `abonnementclient` (`id`, `client_id`, `date`, `recu`, `valider`, `archiver`) VALUES
(1, 14, '2020-04-04 02:17:25', 'uploads/1585959445.pdf', 0, 0),
(2, 14, '2020-04-04 02:17:36', 'uploads/1585959456.pdf', 0, 0),
(3, 14, '2020-04-04 02:18:40', 'uploads/1585959520.jpg', 0, 0),
(4, 14, '2020-04-04 02:22:23', 'uploads/1585959743.jpg', 0, 0),
(5, 14, '2020-04-04 02:22:30', 'uploads/1585959750.jpg', 0, 0),
(6, 14, '2020-04-04 02:24:39', 'uploads/1585959879.jpg', 0, 0),
(7, 14, '2020-04-04 02:25:32', 'uploads/1585959932.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `n_cni` int(11) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `sexe`, `firstname`, `lastname`, `n_cni`, `adr`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Homme', 'Belalia', 'Mohamed Alaa Eddine', 123456789, 'rue ould ben khadda mohamed', 697701228, 'mascaprod7@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'ZvO$yYXJtL', 1, 0, '2020-03-27 00:00:00'),
(6, 'Homme', 'mohamed', 'alaa eddine', 123, 'mascara', 123, 'belalia.alaaeddine@gmail.com', '202cb962ac59075b964b07152d234b70', ')67wdieL0U', 1, 1, '2020-03-27 00:00:00'),
(7, 'Femme', 'sfe', 'fdf', 1121, '111df', 1222, 'souad@gmail.com', '202cb962ac59075b964b07152d234b70', '4$0ZKEeNVi', 1, 0, '2020-03-28 18:53:23');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `dn` date NOT NULL,
  `n_cni` int(11) NOT NULL,
  `eta` varchar(255) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `nv_etd` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `sexe`, `dn`, `n_cni`, `eta`, `adr`, `nv_etd`, `Specialite`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(13, 'souad', 'beguenane', 'Femme', '0022-02-14', 1222, '2222', '222', '222', '222', 222, 'dqsdqs@dqsd.dsqdq', '202cb962ac59075b964b07152d234b70', 'uaTGIkmpXi', 1, 1, '2020-03-28 16:01:19'),
(14, 'souad', 'souad', 'Femme', '0001-02-02', 123, '222', '22', '22', '22', 2, 'souad.beguenane@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'DR4fL6S9l1', 1, 0, '2020-04-01 23:29:59');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `n_serie` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `nom_dirigeant` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `siege_social` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `secteur_act` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
