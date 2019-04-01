-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 avr. 2019 à 14:48
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_projet_smoothie`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergene`
--

DROP TABLE IF EXISTS `allergene`;
CREATE TABLE IF NOT EXISTS `allergene` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `allergene_ingredient`
--

DROP TABLE IF EXISTS `allergene_ingredient`;
CREATE TABLE IF NOT EXISTS `allergene_ingredient` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idAllergene` int(5) DEFAULT NULL,
  `idIngredient` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAllergene` (`idAllergene`),
  KEY `idIngredient` (`idIngredient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `dateLivraison` date DEFAULT NULL,
  `fini` varchar(3) NOT NULL,
  `idUtilisateur` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `dateCommande`, `dateLivraison`, `fini`, `idUtilisateur`) VALUES
(12, '2019-04-01', NULL, 'N', 1),
(11, '2019-03-26', '2019-03-27', 'O', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `texte` text,
  `datePoste` datetime DEFAULT NULL,
  `heurePoste` varchar(5) DEFAULT NULL,
  `note` int(2) DEFAULT NULL,
  `idUtilisateur` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `composition_produit`
--

DROP TABLE IF EXISTS `composition_produit`;
CREATE TABLE IF NOT EXISTS `composition_produit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idProduit` int(5) DEFAULT NULL,
  `idIngredient` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduit` (`idProduit`),
  KEY `idIngredient` (`idIngredient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idProduit` int(5) DEFAULT NULL,
  `idCommande` int(5) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduit` (`idProduit`),
  KEY `idCommande` (`idCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`id`, `idProduit`, `idCommande`, `quantite`) VALUES
(30, 1, 1, 5),
(36, 1, 1, 5),
(23, 1, 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `image`, `description`) VALUES
(1, 'La petite bou-Rick des horreurs', 1.48, 'larbin.png', 'test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille test description 												test taille '),
(2, 'Rick-ornichon', 2.31, 'rick.png', 'test description 												test taille'),
(3, 'E-Rick-xir d\'amour', 1.75, 'morty.png', 'test description test taille');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `adrMail` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `niveau` int(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `tel_fixe` varchar(14) DEFAULT NULL,
  `tel_portable` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `adrMail`, `mdp`, `niveau`, `nom`, `prenom`, `rue`, `cp`, `ville`, `tel_fixe`, `tel_portable`) VALUES
(1, 'delasalle.sio.colleu.e@gmail.com', 'mdp', 2, 'colleu', 'elven', 'La houssais', '35230', 'Bourgbarré', '02030405', '0787608857'),
(2, 'colleu.elven@gmail.com', 'mdp', 1, 'colleu', 'elven', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
