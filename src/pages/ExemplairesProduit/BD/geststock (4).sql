-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 avr. 2025 à 14:23
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `geststock`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id_achat` int(11) NOT NULL AUTO_INCREMENT,
  `id_fourn` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `type_achat` varchar(30) NOT NULL,
  `raison_achat` varchar(30) NOT NULL,
  `qte` int(11) NOT NULL,
  `pu_achat` int(11) NOT NULL,
  PRIMARY KEY (`id_achat`),
  KEY `fk_id_produit` (`id_produit`),
  KEY `fk_id_fourn` (`id_fourn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `nom_cat` (`nom_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_cat`, `description`) VALUES
(21, 'BeautÃ© et Sante', 'DYUD UKLZC HX'),
(22, 'mode', 'tetduski'),
(20, 'SupermarchÃ© ', 'weyd FYU YVF\' zLAVGXCGJHKDFV'),
(19, ' Informatique industriel', 'sdfg fgksykayapfcq;oyav bnc'),
(17, 'Electromenager', 'retyfygughufdbv jvcxb vxzzx vfxs ouSXW'),
(18, 'Maison et Bureau ', 'ET6RTEIQY7IOT78BUIOV HC');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(30) NOT NULL,
  `num_telephone` varchar(15) NOT NULL,
  `adresse_livraison` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `num_telephone`, `adresse_livraison`, `ville`) VALUES
(1, ' Estelle fokou', '694469902', ' douala', 'aris'),
(2, ' Sandra Magne', '694469902', ' douala', 'aris'),
(3, ' Sandra Magne', '694469902', ' douala', 'aris'),
(4, ' Estelle fokou', '694469902', ' douala', 'aris');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `date_cmd` date NOT NULL,
  `type_cmd` varchar(30) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `qte` int(11) NOT NULL,
  `adresse_livraison` varchar(30) NOT NULL,
  `frais_transport` int(11) NOT NULL,
  `frais_livraison` int(11) NOT NULL,
  `reduction` int(11) NOT NULL,
  `methode_livraison` varchar(30) NOT NULL,
  `Total` int(11) NOT NULL,
  `Statut` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `fk_id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id_exemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `code_bar` varchar(30) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `original_price` int(11) NOT NULL,
  `special_price` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_exemplaire`),
  UNIQUE KEY `code_barre` (`code_bar`),
  KEY `fk_exemplaire_produit` (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `code_bar`, `nom_produit`, `original_price`, `special_price`, `id_produit`) VALUES
(17, 'ettdtryue5y', '39', 358456, 12344, 39),
(16, 'ettdtryu', '39', 358456, 12344, 39),
(15, 'rtuiuiiiiiiii', '40', 365435, 65445, 40),
(14, 'erteyyufui', '40', 365435, 12344, 40),
(18, '=5', '39', 365435, 65445, 39),
(19, 'TETDYDHDFH', '36', 365435, 65445, 36);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fourn` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fourn` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_fourn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fourn`, `nom_fourn`, `email`) VALUES
(5, 'Allan', 'Allan@345gmail.com'),
(3, 'Sandra', 'sandramagne@gmail.com'),
(4, 'Allian', 'Allian@3gmail.com'),
(6, 'Estelle', 'estellefokou8@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `id_cmd` int(11) DEFAULT NULL,
  `statut_paiement` varchar(30) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_paiement` varchar(30) NOT NULL,
  `mode_paiement` varchar(30) NOT NULL,
  PRIMARY KEY (`id_paiement`),
  KEY `fk_id_cmd` (`id_cmd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(30) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_id_categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `categorie`, `id_categorie`, `nom_produit`, `prix_unitaire`, `description`) VALUES
(40, '22', 22, 'robe  classique', 3462487, 'dhksdkyudfiospor;klvnmcv'),
(39, '21', 21, 'lait de beaute mixa', 36456, 'wdhduulsdfuioxc'),
(37, '19', 19, 'Ordinateur poratble', 25356474, 'sdh vzhzcx fgzddxfcv,xz h xv/l b'),
(38, '17', 17, 'tondeuse electrique', 34658389, 'sgdvdgf cf ;us uiig lbv'),
(36, '21', 21, 'moulinexe', 4757894, 'wyet ifv n vjhvj;nioo');

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

DROP TABLE IF EXISTS `produit_commande`;
CREATE TABLE IF NOT EXISTS `produit_commande` (
  `id_prod_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_cmd` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_prod_cmd`),
  KEY `fk_id_cmd` (`id_cmd`),
  KEY `fk_id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `nom_role` (`nom_role`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
(41, 'Comptable'),
(40, 'Livreur'),
(37, 'Vendeuse'),
(36, 'Admin'),
(45, 'preparateur'),
(46, 'Receptioniste');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) NOT NULL,
  `adresse_mail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `adresse_mail` (`adresse_mail`),
  UNIQUE KEY `password` (`password`),
  KEY `fk_users_roles` (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `adresse_mail`, `password`, `role`, `id_role`) VALUES
(20, 'leslie', 'lesli@gmail.com', 'leslieTesst123', 'Admin', 36);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
