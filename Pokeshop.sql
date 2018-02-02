-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 fév. 2018 à 17:07
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
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pokemon` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `size` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6662DC90F3` (`pokemon`),
  KEY `IDX_23A0E66CF60E67C` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `pokemon`, `owner`, `size`, `weight`, `description`, `picture`, `price`, `created_at`) VALUES
(13, 1, 13, 0.7, 6.9, 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis la naissance.', '4c63737189a0612acd10598f71072aa7.png', 500, '2018-01-31 10:33:06'),
(14, 25, 13, 0.4, 6, 'Les jours d\'orages, on peut apercevoir des Pikachu regroupés en haut des arbres ou des poteaux. Ces Pokémons attendent patiemment que la foudre leur tombe dessus, pour pouvoir recharger au maximum leur réserve d\'électricité. Quand il attaque, des milliers de volts sortent par ses joues rouges.', '287ca48dd7cf93b01484b49109607000.png', 1200, '2018-01-31 10:47:18'),
(15, 6, 14, 1.4, 90.5, 'Pokémon noble, Dracaufeu est aussi réputé pour avoir sale caractère. Il crache d\'impressionnants jets de flammes, et ses ailes lui permettent de voler à 1400 mètres d\'altitude. Cependant, si son dresseur possède assez de détermination pour lui prouver que c\'est lui le maître, il peut devenir extrêmement puissant.', '20391d8401f2482ebc636f0bcec71465.png', 3700, '2018-01-31 13:47:25'),
(16, 35, 14, 0.6, 7.5, 'Mélofée est un Pokémon rare, qui vit uniquement sur le Mont Sélénite, à Kanto. Il est bizarrement apparut juste après qu\'une météorite se soit écrasée dessus, c\'est pourquoi les scientifiques pensent qu\'il est d\'origine extra-terrestre. Mignon, c\'est un ennemi redoutable, car son attaque Métronome est totalement imprévisible.', '1252d4ae22fd575b358535b8abdc9c96.png', 1600, '2018-01-31 13:50:59'),
(17, 77, 14, 1, 30, 'Peu de temps après la naissance, Ponyta est capable de courir aussi vite que sa mère. Courir le rend heureux, sa crinière s\'embrase joyeusement quand il galope. Si son maître ne le fait pas suffisamment défouler, il dépérit rapidement. S\'il se fait agresser, les sabots de Ponyta peuvent fracasser le crâne de son adversaire.', 'da3197299734227f765bff4f274675c4.png', 2100, '2018-01-31 13:56:13'),
(20, 7, 19, 0.5, 9, 'Les bébés Carapuce sont extrêmement vulnérables à la naissance, car leur carapace est toute molle. C\'est pourquoi ils boivent régulièrement une eau riche en minéraux. Elle devient ensuite dure comme de la pierre. S\'il est menacé, il se réfugie à l\'intérieur et envoie un jet d\'eau à son agresseur.', 'c6f54599721f5b4428e2a67e9834727b.png', 600, '2018-01-31 14:37:14'),
(22, 12, 19, 1.1, 32, 'Grand amateur de nectar et de miel, Papilusion n\'est pas aussi inoffensif qu\'il n\'en a l\'air. Beaucoup de personnes s\'approchent de ce Pokémon sans savoir que ses ailes sont recouvertes d\'une puissante poudre toxique imperméable. Il maîtrise parfaitement toutes les poudres nocives, comme la Para-spore ou la Poudre toxik.', 'fd7d6b6bbca93d5c94f2503f724f8b64.png', 2600, '2018-01-31 14:41:38'),
(23, 38, 13, 1.1, 19.9, 'Feunard a longtemps été vénéré, car les gens pensaient qu\'il était légendaire. C\'est un Pokémon gracieux, dont les nombreuses queues se balancent au rythme de ses pas légers. Beaucoup de dresseurs convoitent Feunard, pour sa beauté et pour sa puissance au combat.', '1662664120f9dd89d705bdd20ecd68c3.png', 3000, '2018-01-31 16:15:57'),
(24, 112, 13, 1.9, 120, 'Rhinoféros acquiert plus d\'intelligence à l\'évolution. Sa peau est encore plus dure que de la pierre, un boulet de canon ne lui ferait même pas une égratignure, et il peut même prendre un bain de lave si ça lui chante. La corne sur le nez de Rhinoféros peut tourner très rapidement, il s\'en sert pour forer les montagnes.', '39d0cdfdc055b0aedf0c165b99bd6d06.png', 2100, '2018-01-31 16:17:46'),
(25, 24, 14, 3.5, 65, 'Non content de posséder un poison pouvant tuer 2 Wailords, Arbok tue ses proies en les enserrant dans ses anneaux. Sa force colossale lui permet de broyer les os de ses pauvres victimes. Si vous voyez un Arbok enroulé sur lui-même, ne le croyez pas endormi : il vous mordrait instantanément si vous l\'approchiez.', '54cf38f3140a504b4c69d948c4ac226e.png', 2300, '2018-01-31 16:19:01'),
(26, 15, 19, 1, 29.5, 'Dardargnan est extrêmement territorial. Si quelqu\'un s\'approche de son arbre, il attaque en bande, poursuivant sans relâche l\'intrus. Ce Pokémon est un véritable fléau : ses trois dards injectent un poison mortel. Le pire est celui de sa queue, plus foudroyant que les deux autres.', 'b9605dd44d803ca9853caa506b1731d0.png', 2000, '2018-01-31 16:20:39'),
(27, 68, 13, 1.6, 130, 'Mackogneur a tellement besoin de détendre ses muscles qu\'il a tendance à taper d\'abord, et réfléchir ensuite. C\'est le Pokémon le plus fort qui existe à ce jour, soulever une maison ne lui fait pas peur. Mais il est incapable de passer une aiguille dans un fil car ses bras s\'emmêlent dès qu\'il doit faire un travail délicat.', 'b496d8d7a018fe460f1b0358b9693895.png', 3800, '2018-02-01 16:30:57'),
(28, 19, 23, 0.7, 18.5, 'Rattatac est constamment obligé de ronger du bois, des cailloux et même parfois des murs pour éviter que ses dents, qui poussent en permanence, ne soient trop grandes. En combat, il est passé maître dans la terrible attaque Croc-fatal, mieux vaut utiliser contre lui un pokémon roche ou acier.', '312a35a18efcb721e2f8ec1a914260db.png', 1250, '2018-02-02 16:39:43'),
(29, 26, 23, 0.8, 30, 'Un Raichu est un Pikachu qui a été exposé à une Pierrefoudre. Sa longue queue en balancier lui est vitale, car quand il est trop chargé en électricité, il la plante dans le sol et diffuse son surplus d\'électricité. Raichu préfère largement le combat à distance : il n\'attaque qu\'avec des attaques électriques. Mais un Plaquage peut survenir n\'importe quand.', 'f3f55b3c551ecca5ce91c70d9063b1e7.png', 1650, '2018-02-02 16:44:20'),
(30, 65, 23, 1.2, 48, 'Alakazam est un Pokémon qui n\'aime pas l\'effort physique. Il utilise sa Télékinésie pour toutes ses actions : manger, amener un objet à lui… Les scientifiques on démontré que si Alakazam utilisait des cuillères à café plutôt que des cuillères à soupes, leur pouvoir était moins puissant.', 'e4a11d9efe6c10f9a55132b041ee133a.png', 3950, '2018-02-02 16:47:21'),
(31, 51, 23, 0.7, 33.3, 'Comme les Magnétons, les Triopikeur sont une association de trois Taupiqueur. Ils creusent beaucoup plus rapidement, et peuvent parfois, s\'ils sont courroucés, lancer un puissant Séisme. Si une arène est en béton, un dresseur ne pourras pas utiliser son Triopikeur car, ne pouvant pas creuser, il refusera de sortir de sa Pokéball.', '724f8679b200a046dd125677a1e2027c.png', 2500, '2018-02-02 16:48:49'),
(32, 130, 23, 6.5, 305, 'Terrifiant et puissant, Leviator peut rentrer dans des aspects de rage terrifiant : raser une ville entière ne lui fait pas peur, et de nombreux récit historiques racontent que pendant les guerres, il apparaissait et rasait des régions entières.. Personne ne sait expliquer comment un ridicule Magicarpe peut se transformer en un monstre si terrible.', 'dbc37299792aff7a4681851b48d1ab9f.png', 3900, '2018-02-02 16:49:49');

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`article_id`),
  KEY `IDX_2246507BA76ED395` (`user_id`),
  KEY `IDX_2246507B7294869C` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`user_id`, `article_id`) VALUES
