-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 sep. 2018 à 12:24
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `recursive2`
--
DROP DATABASE IF EXISTS `recursive2`;
CREATE DATABASE IF NOT EXISTS `recursive2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recursive2`;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titleMenu` varchar(150) NOT NULL,
  `parentMenu` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `titleMenu`, `parentMenu`) VALUES
(1, 'Premier', 0),
(2, 'Deuxième', 0),
(3, 'Troisième', 0),
(4, 'sous-Premier-a', 1),
(5, 'sous-Premier-b', 1),
(6, 'sous-Premier-c', 1),
(7, 'sous-Premier-b-a', 5),
(8, 'sous-Premier-b-b', 5),
(9, 'sous-Premier-c-a', 6),
(10, 'sous-Premier-c-b', 6),
(11, 'sous-Premier-b-b-a', 8),
(12, 'sous-Premier-b-b-b', 8),
(13, 'sous-Deuxième-a', 2),
(14, 'sous-Deuxième-b', 2),
(15, 'sous-Troisième-a', 3),
(16, 'sous-Troisième-b', 3),
(17, 'sous-Troisième-c', 3);
COMMIT;
