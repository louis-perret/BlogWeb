-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 03 Janvier 2022 à 14:19
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbjuduteyrat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `pseudo` varchar(20) NOT NULL,
  `motDePasse` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`pseudo`, `motDePasse`) VALUES
('sesame', '$2y$10$aj64QPcSQVM3OKE2CRKDauogsgEvrlIinHeOO48ITaW3Ay92yqMfq');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `date` datetime NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `idNews` int(11) NOT NULL,
  `idCommentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`date`, `contenu`, `pseudo`, `id`, `idNews`, `idCommentaire`) VALUES
('2021-12-16 11:42:54', 'J\'achète !!!', 'Bill_Gates_official', 50, 82, NULL),
('2021-12-16 11:43:46', 'tu as vraiment raison :)', 'cebouhours', 51, 83, NULL),
('2021-12-16 11:53:57', 'Ouais !! ', 'cebouhours', 52, 86, NULL),
('2021-12-16 11:54:11', 'Si tu veux mec.', 'Louis', 53, 86, NULL),
('2021-12-16 11:54:51', 'C\'est une fonctionnalitée incroyable.', 'Bill_Gates_official', 54, 86, NULL),
('2021-12-16 11:55:26', 'Un petit dernier pour la route.', 'Skeard le beatmaker', 55, 86, NULL),
('2021-12-27 20:12:16', 'Ce site est très bien fait !', 'loperret2', 56, 86, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `News`
--

CREATE TABLE `News` (
  `id` int(20) NOT NULL,
  `titre` char(50) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(5000) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `News`
--

INSERT INTO `News` (`id`, `titre`, `date`, `contenu`, `image`) VALUES
(82, 'Le début d\'une grande aventure.', '2021-12-16 11:42:32', 'Ceci est l\'inauguration du site web INCROYABLE de Louis Perret et Jules Duteyrat.', NULL),
(83, 'J\'adore monsieur Salva.', '2021-12-16 11:43:24', 'C\'est vraiment le meilleur prof. :)', NULL),
(86, 'Trop d\'ambiance ici.', '2021-12-16 11:53:47', 'Mettez un max de Coms pour pouvoir utiliser le bouton \"aller au commentaires\".', NULL),
(89, 'Joyeux Noël !', '2021-12-27 20:22:04', 'Nous vous souhaitons à tous un joyeux Noël en compagnie de vos familles !', NULL),
(90, 'Bonne fin d\'année !', '2021-12-27 20:23:42', 'Profitez de vos familles et faites attention ! \r\nLes cas augmentent terriblement....', NULL),
(92, 'L\'art de décaler les sons', '2021-12-27 20:27:52', 'Connaissez-vous cet art ? Personnellement, je l\'ai découvert cette année et je trouve ça assez fascinant de pouvoir changer le sens d\'une phrase en échangeant des lettres entre elles.\r\nTenter, vous verrez !', NULL),
(95, '2022', '2022-01-01 14:50:45', 'Bonnes années tout le monde ! Que vous réussisez votre année et ayez votre diplôme !', NULL),
(96, 'Oh micro-onde', '2022-01-03 14:11:02', 'Et oui, je parle bien du variant de la machine qui permet d\'envoyer des messages dans le passé, comme dans Steins-Gate ! (et non du variant COVID)', NULL),
(97, 'Help', '2022-01-03 14:12:20', 'Mon o est tombé, retrouvez le s\'il vous plaît...\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nO, il est là, merci pour votre aide !', NULL),
(98, 'Recherche de stage', '2022-01-03 14:13:48', 'Je recherche un stage dans le développement informatique. Recrutez-moi, je sais bien faire le café ^^. ', NULL),
(99, 'La Malpolie', '2022-01-03 14:15:07', 'Bonjour, je suis une news musclée mais très malpolie qui pousse les plus vieux sur d\'autre pages.', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`pseudo`,`motDePasse`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdNews` (`idNews`),
  ADD KEY `fkIdCom` (`idCommentaire`);

--
-- Index pour la table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `News`
--
ALTER TABLE `News`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fkIdCom` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdNews` FOREIGN KEY (`idNews`) REFERENCES `News` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
