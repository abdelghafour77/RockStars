-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 nov. 2022 à 20:07
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rockstars`
--
CREATE DATABASE IF NOT EXISTS `rockstars` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rockstars`;

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `picture`) VALUES
(1, 'YAMAHA', '', 'yamaha.jpg'),
(2, 'TAMA', '', 'tama.png'),
(3, 'KAWAI', '', 'kawai.png'),
(4, 'GIBSON', '', 'gibson.png'),
(5, 'SHURE', '', 'shure.png'),
(6, 'FENDER', '', 'fender.png'),
(7, 'SENNHEISER', '', 'sennheiser.png'),
(8, 'ROLAND', '', 'roland.png');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text NOT NULL,
  `picture` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `picture`) VALUES
(1, 'Pianos', '', 'Pianos.jpg'),
(2, 'Keyboard Instruments', '', 'Keyboard-Instruments.jpg'),
(3, 'Guitars, Basses, & Amps', '', 'Guitars, Basses, & Amps.webp'),
(4, 'Drums', '', 'Drums.webp'),
(5, 'Brass & Woodwinds', '', 'Brass & Woodwinds.webp'),
(6, 'Strings', '', 'Strings.webp'),
(7, 'Percussion', '', 'Percussion.webp'),
(8, 'Synthesizers & Music Production Tools', '', 'Synthesizers & Music Production Tools.jpg'),
(9, 'Electronic Entertainment Instruments', '', 'Electronic Entertainment Instruments.webp'),
(10, 'Audio & Visual', '', 'Audio & Visual.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `description` text,
  `brands_id` int NOT NULL,
  `categories_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `role_id`, `created_at`, `updated_at`, `picture`) VALUES
(2, 'aloaloaloalo123456789', 'aloaloaloalo123456789', 'miso.abdo@gmail.com', '$2y$10$zEVJM/zhTl69kQmqw/iiB.Ke7e3XFiFPj5Xibf9xsF7N4tr5sSKMy', NULL, 0, '2022-11-15 18:01:49', '2022-11-15 19:01:49', NULL),
(5, 'aloaloaloalo123456789', 'aloaloaloalo123456789', 'aloaloaloalo123456789@gmail.com', '$2y$10$p9HXC4oUArPcTH0Xk3SWNuXhHU3LloOstnCJfcMyGf3Fv52ecl1WW', NULL, 0, '2022-11-15 19:05:09', '2022-11-15 20:05:09', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
