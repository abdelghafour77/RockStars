-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 nov. 2022 à 22:34
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `model`, `description`, `brands_id`, `categories_id`, `quantity`, `price`, `picture`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 'CFX', ' Crafted for the world’s biggest stages. Pure sound flows effortlessly from artist to piano to audience, filling the world’s most prestigious concert halls.\r\n\r\n', 1, 1, 9, 4999, '1911221668874796.jpg', '2022-11-19 15:19:56', '2022-11-19 15:19:56', 7, 7),
(9, 'CF6', ' The choice of mid-sized concert halls. Concert grand DNA, sound and resonance to make every performance bigger than the stage.', 1, 1, 5, 40800, '1911221668874881.jpg', '2022-11-19 15:21:21', '2022-11-20 16:54:40', 7, 2),
(10, 'STAR Maple Drum Kits', ' STAR is the new flagship line for TAMA drums. It takes the knowledge and research we cultivated for the Starclassic series to the next level, by reexamining every detail to enhance shell resonance.\r\nSTAR Maple shell\'s \"Solid Core Ply\" is a totally new design for this series. This unique shell provides the warm, open tone of Maple, combined with the rich, hearty sound of a solid ply shell.', 2, 4, 14, 1000, '1911221668875067.png', '2022-11-19 15:24:27', '2022-11-19 15:24:27', 7, 7),
(11, 'Cocktail-JAM Mini Kit', 'TAMA Cocktail-JAM Mini is a compact and easy-to-transport drum kit. Its drums are 2 inches smaller in diameter than the full-size Cocktail-JAM Kit. It is compact in size but very scalable, allowing you to add cymbals and cowbells by using our compact clamps and attachments. You can pack the entire kit and its hardware easily into just two bags, which are included with the kit. Also includes tom mounting arms and single bass drum pedal.', 2, 4, 21, 7600, '1911221668875171.png', '2022-11-19 15:26:11', '2022-11-19 15:26:11', 7, 7),
(12, 'Superstar Classic Drum Kits', ' For more than forty years, the Superstar name has stood for groundbreaking design, superior build quality, sterling tone, and clear projection. Superstar Classic once again upholds tradition by raising the bar for discerning drummers—and remarkably—does it at an extremely competitive price. Drawing on Superstar of the past, its classic TAMA T-shape badge and streamlined low-mass single lugs point to the simpler state of art of the 70\'s, while the ingenious Star-Mount system and new thinner gauge 100% maple shells eclipse anything in its class. Visually ravishing, the Gloss Lacebark Pine exterior ply possesses a complex wood grain pattern to give this kit an extraordinary visual appearance.', 2, 4, 4, 9980, '1911221668875293.png', '2022-11-19 15:28:13', '2022-11-19 15:28:13', 7, 7),
(13, 'Stage Custom Birch', ' As with the introduction of Stage Custom in 1995 YAMAHA once again sets the standards of value and sound. The new Stage Custom inherits 100% birch wood, with upgraded metal parts.', 1, 4, 6, 8600, '1911221668875562.png', '2022-11-19 15:32:42', '2022-11-19 15:32:42', 7, 7),
(14, 'V10SG', ' The V10SG is a set including V10G, case (VHC2), bow, and rosin.\r\n\r\n', 1, 6, 13, 5300, '1911221668875672.jpg', '2022-11-19 15:34:32', '2022-11-19 15:34:32', 7, 7),
(15, 'Les Paul Special', ' The Les Paul Special returns to the classic design that made it relevant, played and loved shaping sound across generations and genres of music. It pays tribute to Gibson\'s Golden Era of innovation and brings authenticity back to life. Originally introduced in 1955, the Les Paul Special has been embraced by musicians for over 60 years. It is based on the Les Paul Junior with a slab mahogany body, fat 50s-style mahogany neck, rosewood fingerboard, wraparound bridge, an additional rhythm P-90 pickup, binding on the neck and additional controls for the rhythm pickup and the 3-way toggle switch. Available in the always classic TV Yellow and Vintage Cherry.', 4, 3, 11, 1799, '1911221668875998.jpg', '2022-11-19 15:39:58', '2022-11-19 15:39:58', 7, 7),
(16, 'Les Paul Standard \'50s P-90.', ' The new Les Paul Standard returns to the classic design that made it famous. It pays tribute to Gibson\'s Golden Era of innovation and brings authenticity back to life. The Les Paul Standard 50s P-90 has a solid mahogany body with a maple top and a rounded 50s-style mahogany neck with a rosewood fingerboard and trapezoid inlays. It\'s equipped with an ABR-1, the classic-style Tune-O-Matic™ bridge, an aluminum Stop Bar tailpiece, Vintage Deluxe tuners with Keystone buttons, and aged gold Top Hat knobs. The classic P-90 pickups (neck and bridge) are loaded with Alnico 5 magnets, audio taper potentiometers, and Orange Drop® capacitors.', 4, 3, 7, 2799, '1911221668876088.jpg', '2022-11-19 15:41:28', '2022-11-19 15:41:28', 7, 7),
(17, 'SG Standard \'61', ' The SG Standard ‘61 returns to the classic design that made it relevant, played, and loved -- shaping sound across generations and genres of music. In 1961, the Les Paul™ model was put on hiatus and an all-new design evolved into what is today known as the SG™ or “solid guitar.” The Gibson SG Standard \'61 retains the styling of the original featuring a SlimTaper™ mahogany neck and a bound rosewood fingerboard. The mahogany body features deeply sculpted body scarfing, a 5-ply teardrop pickguard, and a 22nd-fret neck joint. The nickel-plated hardware includes a classic-style Tune-O-Matic™ bridge and Keystone tuners. The pickups are 60s Burstbucker™ humbuckers™ for a classic voice with added power and top end.  Controls feature audio taper potentiometers and Orange Drop® capacitor . . .', 4, 3, 8, 1999, '1911221668876214.jpg', '2022-11-19 15:43:34', '2022-11-19 15:43:34', 7, 7),
(18, 'J-185 Original', ' The J-185 is believed by many to be one of Gibson\'s best acoustic instruments, yet it seems to be fairly obscure, much to the delight of devoted Gibson lovers. Originally released in the early 1950s and designed to be slight smaller than its larger companion, the SJ-200, the J-185 still offers superior performance and tone. The J-185 Original maintains unsurpassed balance of lows, mids, and highs, with equal response to every note on the fretboard. Acclaimed by many as the perfect body size and shape for any player.', 4, 3, 14, 3749, '1911221668876338.jpg', '2022-11-19 15:45:38', '2022-11-19 15:45:38', 7, 7),
(19, 'AMERICAN VINTAGE II 1973 STRATOCASTER', ' The Fender® American Vintage II series presents a remarkably accurate take on the revolutionary designs that altered the course of musical history. Built with period-accurate bodies, necks and hardware, premium finishes and meticulously voiced, year-specific pickups, each instrument captures the essence of authentic Fender craftsmanship and tone.\r\n\r\n\r\nBy 1973, now-classic CBS design cues had become standard spec and were widely used by rock, funk, fusion and prog players around the world. Weekly late night music television shows like Don Kirshner’s Rock Concert, In concert and Midnight Special provided more exposure than ever for Fender instruments, further cementing the Stratocaster’s dominance as a pop culture phenomenon.\r\n\r\n\r\nThe American Vintage II 1973 Stratocaster® exudes the spirit of the era and is outfitted with a trio of Pure Vintage \'73 staggered pole pickups, a large headstock with dual string trees, a convenient “Bullet” style truss rod nut and a three-bolt neck plate with Micro-Tilt™ mechanism. The “C”-shape maple neck plays like a dream with a 7.25” radius rosewood or maple fingerboard and vintage tall frets. The guitar is offered in three classic colors over ash: Aged Natural, Lake Placid Blue and Mocha, the latter being the first custom color ever to feature a black pickguard on a Strat®. Additional features include vintage-style “F” stamped tuners and a synchronized tremolo with bent steel saddles and cold rolled steel block.\r\n\r\n\r\nThe instruments in the American Vintage II series are direct descendants of the original Fenders: designed for players with a fine appreciation for vintage Fender tone and feel and built with unmatched quality, down to the last screw. These are Fender electrics in their purest form: Fender American Vintage II, the stuff of legends.', 6, 3, 21, 2279, '2011221668963989.jpg', '2022-11-20 16:06:29', '2022-11-20 16:06:29', 2, 2),
(20, 'AERODYNE SPECIAL STRATOCASTER® HSS', ' The Aerodyne Special Series offers a contemporary take on classic Fender® designs. Distinctive aerodynamic lines, custom voiced pickups, state-of-the-art hardware, dazzling finishes, and unmistakable silhouettes combine to create instruments that are pure, purposeful, instantly familiar and radically new.\r\n\r\nThe Aerodyne Special Stratocaster® HSS features a sleek new look with vibrant colors adorning the elegantly bound basswood body and the matching headcap. A modern “C” shape satin finished neck with 12” radius fingerboard ensures effortless playability, while newly designed vintage-voiced Stratocaster pickups mated to a specially voiced humbucking bridge pickup and a Babicz® Z-Series FCH-2 Point Tremolo deliver a perfect balance of high-performance and classic Fender tone.\r\n\r\nThe made-in-Japan Aerodyne Special Stratocaster® HSS inspires with futuristic style, premium appointments and exceptional tone. The bold and original designs that inspired generations live on in the Aerodyne Special series.', 6, 3, 15, 1329, '2011221668964132.jpg', '2022-11-20 16:08:52', '2022-11-20 16:08:52', 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `role_id`, `created_at`, `updated_at`, `updated_by`, `picture`) VALUES
(2, 'abdelghafour', 'aouad', 'a.aouad@student.youcode.ma', '$2y$10$Ut.WQTnPFHg9qvZk..O7t.5i6bkqJgp.OxezV5RGHhzyq6oc.lwQa', '0620785937', 2, '2022-11-15 18:01:49', '2022-11-19 16:10:59', 7, 'abdelghafour_aouad.jfif'),
(5, 'amine', 'fathi', 'a.fathi@student.youcode.ma', '$2y$10$4.qtV4sHVr67RSnPCTqNAuBDZ6pXTgAdIaZSd7IU/wgMDGF5Di56S', '', 1, '2022-11-15 19:05:09', '2022-11-20 17:54:09', 8, NULL),
(6, 'ahmed ', 'abderrafie', 'ahmedabderrafie@gmail.com', '$2y$10$fsuZtroaeY8OYO/0ZY68e.ziAzA5FlqNyA/AN6IxML0J5opiDoNJq', '', 2, '2022-11-16 20:55:08', '2022-11-19 16:24:03', 2, NULL),
(8, 'salah eddine', 'hanaoui', 's.hanaoui@gmail.com', '$2y$10$yKDk2ap94wnk7htuJN/lV.41otPLu/XyzQDiaJehU2HnlMxd2q9BO', NULL, 1, '2022-11-20 17:53:04', '2022-11-20 18:53:04', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
