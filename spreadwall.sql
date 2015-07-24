-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Juin 2015 à 11:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `spreadwall`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_55026B0C12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `category_id`, `name`, `slug`, `detail`, `parent`) VALUES
(1, 1, 'Interprète', 'interprete', 'Regroupe tous les interprètes musicaux', 1),
(2, 1, 'Auteur', 'auteur', 'Regroupe tous les auteurs musicaux', 1),
(3, 1, 'Compositeur', 'compositeur', 'Regroupe tous les compositeurs musicaux', 1),
(4, 1, 'DJ', 'dj', 'Regroupe tous les DJs', 1),
(5, 1, 'Identité sonore', 'identite-sonore', 'Regroupe toutes les identités sonores', 1),
(6, 1, 'Label', 'label', 'Regroupe tous les labels musicaux', 1),
(7, 1, 'Groupe', 'groupe', 'Regroupe tous les groupes musicaux', 1),
(8, 2, 'Danseur', 'danseur', 'Regroupe tous les danseur', 2),
(9, 2, 'One man/woman show', 'one-man-woman-show', 'Regroupe tous les acteurs du standup', 2),
(10, 2, 'Sketch', 'sketch', 'Regroupe tous les comédiens', 2),
(11, 2, 'Conteur', 'conteur', 'Regroupe tous les conteurs', 2),
(12, 2, 'Magicien', 'magicien', 'Regroupe toutes les magiciens', 2),
(13, 2, 'Acrobate', 'acrobate', 'Regroupe tous les acrobates', 2),
(14, 2, 'Jongleur', 'jongleur', 'Regroupe tous les jongleurs', 2),
(15, 2, 'Spectacle enfant', 'spectacle-enfant', 'Réunis tous les artistes pour enfant', 2),
(16, 2, 'Spectacle animaux', 'spectacle-animaux', 'Réunis tous les artistes avec leurs animaux', 2),
(17, 2, 'auteur', 'auteur', 'Réunis tous les auteurs de show', 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `detail`) VALUES
(1, 'Musique', 'musique', 'Regroupe tous les musiciens.'),
(2, 'Show', 'show', 'Regroupe tous les "showmans".'),
(3, 'Edition', 'edition', 'Regroupe tous les artistes en lien avec l''édition.'),
(4, 'Cinéma', 'cinema', 'Regroupe tous les réalisateurs.'),
(5, 'Peinture', 'peinture', 'Regroupe tous les artistes peintres'),
(6, 'Image', 'image', 'Regroupe tous les artistes en lien avec l''image'),
(7, 'Créateur', 'createur', 'Regroupe tous les créateurs');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `path`, `name`, `mime_type`, `size`) VALUES
(1, 'uploads/avatar/554cb5a62b4b5.png', 'avatar de Lotfi', 'image/png', '14927'),
(2, 'uploads/avatar/554cbc8fa35a7.jpg', 'avatar de Coralie', 'image/jpeg', '26591'),
(3, 'uploads/avatar/554cd272e398f.jpg', 'avatar de Lotfi', 'image/jpeg', '25429');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `name`, `role`) VALUES
(1, 'Administrateur', 'ROLE_ADMIN'),
(2, 'Artiste', 'ROLE_ARTIST'),
(3, 'Diffuseur', 'ROLE_DIFF'),
(4, 'Membre', 'ROLE_USER');

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

