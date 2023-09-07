-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql105.byetcluster.com
-- Généré le :  jeu. 07 sep. 2023 à 06:39
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_34593803_pharmaciedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `medicament_acheter` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `telephone`, `adresse_client`, `medicament_acheter`) VALUES
(9, 'tolotra 1', 343203327, 'tsarahonenana', 'fentanyl'),
(2, 'martin lingard', 12009990, 'paris', 'oploides'),
(4, 'georges bouche', 7747539898, 'stutgart', 'doliprane'),
(11, 'doriant', 2736566, 'paris', 'ibuprofene'),
(7, 'georges', 12334455, 'londres', 'vitamine c'),
(12, 'gregoires', 279876998, 'paris', 'valium'),
(15, 'moreno', 211675758, 'milan', 'Bactrim'),
(17, 'cedric', 9895474634567, 'saint etienne', 'serome'),
(19, 'mandresy', 329133715, 'andraisoro', 'valium'),
(20, 'karim', 345254722, 'paris', 'valium');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `medicament_cmd` varchar(255) NOT NULL,
  `quantite_cmd` int(11) NOT NULL,
  `prix_vente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `date_commande`, `idclient`, `medicament_cmd`, `quantite_cmd`, `prix_vente`) VALUES
(1, '2023-07-19', 8, 'paracetamol 250', 13, 500),
(7, '2023-07-05', 6, 'fentanyl', 12, 300),
(6, '2023-07-05', 3, 'amoxicilline', 6, 400),
(8, '2023-07-26', 3, 'Fentanyl', 2, 230);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom_fournisseur` varchar(255) DEFAULT NULL,
  `type_fournisseur` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `type_fournisseur`, `date_creation`) VALUES
(1, 'labo', 'medico generales', '2014-07-03 00:00:00'),
(2, 'labo', 'medicine ', '2023-07-20 00:00:00'),
(5, 'johnson johnson', 'creation de vaccin', '1993-07-08 00:00:00'),
(6, 'BioNTech', 'medicament biochimique', '1993-07-06 00:00:00'),
(7, ' Eli Lilly and Company', ' basees sur des produits alimentaire', '2007-07-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `code` int(11) NOT NULL,
  `nom_medicament` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `prix_medicament` int(11) NOT NULL,
  `quantite_stock` int(11) NOT NULL,
  `date_ajout` date DEFAULT NULL,
  `date_peremption` date DEFAULT NULL,
  `nom_fournisseur` varchar(255) DEFAULT NULL,
  `type_medicament` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`code`, `nom_medicament`, `designation`, `prix_medicament`, `quantite_stock`, `date_ajout`, `date_peremption`, `nom_fournisseur`, `type_medicament`) VALUES
(28, 'amoxicilline', 'antibiotique', 15, 40, '2023-07-06', '2023-07-30', ' Eli Lilly and Company', 'liberation prolongee'),
(22, 'vitamine c', 'vitamine', 50, 25, '2023-07-04', '2023-08-06', 'Merck & Co.', NULL),
(23, 'paracetamol', 'maux de tete', 15, 25, '2023-07-05', '2023-07-09', 'Merck & Co.', 'liberation prolongee'),
(26, 'voltinax', 'maladies', 130, 50, '2023-06-29', '2023-07-05', NULL, 'liberation prolongee'),
(27, 'Metformine ', 'AntidiabÃ©tique oral (biguanide)', 300, 14, '2023-07-05', '2023-07-09', 'Gilead Sciences', 'liberation prolongee'),
(29, 'paradiclofenac', 'maladies des dents', 15, 25, '2023-07-05', '2023-07-09', 'Gilead Sciences', NULL),
(30, 'antigripe2', 'grippe', 15, 25, '2023-07-05', '2023-07-09', 'Merck & Co.', 'liberation prolongee'),
(31, 'seringue', 'materiels', 2, 25, '2023-07-05', '2023-07-09', NULL, NULL),
(32, 'omeprazole', 'Inhibiteur de la pompe Ã  protons (IPP) (antiacide)', 15, 25, '2023-07-05', '2023-07-09', 'Gilead Sciences', 'liberation prolongee'),
(39, 'serome', 'maladies grave', 800, 25, '2023-07-03', '2024-07-04', 'Novartis', 'liberation immediate'),
(35, 'Prednisone', ' CorticostÃ©roÃ¯de (glucocorticoÃ¯de)', 500, 25, '2023-07-05', '2023-07-09', 'Gilead Sciences', NULL),
(38, 'diclofenac', 'maladies', 50, 67, '2023-07-07', '2023-08-06', NULL, 'liberation prolongee'),
(41, 'fentanyl', 'antalgiques', 1200, 12, '2023-07-14', '2024-03-14', 'GlaxoSmithKline (GSK', 'liberation immediate'),
(53, 'Bactrim', 'masquage dâ€™une odeur', 200, 89, '2023-07-10', '2024-02-22', 'AstraZeneca', 'liberation immediate'),
(54, 'halopÃ©ridol', 'libÃ©rÃ© dans la circulation sanguine', 400, 55, '2023-07-13', '2023-11-24', 'AbbVie', 'liberation immediate'),
(49, 'valium', 'faciliter lâ€™identification', 700, 15, '2023-07-16', '2024-10-18', '', 'liberation immediate'),
(52, 'valium', 'faciliter lâ€™identification', 350, 30, '2023-07-13', '2024-03-22', ' BioNTech', 'liberation immediate'),
(55, 'halopÃ©ridol', 'libÃ©rÃ© dans la circulation sanguine', 400, 55, '2023-07-13', '2023-11-24', 'AbbVie', 'liberation immediate');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `type_utilisateur` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `mdp_utilisateur`, `type_utilisateur`, `email`) VALUES
(8, 'bryan', '12345', 'admin', 'karim6roben@gmail.com'),
(4, 'admin1', '2023', 'admin', NULL),
(9, 'newutilisateur', 'utilisateur', 'utilisateur', 'karim6roben@gmail.com'),
(7, 'kennia', '12345', 'utilisateur', NULL),
(10, 'dimitry', 'password', 'utilisateur', 'karim6roben@gmail.com'),
(11, 'bro', 'abcd', 'utilisateur', 'andriqnina@gmail.com'),
(12, 'Kennie', 'kenny', 'utilisateur', 'aaabbb@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `code_vente` int(11) NOT NULL,
  `nom_medicament` varchar(255) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `quantite_vendu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`code_vente`, `nom_medicament`, `prix_unitaire`, `quantite_vendu`) VALUES
(2, 'voltinax', 80, 12),
(3, 'paracetamol', 75, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `fk_commande_medicament` (`medicament_cmd`),
  ADD KEY `fk_commande_client` (`idclient`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`code_vente`),
  ADD KEY `fk_vente_medicament` (`nom_medicament`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `code_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
