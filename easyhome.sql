-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 avr. 2019 à 16:20
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easyhome`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `num_contrat` int(11) NOT NULL,
  `date_contrat` date NOT NULL,
  `loc_contrat` int(11) NOT NULL,
  `etat du contrat` tinyint(1) NOT NULL,
  `home_contrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `koh`
--

CREATE TABLE `koh` (
  `num` int(11) NOT NULL,
  `typekoh` varchar(100) NOT NULL,
  `piece` varchar(250) NOT NULL,
  `loyermaison` varchar(200) NOT NULL,
  `caution` varchar(250) NOT NULL,
  `etatmeuble` varchar(250) NOT NULL,
  `img` varchar(100) NOT NULL,
  `proprietaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `koh`
--

INSERT INTO `koh` (`num`, `typekoh`, `piece`, `loyermaison`, `caution`, `etatmeuble`, `img`, `proprietaire`) VALUES
(11, 'studio', '1', '15000', '3', 'avec meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 10),
(12, 'appartement', '3', '32000', '3', 'avec meuble', '66073205.jpg', 10),
(13, 'manoir', '4', '25000', '5', 'avec meuble', '66073205.jpg', 10),
(14, 'bungalow', '1', '7500', '2', 'sans meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 11),
(15, 'villa', '6', '9000', '2', 'sans meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 10),
(16, 'studio', '1', '15000', '4', 'sans meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 9),
(17, 'studio', '1', '25000', '2', 'avec meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 8),
(18, 'maison de ville', '3', '400000', '7', 'avec meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 9),
(19, 'bungalow', '40', '1500', '7', 'sans meuble', '66073205.jpg', 11),
(20, 'maison', '40', '400000', '7', 'avec meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 11),
(21, 'domaine', '30', '750000', '10', 'avec meuble', 'mosaique-studio-Maison-Kent_auberge-touristique_suite_353-1.jpg', 11);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

CREATE TABLE `locataire` (
  `id_loc` int(11) NOT NULL,
  `nom_loc` varchar(20) NOT NULL,
  `prenom_loc` varchar(50) NOT NULL,
  `age_loc` varchar(100) NOT NULL,
  `contact_loc` varchar(50) NOT NULL,
  `adresse_loc` varchar(50) NOT NULL,
  `username_loc` varchar(100) NOT NULL,
  `mpd_loc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`id_loc`, `nom_loc`, `prenom_loc`, `age_loc`, `contact_loc`, `adresse_loc`, `username_loc`, `mpd_loc`) VALUES
(1, 'Koya', 'yamish', '18', '07070022', 'Abobo', 'admin', 'dabou'),
(2, 'koya', 'monique', '20', '04041234', 'Adjame', 'monique', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_pp` int(11) NOT NULL,
  `nom_pp` varchar(20) NOT NULL,
  `prenom_pp` varchar(50) NOT NULL,
  `age_pp` varchar(3) NOT NULL,
  `contact_pp` varchar(50) NOT NULL,
  `adresse_pp` varchar(50) NOT NULL,
  `username_pp` varchar(30) NOT NULL,
  `mpd_pp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_pp`, `nom_pp`, `prenom_pp`, `age_pp`, `contact_pp`, `adresse_pp`, `username_pp`, `mpd_pp`) VALUES
(8, 'koya', 'michelk', '18', '07070022', 'Abobo', '05560556', 'dabou'),
(9, 'koya', 'samel', '17', '05550006', 'DANANE', 'kozar', '12345'),
(10, 'Guebae', 'Suzy', '20', '47674658', 'COCODY', 'djela', '12345'),
(11, 'zlankouapieu', 'esdras', '30', '05123443', 'Yopougon', 'ezra', '12345');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD KEY `loc_contrat` (`loc_contrat`),
  ADD KEY `home_contrat` (`home_contrat`);

--
-- Index pour la table `koh`
--
ALTER TABLE `koh`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD PRIMARY KEY (`id_loc`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_pp`),
  ADD UNIQUE KEY `username_pp` (`username_pp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `koh`
--
ALTER TABLE `koh`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `locataire`
--
ALTER TABLE `locataire`
  MODIFY `id_loc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