(13, 15),
(13, 20),
(13, 30),
(14, 14),
(14, 29),
(19, 31),
(23, 14),
(23, 20);

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

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `money` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_active`, `money`, `picture`, `sale`, `purchase`) VALUES
(13, 'Thomas', '$2y$13$eP5hgvwS4tZ7y1reXL0WSeBn8zfCRSdPTDvSaeHzlCEDGkNWy2Tyy', 'toto@gmail.com', 1, 10000, '134bb54fc695e9e1e6fbd3270ef45b27.png', 0, 0),
(14, 'Kristen', '$2y$13$qKWNicrGJsfxhF7TSZNykuLn/c2F1fwZaPThm3CcXXuyqcM.qU65y', 'k@gmail.com', 1, 2500, '32b46871e1625ed037200ed4e617dd8b.png', 0, 0),
(19, 'Jesse', '$2y$13$Hrq2pAwn9ddinus/3BVPM.5Uj50CJ1amOBXpNX6zj9DrO8trqRikS', 'j@gmail.com', 1, 1000, '05fb7b328015897c87a5e20691dfad03.png', 0, 0),
(23, 'Daisy', '$2y$13$FhubryEl3L4QlcQ.16TUZuBzC/KUeSDhgd0Azt/leHH8vXZy/2UlS', 'd@gmail.com', 1, 100, '2cb3e9a6cf2576a4e7d0cef3c459e296.png', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_pokemons_favorites`
--

DROP TABLE IF EXISTS `users_pokemons_favorites`;
CREATE TABLE IF NOT EXISTS `users_pokemons_favorites` (
  `user_id` int(11) NOT NULL,
  `pokemon_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`pokemon_id`),
  KEY `IDX_B480F5B3A76ED395` (`user_id`),
  KEY `IDX_B480F5B32FE71C3E` (`pokemon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_pokemons_favorites`
--

INSERT INTO `users_pokemons_favorites` (`user_id`, `pokemon_id`) VALUES
(13, 24),
(13, 25),
(13, 65),
(14, 1),
(14, 12),
(14, 15),
(14, 25),
(14, 38),
(19, 51),
(23, 12),
(23, 25),
(23, 26),
(23, 65);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6662DC90F3` FOREIGN KEY (`pokemon`) REFERENCES `pokemon` (`id`),
  ADD CONSTRAINT `FK_23A0E66CF60E67C` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `FK_2246507B7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2246507BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_pokemons_favorites`
--
ALTER TABLE `users_pokemons_favorites`
  ADD CONSTRAINT `FK_B480F5B32FE71C3E` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B480F5B3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
