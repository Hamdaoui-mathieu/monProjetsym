-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 24 juil. 2023 à 13:51
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `thedistrict`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `image`, `active`) VALUES
(196, 'Pizza', 'pizza_cat.jpg', 1),
(197, 'Burger', 'burger_cat.jpg', 1),
(198, 'Wraps', 'wrap_cat.jpg', 1),
(199, 'Pasta', 'pasta_cat.jpg', 1),
(200, 'Sandwich', 'sandwich_cat.jpg', 1),
(201, 'Asian Food', 'asian_food_cat.jpg', 1),
(202, 'Salade', 'salade_cat.jpg', 1),
(203, 'Veggie', 'veggie_cat.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `etat` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_commande`, `total`, `etat`, `utilisateur_id`) VALUES
(4, '2020-11-30', 16, 3, 7),
(5, '2023-07-11', 58, 1, 8),
(6, '2023-07-11', 14, 1, 8),
(7, '2023-07-11', 24, 1, 8),
(8, '2023-07-12', 24, 1, 8),
(9, '2023-07-12', 40, 1, 8),
(10, '2023-07-12', 98, 1, 8),
(11, '2023-07-12', 98, 1, 8),
(12, '2023-07-12', 28, 1, 8),
(13, '2023-07-12', 24, 1, 8),
(14, '2023-07-12', 5, 1, 8),
(15, '2023-07-12', 10, 1, 8),
(16, '2023-07-12', 10, 1, 8),
(17, '2023-07-12', 10, 1, 8),
(18, '2023-07-12', 24, 1, 8),
(19, '2023-07-12', 8, 1, 8),
(20, '2023-07-12', 8, 1, 8),
(21, '2023-07-12', 8, 1, 8),
(22, '2023-07-12', 8, 1, 8),
(23, '2023-07-12', 8, 1, 8),
(24, '2023-07-12', 8, 1, 8),
(25, '2023-07-12', 8, 1, 8),
(26, '2023-07-12', 8, 1, 8),
(27, '2023-07-12', 8, 1, 8),
(28, '2023-07-12', 8, 1, 8),
(29, '2023-07-12', 8, 1, 8),
(30, '2023-07-12', 8, 1, 8),
(31, '2023-07-12', 8, 1, 8),
(32, '2023-07-12', 8, 1, 8),
(33, '2023-07-12', 8, 1, 8),
(34, '2023-07-12', 8, 1, 8),
(35, '2023-07-12', 8, 1, 8),
(36, '2023-07-12', 8, 1, 8),
(37, '2023-07-12', 8, 1, 8),
(38, '2023-07-12', 8, 1, 8),
(39, '2023-07-12', 8, 1, 8),
(40, '2023-07-12', 8, 1, 8),
(41, '2023-07-12', 8, 1, 8),
(42, '2023-07-12', 8, 1, 8),
(43, '2023-07-12', 8, 1, 8),
(44, '2023-07-12', 8, 1, 8),
(45, '2023-07-12', 8, 1, 8),
(46, '2023-07-12', 8, 1, 8),
(47, '2023-07-12', 8, 1, 8),
(48, '2023-07-12', 8, 1, 8),
(49, '2023-07-12', 8, 1, 8),
(50, '2023-07-12', 8, 1, 8),
(51, '2023-07-12', 8, 1, 8),
(52, '2023-07-12', 8, 1, 8),
(53, '2023-07-12', 8, 1, 8),
(54, '2023-07-12', 8, 1, 8),
(55, '2023-07-12', 8, 1, 8),
(56, '2023-07-12', 8, 1, 8),
(57, '2023-07-12', 8, 1, 8),
(58, '2023-07-12', 8, 1, 8),
(59, '2023-07-12', 8, 1, 8),
(60, '2023-07-12', 14, 1, 8),
(61, '2023-07-13', 8, 1, 8),
(62, '2023-07-13', 8, 1, 8),
(63, '2023-07-13', 8, 1, 8),
(64, '2023-07-13', 8, 1, 8),
(65, '2023-07-13', 8, 1, 8),
(66, '2023-07-13', 8, 1, 8),
(67, '2023-07-13', 8, 1, 8),
(68, '2023-07-13', 21, 1, 8),
(69, '2023-07-13', 21, 1, 8),
(70, '2023-07-13', 34, 1, 8),
(71, '2023-07-13', 29, 1, 8),
(72, '2023-07-13', 19, 1, 8),
(73, '2023-07-13', 33, 1, 8),
(74, '2023-07-13', 8, 1, 8),
(75, '2023-07-13', 19, 1, 8),
(76, '2023-07-13', 8, 1, 8),
(77, '2023-07-13', 8, 1, 8),
(78, '2023-07-13', 8, 1, 8),
(79, '2023-07-13', 14, 1, 8),
(80, '2023-07-13', 23, 1, 8),
(81, '2023-07-13', 70, 1, 8),
(82, '2023-07-17', 52, 1, 8),
(83, '2023-07-17', 8, 1, 8),
(84, '2023-07-17', 14, 1, 8),
(85, '2023-07-17', 8, 1, 8),
(86, '2023-07-17', 8, 1, 8),
(87, '2023-07-17', 14, 1, 8),
(88, '2023-07-17', 14, 1, 8),
(89, '2023-07-17', 14, 1, 8),
(90, '2023-07-17', 38, 1, 8),
(91, '2023-07-17', 22, 1, 8),
(92, '2023-07-17', 8, 1, 8),
(93, '2023-07-17', 8, 1, 8),
(94, '2023-07-17', 8, 1, 8),
(95, '2023-07-17', 8, 1, 8),
(96, '2023-07-17', 8, 1, 8),
(97, '2023-07-17', 26, 1, 8),
(98, '2023-07-17', 48, 1, 8),
(99, '2023-07-17', 26, 1, 8),
(100, '2023-07-17', 12, 1, 8),
(101, '2023-07-17', 12, 1, 8),
(102, '2023-07-17', 12, 1, 8),
(103, '2023-07-17', 12, 1, 8),
(104, '2023-07-17', 5, 1, 8),
(105, '2023-07-17', 8, 1, 8),
(106, '2023-07-17', 8, 1, 8),
(107, '2023-07-17', 8, 1, 8),
(108, '2023-07-17', 14, 1, 8),
(109, '2023-07-17', 14, 1, 8),
(110, '2023-07-17', 8, 1, 8),
(111, '2023-07-17', 8, 1, 8),
(112, '2023-07-17', 0, 1, 8),
(113, '2023-07-17', 0, 1, 8),
(114, '2023-07-17', 0, 1, 8),
(115, '2023-07-17', 14, 1, 8),
(116, '2023-07-17', 0, 1, 8),
(117, '2023-07-17', 8, 1, 8),
(118, '2023-07-17', 10, 1, 8),
(119, '2023-07-17', 14, 1, 8),
(120, '2023-07-17', 14, 1, 8),
(121, '2023-07-17', 5, 1, 8),
(122, '2023-07-17', 14, 1, 8),
(123, '2023-07-17', 14, 1, 8),
(124, '2023-07-17', 8, 1, 8),
(125, '2023-07-17', 10, 1, 8),
(126, '2023-07-17', 14, 1, 8),
(127, '2023-07-17', 8, 1, 8),
(128, '2023-07-17', 8, 1, 8),
(129, '2023-07-17', 11, 1, 14),
(130, '2023-07-17', 14, 1, 14),
(131, '2023-07-17', 8, 1, 8),
(132, '2023-07-17', 5, 1, 8),
(133, '2023-07-17', 8, 1, 8),
(134, '2023-07-17', 14, 1, 8),
(135, '2023-07-17', 5, 1, 8),
(136, '2023-07-17', 8, 1, 14),
(137, '2023-07-17', 8, 1, 14),
(138, '2023-07-17', 10, 1, 14),
(139, '2023-07-17', 8, 1, 14),
(140, '2023-07-17', 14, 1, 14),
(141, '2023-07-17', 8, 1, 14),
(142, '2023-07-17', 8, 1, 14),
(143, '2023-07-17', 8, 1, 14),
(144, '2023-07-17', 8, 1, 14),
(145, '2023-07-17', 8, 1, 14),
(146, '2023-07-17', 14, 1, 14),
(147, '2023-07-17', 14, 1, 14),
(148, '2023-07-17', 14, 1, 14),
(149, '2023-07-18', 5, 1, 14),
(150, '2023-07-18', 14, 1, 14),
(151, '2023-07-18', 21, 1, 14),
(152, '2023-07-18', 8, 1, 14),
(153, '2023-07-18', 5, 1, 14),
(154, '2023-07-18', 14, 1, 14),
(155, '2023-07-18', 8, 1, 14),
(156, '2023-07-18', 8, 1, 14),
(157, '2023-07-18', 8, 1, 14),
(158, '2023-07-18', 5, 1, 14),
(159, '2023-07-18', 8, 1, 14),
(160, '2023-07-18', 5, 1, 14),
(161, '2023-07-18', 14, 1, 14),
(162, '2023-07-18', 8, 1, 14),
(163, '2023-07-19', 8, 1, 14),
(164, '2023-07-19', 8, 1, 14),
(165, '2023-07-19', 14, 1, 14),
(166, '2023-07-19', 40, 1, 14),
(167, '2023-07-20', 5, 1, 14),
(168, '2023-07-20', 5, 1, 14),
(169, '2023-07-20', 8, 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `objet`, `email`, `message`) VALUES
(3, 'mailtest', 'test@test.com', 'tentative de message sur mailhog'),
(4, 'mailtest', 'test@test.com', 'essai de mail sur MailHog'),
(5, 'gfj', 'mat@gmail.com', 'essai de contact'),
(6, 'fge<', 'thrjty@gmail.com', 'sdghnkkty,'),
(7, 'th-n', 'chiante@peachounette.com', '5588554788775547888588625fyj,ch;ih;vc;858'),
(8, '0050', '02@lol.com', '0519'),
(9, '05445', '02@lol.com', '52484'),
(10, '05445', '02@lol.com', '00124514'),
(11, '0050', '02@lol.com', '0213456789*/-+'),
(12, 'essai', 'lui@gmail.com', 'essai de addflash');

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `plat_id` int(11) DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id`, `quantite`, `plat_id`, `commande_id`) VALUES
(1, 2, 283, 5),
(2, 3, 284, 5),
(3, 1, 284, 6),
(4, 3, 283, 7),
(5, 3, 283, 8),
(6, 3, 286, 9),
(7, 2, 290, 9),
(8, 2, 284, 10),
(9, 5, 297, 10),
(10, 2, 284, 11),
(11, 5, 297, 11),
(12, 2, 284, 12),
(13, 3, 283, 13),
(14, 1, 285, 14),
(15, 2, 285, 15),
(16, 2, 285, 16),
(17, 2, 285, 17),
(18, 3, 283, 18),
(19, 1, 283, 19),
(20, 1, 283, 20),
(21, 1, 283, 21),
(22, 1, 283, 22),
(23, 1, 283, 23),
(24, 1, 283, 24),
(25, 1, 283, 25),
(26, 1, 283, 26),
(27, 1, 283, 27),
(28, 1, 283, 28),
(29, 1, 283, 29),
(30, 1, 283, 30),
(31, 1, 283, 31),
(32, 1, 283, 32),
(33, 1, 283, 33),
(34, 1, 283, 34),
(35, 1, 283, 35),
(36, 1, 283, 36),
(37, 1, 283, 37),
(38, 1, 283, 38),
(39, 1, 283, 39),
(40, 1, 283, 40),
(41, 1, 283, 41),
(42, 1, 283, 42),
(43, 1, 283, 43),
(44, 1, 283, 44),
(45, 1, 283, 45),
(46, 1, 283, 46),
(47, 1, 283, 47),
(48, 1, 283, 48),
(49, 1, 283, 49),
(50, 1, 283, 50),
(51, 1, 283, 51),
(52, 1, 283, 52),
(53, 1, 283, 53),
(54, 1, 283, 54),
(55, 1, 283, 55),
(56, 1, 283, 56),
(57, 1, 283, 57),
(58, 1, 283, 58),
(59, 1, 283, 59),
(60, 1, 284, 60),
(61, 1, 283, 61),
(62, 1, 283, 62),
(63, 1, 283, 63),
(64, 1, 283, 64),
(65, 1, 283, 65),
(66, 1, 283, 66),
(67, 1, 283, 67),
(68, 2, 283, 68),
(69, 1, 285, 68),
(70, 2, 283, 69),
(71, 1, 285, 69),
(72, 3, 283, 70),
(73, 2, 285, 70),
(74, 1, 283, 71),
(75, 3, 288, 71),
(76, 1, 285, 72),
(77, 1, 284, 72),
(78, 1, 285, 73),
(79, 2, 284, 73),
(80, 1, 283, 74),
(81, 1, 284, 75),
(82, 1, 285, 75),
(83, 1, 283, 76),
(84, 1, 283, 77),
(85, 1, 283, 78),
(86, 1, 284, 79),
(87, 1, 283, 80),
(88, 3, 285, 80),
(89, 5, 284, 81),
(90, 2, 285, 82),
(91, 3, 297, 82),
(92, 1, 283, 83),
(93, 1, 284, 84),
(94, 1, 283, 85),
(95, 1, 283, 86),
(96, 1, 284, 87),
(97, 1, 284, 88),
(98, 1, 284, 89),
(99, 2, 284, 90),
(100, 2, 285, 90),
(101, 1, 283, 91),
(102, 1, 284, 91),
(103, 1, 283, 92),
(104, 1, 283, 93),
(105, 1, 283, 94),
(106, 1, 283, 95),
(107, 1, 283, 96),
(108, 1, 284, 97),
(109, 1, 291, 97),
(110, 1, 284, 98),
(111, 2, 291, 98),
(112, 1, 293, 98),
(113, 1, 284, 99),
(114, 1, 291, 99),
(115, 1, 291, 100),
(116, 1, 291, 101),
(117, 1, 291, 102),
(118, 1, 291, 103),
(119, 1, 285, 104),
(120, 1, 283, 105),
(121, 1, 283, 106),
(122, 1, 286, 107),
(123, 1, 284, 108),
(124, 1, 284, 109),
(125, 1, 290, 110),
(126, 1, 283, 111),
(127, 1, 284, 115),
(128, 1, 286, 117),
(129, 1, 295, 118),
(130, 1, 284, 119),
(131, 1, 284, 120),
(132, 1, 285, 121),
(133, 1, 284, 122),
(134, 1, 284, 123),
(135, 1, 283, 124),
(136, 1, 295, 125),
(137, 1, 284, 126),
(138, 1, 283, 127),
(139, 1, 286, 128),
(140, 1, 287, 129),
(141, 1, 284, 130),
(142, 1, 286, 131),
(143, 1, 285, 132),
(144, 1, 286, 133),
(145, 1, 289, 134),
(146, 1, 298, 135),
(147, 1, 286, 136),
(148, 1, 286, 137),
(149, 1, 295, 138),
(150, 1, 286, 139),
(151, 1, 284, 140),
(152, 1, 286, 141),
(153, 1, 286, 142),
(154, 1, 286, 143),
(155, 1, 286, 144),
(156, 1, 283, 145),
(157, 1, 284, 146),
(158, 1, 284, 147),
(159, 1, 284, 148),
(160, 1, 285, 149),
(161, 1, 284, 150),
(162, 1, 286, 151),
(163, 1, 283, 151),
(164, 1, 298, 151),
(165, 1, 283, 152),
(166, 1, 285, 153),
(167, 1, 284, 154),
(168, 1, 283, 155),
(169, 1, 283, 156),
(170, 1, 283, 157),
(171, 1, 285, 158),
(172, 1, 283, 159),
(173, 1, 285, 160),
(174, 1, 284, 161),
(175, 1, 283, 162),
(176, 1, 283, 163),
(177, 1, 283, 164),
(178, 1, 284, 165),
(179, 1, 284, 166),
(180, 1, 297, 166),
(181, 1, 292, 166),
(182, 1, 285, 167),
(183, 1, 285, 168),
(184, 1, 286, 169);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `libelle`, `description`, `prix`, `image`, `active`, `categorie_id`) VALUES
(283, 'District Burger', 'Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), \n            de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .', 8.00, 'hamburger.jpg', 1, 197),
(284, 'Pizza Bianca', 'Une pizza fine et croustillante garnie de crème mascarpone légèrement \n            citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.', 14.00, 'pizza-salmon.png', 1, 196),
(285, 'Buffalo Chicken Wrap', 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.', 5.00, 'buffalo-chicken.webp', 1, 198),
(286, 'Cheeseburger', 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles,\n             oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.', 8.00, 'cheesburger.jpg', 1, 197),
(287, 'Spaghetti aux légumes', 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide', 10.50, 'spaghetti-legumes.jpg', 1, 199),
(288, 'Salade César', 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine,\n             de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.', 7.00, 'cesar_salad.jpg', 1, 202),
(289, 'Pizza Margherita', 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison,\n             une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...', 14.00, 'pizza-marguerita.jpg', 1, 196),
(290, 'Courgettes farcies au quinoa et duxelles de champignons', 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!', 8.00, 'courgettes_farcies.jpg', 1, 203),
(291, 'Lasagnes', 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée\n             et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.', 12.00, 'lasagnes_viande.jpg', 1, 199),
(292, 'Tagliatelles au saumon', 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!', 12.00, 'tagliatelles_saumon.webp', 1, 199),
(293, 'Scampi Piccante', 'Crevettes, oignons, courgettes, piments, citron, tomates cerises, sauce crémeuse au pesto.', 10.00, 'scampi_piccante.jpg', 1, 202),
(294, 'Carbonara Salmone', 'Saumon, oignons, sauce crémeuse, œuf, fromage italien, persil.', 15.00, 'Pasta_carbonaraSalmone.jpg', 1, 199),
(295, 'Calzone', 'Pepperoni, jambon italien, thym, romarin, champignons, sauce tomate, mozzarella.', 10.00, 'Pizza_Calzone.jpg', 1, 196),
(296, 'BBQ Chicken', 'Poulet, sauce tomate barbecue, tomates marinées à l’huile d’olive, ail, scamorza, oignons rouges.', 10.00, 'BBQ_chicken.jpg', 1, 196),
(297, 'Veggie BBQ Buffalo', 'Pavé de soja cuit dans de la sauce BBQ pimentée, faux-mage, sauce BBQ, pickles, oignons frits, salade de chou, ciboulette', 14.00, 'veggie_burger.png', 1, 203),
(298, 'Croq\'fromage', 'Sandwich composé d\'un pain grillé d\'emmental français et de cheddar anglais fondant.', 5.00, 'croq-fromage.jpg', 1, 200);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `telephone`, `adresse`, `cp`, `ville`, `is_verified`) VALUES
(7, 'Mathieu@gmail.com', '{\"1\":\"ROLE_USER\"}', '$2y$13$eSb7wMfa3nlqpIFh7ufYs.ctv4sYY4uDmM7ohWSaSa7GJzSW5z0hG', 'Hamdaoui', 'Mathieu', '0677142684', '22 rue d\'Amiens', '80000', 'Candas', 0),
(8, 'test@test.com', '{\"1\":\"ROLE_ADMIN\"}', '$2y$13$ss5Q8A8SF0EBzCdcS5uQ3OE0YqmhAlDmIiP9CPxDj3wIlVPR.Q0Z6', 'Hamdaoui', 'Mathieu', '0677148654', '47 rue de Beauval', '80000', 'Amiens', 0),
(9, 'drama@test.com', '[\"ROLE_CLIENT\"]', '$2y$13$CrS3p05eM.U6dkNdcN8tRugr7oAVNM7V6igg5IBMpxGZxcUSgrBSi', 'Drama', 'Queen', '0645784578', '50 rue d\'Amiens', '80600', 'Doullens', 0),
(11, 'test3@test.com', '[\"ROLE_CLIENT\"]', '$2y$13$YP1/.MUvN5TyTvNX1z90Nuvafp0hsTOesFz6tPKlke0EUK09jKEt6', 'Drama', 'Queen', '0645784578', '50 rue d\'Amiens', '80600', 'Doullens', 0),
(12, 'Mathieu.ham@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$AbV3VCD0Hs.k7gcrNxQ4gOr2LOLYIo14RHgHw2VVuRA9knGAxnwRe', 'Hamdaoui', 'Mathieu', '0677145684', '47 rue de Doullens', '80750', 'Candas', 0),
(14, 'mat@gmail.com', '{\"1\":\"ROLE_ADMIN\"}', '$2y$13$ss5Q8A8SF0EBzCdcS5uQ3OE0YqmhAlDmIiP9CPxDj3wIlVPR.Q0Z6', 'Hamdaoui', 'Mathieu', '0677145684', '47 rue de Doullens', '80750', 'Candas', 0),
(15, 'client1@gmail.com', '[\"ROLE_USER\"]', '$2y$13$rqD0vNitpnNMJ0785IoHX.z81Mko3WJZhlR7bTXneow/ZaWBCGEuW', 'client', '1', '1234567985', '58 rue d\'Abbeville', '80000', 'Amiens', 0),
(16, 'homer@simpson.com', '[\"ROLE_USER\"]', '$2y$13$gcCQ98hqmqa1m/2lPHO5H.e1CRpKIZxrel3uTBsukv5EZ0SjH5RfG', 'lui', 'moi', '1452639874', '123 rue bidon', '80000', 'candas', 1),
(17, 'seb@gmail.com', '[\"ROLE_USER\"]', '$2y$13$.M4GySMl5IiGTa/2RP7OLO/ueLG07drl25nypFbf58fsE9RwKsDy6', 'seb', 'durand', '0645798612', '27 rue de l\'essai', '80000', 'Amiens', 0),
(18, 'durand@gmail.com', '[\"ROLE_USER\"]', '$2y$13$a/e9Oeu/g35x.z2OkhZJJea9LyK2E9Fbq41zdcUMK8gwX82G1rx2K', 'seb', 'durand', '0645798612', '27 rue de l\'essai', '80000', 'Amiens', 0),
(19, 'Fiolek@gmail.com', '[\"ROLE_USER\"]', '$2y$13$piPdquWbwaFeKfTJx26DPufV62waVh7t0FcR1Lltrf3gXh8mDN3Re', 'Ashley', 'Fiolek', '0689745892', '32 rue du terrain', '80000', 'Canaple', 0),
(20, 'Ashley@gmail.com', '[\"ROLE_USER\"]', '$2y$13$1QLu4R0DXjTm0xubK.Mk5OKFGBY7wlW4j11cMnBQmloqPZIYipasm', 'Ashley', 'Fiolek', '0689745892', '32 rue du terrain', '80000', 'Amiens', 0),
(21, 'seb1@gmail.com', '[\"ROLE_USER\"]', '$2y$13$Cxl1J9qTF.0YaSnjxEVxzedyGXJuJXQpCg3ao6IkXY.4i.IP8hdpe', 'Ashley', 'durand', '0645798612', '27 rue de l\'essai', '80000', 'Amiens', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E067F93D73DB560` (`plat_id`),
  ADD KEY `IDX_2E067F9382EA2E54` (`commande_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A207BCF5E72D` (`categorie_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FK_2E067F9382EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_2E067F93D73DB560` FOREIGN KEY (`plat_id`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A207BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
