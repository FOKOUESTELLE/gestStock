-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 22 mars 2025 à 04:58
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

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
  `raison_achat` varchar(30) NOT NULL,
  `qte` int(11) NOT NULL,
  `pu_achat` int(11) NOT NULL,
  `pt_achat` int(11) NOT NULL,
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
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Structure de la table `cmd_user`
--

DROP TABLE IF EXISTS `cmd_user`;
CREATE TABLE IF NOT EXISTS `cmd_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_cmd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_cmd` (`id_cmd`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `adresse_livraison` varchar(30) NOT NULL,
  `frais_transport` int(11) NOT NULL,
  `frais_livraison` int(11) NOT NULL,
  `reduction` int(11) NOT NULL,
  `methode_livraison` varchar(30) NOT NULL,
  `Total` int(11) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `fk_id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `sku` varchar(10) NOT NULL,
  `code_barre` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `original_price` int(11) NOT NULL,
  `special_price` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `code_produit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`sku`),
  KEY `fk_exemplaire_produit` (`code_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fourn` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fourn` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_fourn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(30) NOT NULL,
  `ressource` varchar(30) NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `sku_exemplaire` varchar(10) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `type_produit` varchar(30) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_id_categorie` (`id_categorie`),
  KEY `fk_sku_exemplaire` (`sku_exemplaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_role` (`id_role`),
  KEY `fk_id_permission` (`id_permission`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_roles` (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
