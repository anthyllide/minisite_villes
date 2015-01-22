-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Janvier 2015 à 20:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_villes_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `pays_id` int(11) NOT NULL AUTO_INCREMENT,
  `pays_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`pays_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`pays_id`, `pays_nom`) VALUES
(7, 'France'),
(8, 'Espagne'),
(10, 'Portugal'),
(11, 'Italie'),
(12, 'Russie');

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_user_id` varchar(13) NOT NULL,
  `web_user_visit` int(11) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `stat`
--

INSERT INTO `stat` (`stat_id`, `web_user_id`, `web_user_visit`) VALUES
(1, '54b179e673c9c', 7),
(2, '54b251a076595', 1),
(3, '54b256dbf126d', 5),
(4, '54b2de47eed25', 155),
(5, '54b431c38c428', 4),
(6, '54bcada974635', 39),
(7, '54bf4c4aeaab8', 1),
(8, '54bf4c4b37469', 18),
(9, '54c016eab7eef', 7),
(10, '54c018de0bac5', 4),
(11, '54c01b18cb388', 12),
(12, '54c020463e9a2', 1),
(13, '54c0209e5da35', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(40) NOT NULL,
  `user_password` varchar(34) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`) VALUES
(1, 'user@projetville.com', '$1$cZ0./4..$VtjJZozoH6l462wqeRn4f/'),
(4, 'dark.vador@gmail.fr', '$1$J4..e82.$wCOPeS9femLw4THjPhdfU/'),
(5, 'leila@gmail.fr', '$1$i0..Dt5.$olgo0Xl5e3lRgHLYKbYnt/'),
(6, 'bibi@free.fr', '$1$Us2.ND1.$zNsc67jl2GO7yMACh2vp01'),
(7, 'luc.skywalker@free.f', '$1$S44.zF4.$n29HFZfgrctHncNogQPzi0'),
(8, 'alex.gonzalez@aol.fr', '$1$xM/.ms1.$3PfukI75MGfnRlYropR3.0'),
(10, 'bobo@free.fr', '$1$2G4.hF1.$fEb1T0jL67/ISo13OQFCD0');

-- --------------------------------------------------------

--
-- Structure de la table `user_search`
--

CREATE TABLE IF NOT EXISTS `user_search` (
  `searchID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(40) NOT NULL,
  `resultID` int(11) NOT NULL,
  PRIMARY KEY (`searchID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Contenu de la table `user_search`
--

INSERT INTO `user_search` (`searchID`, `userID`, `resultID`) VALUES
(1, '1', 17),
(2, '1', 14),
(3, '1', 16),
(4, '1', 21),
(5, '1', 21),
(6, '1', 20),
(15, '1', 20),
(27, '1', 16),
(48, '4', 14),
(50, '4', 20),
(51, '4', 22),
(54, '4', 21),
(55, '54bdfc0c1c7c6', 21),
(56, '54bdfc0c1c7c6', 20),
(57, '54bdfc0c1c7c6', 16),
(58, '54bf4c53dbbb8', 14),
(59, '54bf50d8dc934', 20),
(60, '54bf50d8dc934', 16),
(61, '54c00486d751f', 17),
(62, '54c004c5a413d', 20),
(63, '54c004c5a413d', 21),
(64, '54c004c5a413d', 14),
(65, '54c004c5a413d', 16),
(66, '54c004c5a413d', 21),
(67, '1', 22),
(68, '1', 16),
(69, '1', 16),
(70, '1', 16),
(71, '1', 16),
(72, '1', 16),
(73, '1', 16),
(74, '1', 16),
(75, '1', 16),
(76, '1', 16),
(77, '1', 16),
(78, '1', 16),
(79, '1', 16),
(80, '1', 16),
(81, '1', 16),
(82, '1', 16),
(83, '1', 16),
(84, '1', 16),
(85, '1', 16),
(86, '1', 16),
(87, '1', 16),
(88, '1', 16),
(89, '1', 16),
(90, '1', 16),
(91, '1', 16),
(92, '1', 16),
(93, '1', 16),
(94, '1', 20);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `villes_nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ville_texte` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pays_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `villes_nom`, `ville_texte`, `pays_id`) VALUES
(14, 'Madrid', 'Madrid est une ville d''Espagne avec pleins de belles choses.\r\nEuh et c''est la capitale de l''Espagne !', 8),
(16, 'Bandol', 'Bandol est une commune française dans le département du Var en région Provence-Alpes-Côte d''Azur.\r\n\r\nL''exportation des vins locaux (en particulier) via le port de Bandol a donné son nom à l''AOC des vins de Bandol, qui sont l''une des raisons du renom de la commune. Le tourisme balnéaire (notamment au milieu du XXe siècle) est l''autre raison majeure de sa réputation.\r\n\r\nSes habitants sont appelés les Bandolais.', 7),
(17, 'Rome', 'Rome (en italien Roma, prononcé [ˈroˑma ]) est la capitale de l''Italie depuis 1871. Située au centre-ouest de la péninsule italienne, sur les côtes de la mer Tyrrhénienne, elle est également la capitale de la province de Rome, de la région du Latium, et fut celle de l''Empire romain durant plusieurs siècles. En 2014, elle compte 2 869 461 habitants établis sur 1 285 km², ce qui fait d''elle la commune la plus peuplée d''Italie et la plus étendue d''Europe après Moscou et Londres1. Son aire urbaine, qui recense 4 321 244 habitants en 20132, est en revanche moins importante que celle de Milan et Naples3. Elle présente en outre la particularité de contenir un État enclavé dans son territoire : la Cité du Vatican (Città del Vaticano), dont le pape est le souverain.', 11),
(20, 'Moscou', 'Moscou (en russe : Москва, Moskva, API : /mɐˈskva/) est la capitale de la Fédération de Russie et la plus grande ville d''Europe. Moscou est situé sur la rivière Moskova. La ville se situe dans la partie européenne de la Russie et administrativement dans le district fédéral central. Moscou a le statut de ville fédérale. La ville est enclavée dans l''oblast de Moscou, mais en est administrativement indépendante.', 12),
(21, 'Chambéry', 'La plus belle ville de France !', 7),
(22, 'Lisbonne', 'Lisbonne est la capital du Portugal.', 10),
(23, 'Paris', 'Paris (prononcé [pa.ʁi ] Prononciation du titre dans sa version originale Écouter) est la capitale de la France. Elle se situe au cœur d''une vaste plaine fertile au climat tempéré, le Bassin parisien, sur une boucle de la Seine, entre les confluents de celle-ci avec la Marne et l’Oise. Ses habitants s’appellent les Parisiens.', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
