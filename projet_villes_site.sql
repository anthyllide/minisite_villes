-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Janvier 2015 à 11:26
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`pays_id`, `pays_nom`) VALUES
(1, 'France'),
(2, 'Espagne'),
(3, 'Allemagne'),
(4, 'Russie'),
(5, 'Italie');

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_user_id` varchar(13) NOT NULL,
  `web_user_visit` int(11) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `stat`
--

INSERT INTO `stat` (`stat_id`, `web_user_id`, `web_user_visit`) VALUES
(1, '54b179e673c9c', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(20) NOT NULL,
  `user_password` varchar(34) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`) VALUES
(1, 'user@projetville.com', '$1$cZ0./4..$VtjJZozoH6l462wqeRn4f/');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`id`, `villes_nom`, `ville_texte`, `pays_id`) VALUES
(14, 'Madrid', 'Madrid est une ville d''Espagne avec pleins de belles choses.\r\nEuh et c''est la capitale de l''Espagne !', 2),
(16, 'Bandol', 'Bandol est une commune française dans le département du Var en région Provence-Alpes-Côte d''Azur.\r\n\r\nL''exportation des vins locaux (en particulier) via le port de Bandol a donné son nom à l''AOC des vins de Bandol, qui sont l''une des raisons du renom de la commune. Le tourisme balnéaire (notamment au milieu du XXe siècle) est l''autre raison majeure de sa réputation.\r\n\r\nSes habitants sont appelés les Bandolais.', 1),
(17, 'Rome', 'Rome (en italien Roma, prononcé [ˈroˑma ]) est la capitale de l''Italie depuis 1871. Située au centre-ouest de la péninsule italienne, sur les côtes de la mer Tyrrhénienne, elle est également la capitale de la province de Rome, de la région du Latium, et fut celle de l''Empire romain durant plusieurs siècles. En 2014, elle compte 2 869 461 habitants établis sur 1 285 km², ce qui fait d''elle la commune la plus peuplée d''Italie et la plus étendue d''Europe après Moscou et Londres1. Son aire urbaine, qui recense 4 321 244 habitants en 20132, est en revanche moins importante que celle de Milan et Naples3. Elle présente en outre la particularité de contenir un État enclavé dans son territoire : la Cité du Vatican (Città del Vaticano), dont le pape est le souverain.', 5),
(20, 'Moscou', 'Moscou (en russe : Москва, Moskva, API : /mɐˈskva/) est la capitale de la Fédération de Russie et la plus grande ville d''Europe. Moscou est situé sur la rivière Moskova. La ville se situe dans la partie européenne de la Russie et administrativement dans le district fédéral central. Moscou a le statut de ville fédérale. La ville est enclavée dans l''oblast de Moscou, mais en est administrativement indépendante.', 4),
(21, 'Chambéry', 'La plus belle ville de France !', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