CREATE TABLE IF NOT EXISTS `style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F27C976E81C06096` (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=163 ;

--
-- Contenu de la table `style`
--

INSERT INTO `style` (`id`, `activity_id`, `name`, `slug`, `detail`, `parent`) VALUES
(1, 1, 'Pop', 'pop', 'Tous les artistes pop', 1),
(2, 1, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 1),
(3, 1, 'Slam', 'slam', 'Tous les artistes slam', 1),
(4, 1, 'Rock', 'rock', 'Tous les artistes rock', 1),
(5, 1, 'Country', 'country', 'Tous les artistes country', 1),
(6, 1, 'Latin', 'latin', 'Tous les artistes latin', 1),
(7, 1, 'R&B', 'r-b', 'Tous les artistes R&B', 1),
(8, 1, 'Electronique', 'electronique', 'Tous les artistes électronique', 1),
(9, 1, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 1),
(10, 1, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 1),
(11, 1, 'Techno', 'techno', 'Tous les artistes techno', 1),
(12, 1, 'Dance', 'dance', 'Tous les artistes dance', 1),
(13, 1, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 1),
(14, 1, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 1),
(15, 1, 'Metal', 'metal', 'Tous les artistes metal', 1),
(16, 1, 'Reggae', 'reggae', 'Tous les artistes reggae', 1),
(17, 1, 'Blues', 'blues', 'Tous les artistes blues', 1),
(18, 1, 'Religious', 'religious', 'Tous les artistes religious', 1),
(19, 1, 'Jazz', 'jazz', 'Tous les artistes jazz', 1),
(20, 1, 'Classical', 'classical', 'Tous les artistes pop', 1),
(22, 1, 'Folk', 'folk', 'Tous les artistes folk', 1),
(23, 1, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 1),
(24, 1, 'Various', 'various', 'Tous les artistes various', 1),
(25, 2, 'Pop', 'pop', 'Tous les artistes pop', 2),
(26, 2, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 2),
(27, 2, 'Slam', 'slam', 'Tous les artistes slam', 2),
(28, 2, 'Rock', 'rock', 'Tous les artistes rock', 2),
(29, 2, 'Country', 'country', 'Tous les artistes country', 2),
(30, 2, 'Latin', 'latin', 'Tous les artistes latin', 2),
(31, 2, 'R&B', 'r-b', 'Tous les artistes R&B', 2),
(32, 2, 'Electronique', 'electronique', 'Tous les artistes électronique', 2),
(33, 2, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 2),
(34, 2, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 2),
(35, 2, 'Techno', 'techno', 'Tous les artistes techno', 2),
(36, 2, 'Dance', 'dance', 'Tous les artistes dance', 2),
(37, 2, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 2),
(38, 2, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 2),
(39, 2, 'Metal', 'metal', 'Tous les artistes metal', 2),
(40, 2, 'Reggae', 'reggae', 'Tous les artistes reggae', 2),
(41, 2, 'Blues', 'blues', 'Tous les artistes blues', 2),
(42, 2, 'Religious', 'religious', 'Tous les artistes religious', 2),
(43, 2, 'Jazz', 'jazz', 'Tous les artistes jazz', 2),
(44, 2, 'Classical', 'classical', 'Tous les artistes pop', 2),
(45, 2, 'Folk', 'folk', 'Tous les artistes folk', 2),
(46, 2, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 2),
(47, 2, 'Various', 'various', 'Tous les artistes various', 2),
(48, 3, 'Pop', 'pop', 'Tous les artistes pop', 3),
(49, 3, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 3),
(50, 3, 'Slam', 'slam', 'Tous les artistes slam', 3),
(51, 3, 'Rock', 'rock', 'Tous les artistes rock', 3),
(52, 3, 'Country', 'country', 'Tous les artistes country', 3),
(53, 3, 'Latin', 'latin', 'Tous les artistes latin', 3),
(54, 3, 'R&B', 'r-b', 'Tous les artistes R&B', 3),
(55, 3, 'Electronique', 'electronique', 'Tous les artistes électronique', 3),
(56, 3, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 3),
(57, 3, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 3),
(58, 3, 'Techno', 'techno', 'Tous les artistes techno', 3),
(59, 3, 'Dance', 'dance', 'Tous les artistes dance', 3),
(60, 3, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 3),
(61, 3, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 3),
(62, 3, 'Metal', 'metal', 'Tous les artistes metal', 3),
(63, 3, 'Reggae', 'reggae', 'Tous les artistes reggae', 3),
(64, 3, 'Blues', 'blues', 'Tous les artistes blues', 3),
(65, 3, 'Religious', 'religious', 'Tous les artistes religious', 3),
(66, 3, 'Jazz', 'jazz', 'Tous les artistes jazz', 3),
(67, 3, 'Classical', 'classical', 'Tous les artistes pop', 3),
(68, 3, 'Folk', 'folk', 'Tous les artistes folk', 3),
(69, 3, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 3),
(70, 3, 'Various', 'various', 'Tous les artistes various', 3),
(71, 4, 'Pop', 'pop', 'Tous les artistes pop', 4),
(72, 4, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 4),
(73, 4, 'Slam', 'slam', 'Tous les artistes slam', 4),
(74, 4, 'Rock', 'rock', 'Tous les artistes rock', 4),
(75, 4, 'Country', 'country', 'Tous les artistes country', 4),
(76, 4, 'Latin', 'latin', 'Tous les artistes latin', 4),
(77, 4, 'R&B', 'r-b', 'Tous les artistes R&B', 4),
(78, 4, 'Electronique', 'electronique', 'Tous les artistes électronique', 4),
(79, 4, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 4),
(80, 4, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 4),
(81, 4, 'Techno', 'techno', 'Tous les artistes techno', 4),
(82, 4, 'Dance', 'dance', 'Tous les artistes dance', 4),
(83, 4, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 4),
(84, 4, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 4),
(85, 4, 'Metal', 'metal', 'Tous les artistes metal', 4),
(86, 4, 'Reggae', 'reggae', 'Tous les artistes reggae', 4),
(87, 4, 'Blues', 'blues', 'Tous les artistes blues', 4),
(88, 4, 'Religious', 'religious', 'Tous les artistes religious', 4),
(89, 4, 'Jazz', 'jazz', 'Tous les artistes jazz', 4),
(90, 4, 'Classical', 'classical', 'Tous les artistes pop', 4),
(91, 4, 'Folk', 'folk', 'Tous les artistes folk', 4),
(92, 4, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 4),
(93, 4, 'Various', 'various', 'Tous les artistes various', 4),
(94, 5, 'Pop', 'pop', 'Tous les artistes pop', 5),
(95, 5, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 5),
(96, 5, 'Slam', 'slam', 'Tous les artistes slam', 5),
(97, 5, 'Rock', 'rock', 'Tous les artistes rock', 5),
(98, 5, 'Country', 'country', 'Tous les artistes country', 5),
(99, 5, 'Latin', 'latin', 'Tous les artistes latin', 5),
(100, 5, 'R&B', 'r-b', 'Tous les artistes R&B', 5),
(101, 5, 'Electronique', 'electronique', 'Tous les artistes électronique', 5),
(102, 5, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 5),
(103, 5, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 5),
(104, 5, 'Techno', 'techno', 'Tous les artistes techno', 5),
(105, 5, 'Dance', 'dance', 'Tous les artistes dance', 5),
(106, 5, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 5),
(107, 5, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 5),
(108, 5, 'Metal', 'metal', 'Tous les artistes metal', 5),
(109, 5, 'Reggae', 'reggae', 'Tous les artistes reggae', 5),
(110, 5, 'Blues', 'blues', 'Tous les artistes blues', 5),
(111, 5, 'Religious', 'religious', 'Tous les artistes religious', 5),
(112, 5, 'Jazz', 'jazz', 'Tous les artistes jazz', 5),
(113, 5, 'Classical', 'classical', 'Tous les artistes pop', 5),
(114, 5, 'Folk', 'folk', 'Tous les artistes folk', 5),
(115, 5, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 5),
(116, 5, 'Various', 'various', 'Tous les artistes various', 5),
(117, 6, 'Pop', 'pop', 'Tous les artistes pop', 6),
(118, 6, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 6),
(119, 6, 'Slam', 'slam', 'Tous les artistes slam', 6),
(120, 6, 'Rock', 'rock', 'Tous les artistes rock', 6),
(121, 6, 'Country', 'country', 'Tous les artistes country', 6),
(122, 6, 'Latin', 'latin', 'Tous les artistes latin', 6),
(123, 6, 'R&B', 'r-b', 'Tous les artistes R&B', 6),
(124, 6, 'Electronique', 'electronique', 'Tous les artistes électronique', 6),
(125, 6, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 6),
(126, 6, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 6),
(127, 6, 'Techno', 'techno', 'Tous les artistes techno', 6),
(128, 6, 'Dance', 'dance', 'Tous les artistes dance', 6),
(129, 6, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 6),
(130, 6, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 6),
(131, 6, 'Metal', 'metal', 'Tous les artistes metal', 6),
(132, 6, 'Reggae', 'reggae', 'Tous les artistes reggae', 6),
(133, 6, 'Blues', 'blues', 'Tous les artistes blues', 6),
(134, 6, 'Religious', 'religious', 'Tous les artistes religious', 6),
(135, 6, 'Jazz', 'jazz', 'Tous les artistes jazz', 6),
(136, 6, 'Classical', 'classical', 'Tous les artistes pop', 6),
(137, 6, 'Folk', 'folk', 'Tous les artistes folk', 6),
(138, 6, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 6),
(139, 6, 'Various', 'various', 'Tous les artistes various', 6),
(140, 7, 'Pop', 'pop', 'Tous les artistes pop', 7),
(141, 7, 'Rap & HipHop', 'rap-hiphop', 'Tous les artistes rap hiphop', 7),
(142, 7, 'Slam', 'slam', 'Tous les artistes slam', 7),
(143, 7, 'Rock', 'rock', 'Tous les artistes rock', 7),
(144, 7, 'Country', 'country', 'Tous les artistes country', 7),
(145, 7, 'Latin', 'latin', 'Tous les artistes latin', 7),
(146, 7, 'R&B', 'r-b', 'Tous les artistes R&B', 7),
(147, 7, 'Electronique', 'electronique', 'Tous les artistes électronique', 7),
(148, 7, 'Electro & Minimal', 'electro-minimal', 'Tous les artistes electro & minimal', 7),
(149, 7, 'House & Deep House', 'house-deep-house', 'Tous les artistes house & deep house', 7),
(150, 7, 'Techno', 'techno', 'Tous les artistes techno', 7),
(151, 7, 'Dance', 'dance', 'Tous les artistes dance', 7),
(152, 7, 'Trip Hop', 'trip-hop', 'Tous les artistes trip hop', 7),
(153, 7, 'Alternative/Indie Rock', 'alternative-indie-rock', 'Tous les artistes alternative/indie rock', 7),
(154, 7, 'Metal', 'metal', 'Tous les artistes metal', 7),
(155, 7, 'Reggae', 'reggae', 'Tous les artistes reggae', 7),
(156, 7, 'Blues', 'blues', 'Tous les artistes blues', 7),
(157, 7, 'Religious', 'religious', 'Tous les artistes religious', 7),
(158, 7, 'Jazz', 'jazz', 'Tous les artistes jazz', 7),
(159, 7, 'Classical', 'classical', 'Tous les artistes pop', 7),
(160, 7, 'Folk', 'folk', 'Tous les artistes folk', 7),
(161, 7, 'Chanson française', 'chanson-francaise', 'Tous les artistes chanson française', 7),
(162, 7, 'Various', 'various', 'Tous les artistes various', 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_facebook` int(11) DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` smallint(6) NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `biography` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649EA9FDD75` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `id_facebook`, `lastname`, `firstname`, `slug`, `email`, `gender`, `password`, `username`, `birthdate`, `address`, `postalcode`, `city`, `country`, `telephone`, `biography`, `created_at`, `salt`, `is_active`, `media_id`) VALUES
(1, NULL, 'BER-RAHAL', 'Lotfi', 'lotfi', 'lotfi.berrahal@laposte.net', 1, '3ce54e72605774188a462c91aa4b4c88b115889bf37f0b0da7d16f578012cb3f6d3417136a04251918d327859a0615a59f317be779813d7c5eb9b4090f2a051b', 'Underscreen', '1982-09-19 00:00:00', 'le pinay', 42330, 'aveizieux', 'France', '0667358147', NULL, '2015-05-03 14:37:28', 's29s1yesnpc08gssg4cowo0wwkw8wk8', 1, 3),
(2, NULL, 'ROYON', 'Coralie', 'coralie', 'coralie@laposte.net', 2, '73c651d0bd702f009954faed73c814b6bc0b61fc1b666022e082e7ac646220af57a3e618b4aae810e9fc843c574574530d2ec7ffc352ca2f3badab70f9c64c0d', 'Chérinette', '1986-10-12 00:00:00', 'le pinay', 42330, 'aveizieux', 'France', '0667358147', NULL, '2015-05-03 20:09:14', '72fay7part0kccgko0c480cksg8w00o', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_activity`
--

CREATE TABLE IF NOT EXISTS `user_activity` (
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`activity_id`),
  KEY `IDX_4CF9ED5AA76ED395` (`user_id`),
  KEY `IDX_4CF9ED5A81C06096` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_category`
--

CREATE TABLE IF NOT EXISTS `user_category` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`category_id`),
  KEY `IDX_E6C1FDC1A76ED395` (`user_id`),
  KEY `IDX_E6C1FDC112469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `FK_55026B0C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `style`
--
ALTER TABLE `style`
  ADD CONSTRAINT `FK_F27C976E81C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Contraintes pour la table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `FK_4CF9ED5A81C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4CF9ED5AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `FK_E6C1FDC112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E6C1FDC1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
