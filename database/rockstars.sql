-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 19 nov. 2022 à 15:47
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
(1, 'YAMAHA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'yamaha.jpg'),
(2, 'TAMA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'tama.png'),
(3, 'KAWAI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'kawai.png'),
(4, 'GIBSON', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'gibson.png'),
(5, 'SHURE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'shure.png'),
(6, 'FENDER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'fender.png'),
(7, 'SENNHEISER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'sennheiser.png'),
(8, 'ROLAND', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'roland.png');

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
(1, 'Pianos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Pianos.jpg'),
(2, 'Keyboard Instruments', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Keyboard-Instruments.jpg'),
(3, 'Guitars, Basses, & Amps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Guitars,Basses,&Amps.jpg'),
(4, 'Drums', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Drums.jpg'),
(5, 'Brass & Woodwinds', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Brass&Woodwinds.jpg'),
(6, 'Strings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Strings.jpg'),
(7, 'Percussion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Percussion.jpg'),
(8, 'Synthesizers & Music Production Tools', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Synthesizers&MusicProductionTools.jpg'),
(9, 'Electronic Entertainment Instruments', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'ElectronicEntertainmentInstruments.jpg'),
(10, 'Audio & Visual', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Audio&Visual.jpg');

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
  `picture` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `model`, `description`, `brands_id`, `categories_id`, `quantity`, `price`, `picture`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'test product', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum.', 1, 1, 78, 15004, '1811221668789795.png', '2022-11-18 15:43:15', '2022-11-18 15:43:15', 6, 6),
(6, 'alo', ' jklm', 3, 1, 6, 3, '1811221668790170.png', '2022-11-18 15:49:30', '2022-11-19 11:46:16', 6, 6),
(7, 'testo', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor.', 8, 4, 11, 5600, '1911221668864343.png', '2022-11-19 12:25:43', '2022-11-19 12:25:43', 7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'user', ''),
(2, 'admin', '');

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
  `role_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `picture` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `role_id`, `created_at`, `updated_at`, `updated_by`, `picture`) VALUES
(2, 'aloaloaloalo', 'aloaloaloalo123456789', 'miso.abdo@gmail.com', '$2y$10$zEVJM/zhTl69kQmqw/iiB.Ke7e3XFiFPj5Xibf9xsF7N4tr5sSKMy', NULL, 1, '2022-11-15 18:01:49', '2022-11-18 19:21:49', 6, 'abdelghafour_aouad.jfif'),
(5, 'aloaloaloalo123456789', 'aloaloaloalo123456789', 'aloaloaloalo123456789@gmail.com', '$2y$10$p9HXC4oUArPcTH0Xk3SWNuXhHU3LloOstnCJfcMyGf3Fv52ecl1WW', NULL, 1, '2022-11-15 19:05:09', '2022-11-15 20:05:09', NULL, NULL),
(6, 'test123456789', 'test123456789', 'abdo@gmail.com', '$2y$10$63ArqWI0V4ndxfPn1zVCo.tpSsnT.ats5lFp4cP4GCCK0ug6lH7By', NULL, 2, '2022-11-16 20:55:08', '2022-11-18 19:25:57', 6, NULL),
(7, 'testo', 'testo', 'testo@gmail.com', '$2y$10$HkCKNpK4XbFDGg0ROZLScOFfgjYxS/ZgoItfZXcvQpUzUzizw2zd6', NULL, 1, '2022-11-19 12:24:44', '2022-11-19 13:24:44', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
