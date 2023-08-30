-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 juil. 2023 à 18:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) DEFAULT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `telephone`, `adresse_client`) VALUES
(9, 'tolotra', 3487666, 'tsarahonenana'),
(2, 'martin lingard', 12009990, 'paris'),
(3, 'martin lingard1', 12009990, 'paris'),
(4, 'georges', 12334455, 'londres'),
(11, 'doriant', 2736566, 'paris'),
(7, 'georges', 12334455, 'londres');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `medicament_cmd` varchar(255) NOT NULL,
  `quantite_cmd` int(11) NOT NULL,
  `prix_vente` int(11) NOT NULL,
  PRIMARY KEY (`id_cmd`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `date_commande`, `idclient`, `medicament_cmd`, `quantite_cmd`, `prix_vente`) VALUES
(1, '2023-07-03', 8, 'paracetamol 250', 13, 500),
(2, '2023-07-03', 8, 'paracetamol 250', 13, 500),
(7, '2023-07-03', 3, 'amoxicilline', 25, 400),
(6, '2023-07-03', 3, 'amoxicilline', 25, 400);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(255) DEFAULT NULL,
  `type_fournisseur` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `type_fournisseur`, `date_creation`) VALUES
(1, 'labo', 'medico generales', '2014-07-03 00:00:00'),
(2, 'labo', 'medicine ', '2023-07-12 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medicament` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `prix_medicament` int(11) NOT NULL,
  `quantite_stock` int(11) NOT NULL,
  `date_ajout` date DEFAULT NULL,
  `date_peremption` date DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`code`, `nom_medicament`, `designation`, `prix_medicament`, `quantite_stock`, `date_ajout`, `date_peremption`) VALUES
(28, 'amoxicilline', 'antibiotique', 15, 25, '2023-07-06', '2023-07-30'),
(22, 'vitamine c', 'vitamine', 50, 25, '2023-07-04', '2023-08-06'),
(23, 'paracetamol', 'maux de tete', 15, 25, '2023-07-05', '2023-07-09'),
(26, 'voltinax', 'maladies', 130, 50, '2023-06-29', '2023-07-05'),
(27, 'Metformine ', 'AntidiabÃ©tique oral (biguanide)', 300, 14, '2023-07-05', '2023-07-09'),
(29, 'paradiclofenac', 'maladies des dents', 15, 25, '2023-07-05', '2023-07-09'),
(30, 'antigripe2', 'grippe', 15, 25, '2023-07-05', '2023-07-09'),
(31, 'seringue', 'materiels', 2, 25, '2023-07-05', '2023-07-09'),
(32, 'omeprazole', 'Inhibiteur de la pompe Ã  protons (IPP) (antiacide)', 15, 25, '2023-07-05', '2023-07-09'),
(39, 'serome', 'maladies grave', 800, 25, '2023-07-03', '2024-07-04'),
(35, 'Prednisone', ' CorticostÃ©roÃ¯de (glucocorticoÃ¯de)', 500, 25, '2023-07-05', '2023-07-09'),
(38, 'diclofenac', 'maladies', 50, 67, '2023-07-07', '2023-08-06');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `type_utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `mdp_utilisateur`, `type_utilisateur`) VALUES
(1, 'kenny', '3998kenny', 'admin'),
(4, 'admin1', '2023', 'admin'),
(3, 'kenny3', '1234kenny', 'utilisateur'),
(5, 'utilisateur', '9876', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `code_vente` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medicament` varchar(255) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `quantite_vendu` int(11) NOT NULL,
  PRIMARY KEY (`code_vente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`code_vente`, `nom_medicament`, `prix_unitaire`, `quantite_vendu`) VALUES
(2, 'voltinax', 80, 12),
(3, 'paracetamol', 75, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
