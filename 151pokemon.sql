-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 jan. 2018 à 10:45
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokeshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_62DC90F396901F54` (`number`),
  UNIQUE KEY `UNIQ_62DC90F35E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `number`, `name`, `type1`, `type2`) VALUES
(1, 1, 'bulbasaur', 'poison', 'grass'),
(2, 2, 'ivysaur', 'poison', 'grass'),
(3, 3, 'venusaur', 'poison', 'grass'),
(4, 4, 'charmander', 'fire', NULL),
(5, 5, 'charmeleon', 'fire', NULL),
(6, 6, 'charizard', 'flying', 'fire'),
(7, 7, 'squirtle', 'water', NULL),
(8, 8, 'wartortle', 'water', NULL),
(9, 9, 'blastoise', 'water', NULL),
(10, 10, 'caterpie', 'bug', NULL),
(11, 11, 'metapod', 'bug', NULL),
(12, 12, 'butterfree', 'flying', 'bug'),
(13, 13, 'weedle', 'poison', 'bug'),
(14, 14, 'kakuna', 'poison', 'bug'),
(15, 15, 'beedrill', 'poison', 'bug'),
(16, 16, 'pidgey', 'flying', 'normal'),
(17, 17, 'pidgeotto', 'flying', 'normal'),
(18, 18, 'pidgeot', 'flying', 'normal'),
(19, 19, 'rattata', 'normal', NULL),
(20, 20, 'raticate', 'normal', NULL),
(21, 21, 'spearow', 'flying', 'normal'),
(22, 22, 'fearow', 'flying', 'normal'),
(23, 23, 'ekans', 'poison', NULL),
(24, 24, 'arbok', 'poison', NULL),
(25, 25, 'pikachu', 'electric', NULL),
(26, 26, 'raichu', 'electric', NULL),
(27, 27, 'sandshrew', 'ground', NULL),
(28, 28, 'sandslash', 'ground', NULL),
(29, 29, 'nidoran-f', 'poison', NULL),
(30, 30, 'nidorina', 'poison', NULL),
(31, 31, 'nidoqueen', 'ground', 'poison'),
(32, 32, 'nidoran-m', 'poison', NULL),
(33, 33, 'nidorino', 'poison', NULL),
(34, 34, 'nidoking', 'ground', 'poison'),
(35, 35, 'clefairy', 'fairy', NULL),
(36, 36, 'clefable', 'fairy', NULL),
(37, 37, 'vulpix', 'fire', NULL),
(38, 38, 'ninetales', 'fire', NULL),
(39, 39, 'jigglypuff', 'fairy', 'normal'),
(40, 40, 'wigglytuff', 'fairy', 'normal'),
(41, 41, 'zubat', 'flying', 'poison'),
(42, 42, 'golbat', 'flying', 'poison'),
(43, 43, 'oddish', 'poison', 'grass'),
(44, 44, 'gloom', 'poison', 'grass'),
(45, 45, 'vileplume', 'poison', 'grass'),
(46, 46, 'paras', 'grass', 'bug'),
(47, 47, 'parasect', 'grass', 'bug'),
(48, 48, 'venonat', 'poison', 'bug'),
(49, 49, 'venomoth', 'poison', 'bug'),
(50, 50, 'diglett', 'ground', NULL),
(51, 51, 'dugtrio', 'ground', NULL),
(52, 52, 'meowth', 'normal', NULL),
(53, 53, 'persian', 'normal', NULL),
(54, 54, 'psyduck', 'water', NULL),
(55, 55, 'golduck', 'water', NULL),
(56, 56, 'mankey', 'fighting', NULL),
(57, 57, 'primeape', 'fighting', NULL),
(58, 58, 'growlithe', 'fire', NULL),
(59, 59, 'arcanine', 'fire', NULL),
(60, 60, 'poliwag', 'water', NULL),
(61, 61, 'poliwhirl', 'water', NULL),
(62, 62, 'poliwrath', 'fighting', 'water'),
(63, 63, 'abra', 'psychic', NULL),
(64, 64, 'kadabra', 'psychic', NULL),
(65, 65, 'alakazam', 'psychic', NULL),
(66, 66, 'machop', 'fighting', NULL),
(67, 67, 'machoke', 'fighting', NULL),
(68, 68, 'machamp', 'fighting', NULL),
(69, 69, 'bellsprout', 'poison', 'grass'),
(70, 70, 'weepinbell', 'poison', 'grass'),
(71, 71, 'victreebel', 'poison', 'grass'),
(72, 72, 'tentacool', 'poison', 'water'),
(73, 73, 'tentacruel', 'poison', 'water'),
(74, 74, 'geodude', 'ground', 'rock'),
(75, 75, 'graveler', 'ground', 'rock'),
(76, 76, 'golem', 'ground', 'rock'),
(77, 77, 'ponyta', 'fire', NULL),
(78, 78, 'rapidash', 'fire', NULL),
(79, 79, 'slowpoke', 'psychic', 'water'),
(80, 80, 'slowbro', 'psychic', 'water'),
(81, 81, 'magnemite', 'steel', 'electric'),
(82, 82, 'magneton', 'steel', 'electric'),
(83, 83, 'farfetchd', 'flying', 'normal'),
(84, 84, 'doduo', 'flying', 'normal'),
(85, 85, 'dodrio', 'flying', 'normal'),
(86, 86, 'seel', 'water', NULL),
(87, 87, 'dewgong', 'ice', 'water'),
(88, 88, 'grimer', 'poison', NULL),
(89, 89, 'muk', 'poison', NULL),
(90, 90, 'shellder', 'water', NULL),
(91, 91, 'cloyster', 'ice', 'water'),
(92, 92, 'gastly', 'poison', 'ghost'),
(93, 93, 'haunter', 'poison', 'ghost'),
(94, 94, 'gengar', 'poison', 'ghost'),
(95, 95, 'onix', 'ground', 'rock'),
(96, 96, 'drowzee', 'psychic', NULL),
(97, 97, 'hypno', 'psychic', NULL),
(98, 98, 'krabby', 'water', NULL),
(99, 99, 'kingler', 'water', NULL),
(100, 100, 'voltorb', 'electric', NULL),
(101, 101, 'electrode', 'electric', NULL),
(102, 102, 'exeggcute', 'psychic', 'grass'),
(103, 103, 'exeggutor', 'psychic', 'grass'),
(104, 104, 'cubone', 'ground', NULL),
(105, 105, 'marowak', 'ground', NULL),
(106, 106, 'hitmonlee', 'fighting', NULL),
(107, 107, 'hitmonchan', 'fighting', NULL),
(108, 108, 'lickitung', 'normal', NULL),
(109, 109, 'koffing', 'poison', NULL),
(110, 110, 'weezing', 'poison', NULL),
(111, 111, 'rhyhorn', 'rock', 'ground'),
(112, 112, 'rhydon', 'rock', 'ground'),
(113, 113, 'chansey', 'normal', NULL),
(114, 114, 'tangela', 'grass', NULL),
(115, 115, 'kangaskhan', 'normal', NULL),
(116, 116, 'horsea', 'water', NULL),
(117, 117, 'seadra', 'water', NULL),
(118, 118, 'goldeen', 'water', NULL),
(119, 119, 'seaking', 'water', NULL),
(120, 120, 'staryu', 'water', NULL),
(121, 121, 'starmie', 'psychic', 'water'),
(122, 122, 'mr-mime', 'fairy', 'psychic'),
(123, 123, 'scyther', 'flying', 'bug'),
(124, 124, 'jynx', 'psychic', 'ice'),
(125, 125, 'electabuzz', 'electric', NULL),
(126, 126, 'magmar', 'fire', NULL),
(127, 127, 'pinsir', 'bug', NULL),
(128, 128, 'tauros', 'normal', NULL),
(129, 129, 'magikarp', 'water', NULL),
(130, 130, 'gyarados', 'flying', 'water'),
(131, 131, 'lapras', 'ice', 'water'),
(132, 132, 'ditto', 'normal', NULL),
(133, 133, 'eevee', 'normal', NULL),
(134, 134, 'vaporeon', 'water', NULL),
(135, 135, 'jolteon', 'electric', NULL),
(136, 136, 'flareon', 'fire', NULL),
(137, 137, 'porygon', 'normal', NULL),
(138, 138, 'omanyte', 'water', 'rock'),
(139, 139, 'omastar', 'water', 'rock'),
(140, 140, 'kabuto', 'water', 'rock'),
(141, 141, 'kabutops', 'water', 'rock'),
(142, 142, 'aerodactyl', 'flying', 'rock'),
(143, 143, 'snorlax', 'normal', NULL),
(144, 144, 'articuno', 'flying', 'ice'),
(145, 145, 'zapdos', 'flying', 'electric'),
(146, 146, 'moltres', 'flying', 'fire'),
(147, 147, 'dratini', 'dragon', NULL),
(148, 148, 'dragonair', 'dragon', NULL),
(149, 149, 'dragonite', 'flying', 'dragon'),
(150, 150, 'mewtwo', 'psychic', NULL),
(151, 151, 'mew', 'psychic', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
