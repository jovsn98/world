-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 03 avr. 2022 à 13:30
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `world`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `authors` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date-creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `year`, `authors`, `country`, `region`, `description`, `picture`, `date-creation`) VALUES
(1, 'Projet Pegasus', 2018, 'Mr Nobody', 'Etats Unies', 'Californie', '2183, dans un univers où l\'humanité est désormais capable de se déplacer dans la galaxie grâce à l\'effet cosmodésique, connu des autres espèces.', 'death.png', '2022-04-01 12:35:06'),
(2, 'Last City', 2017, 'Gerald', 'Pologne', 'Varsovie', '2758, dans un monde où l\'humanité est désormais incapable de se reproduire dans le monde à cause l\'effet viral, connu de toutes les espèces.', 'spidi.png', '2022-04-01 12:35:06'),
(3, 'Aterum Last', 2010, 'Alex', 'France', 'Paris', 'L\'histoire de Aterum Last se déroule au départ dans l\'univers de la mythologie grecque et raconte l\'histoire d\'un simple mortel élevé au rang de dieu.', 'war.png', '2022-04-01 12:35:06'),
(4, 'Japan Life', 2021, 'Garry', 'USA', 'New-York', 'Japan Life se déroule en 1274. Sa soif de conquête le pousse à envahir Japon, pas encore unifié. Il met alors en place une force d\'invasion composée de 4000 navires.', 'ass.png', '2022-04-01 12:35:06'),
(5, 'Lake of Road', 2019, 'Yamato', 'Japon', 'Tokyo', 'L\'histoire se déroule dans un contexte futuriste où l\'humanité a perdu la maitrise de la technologie numérique et le monde est envahi par des créatures robotiques.', 'dawn.png', '2022-04-01 12:35:06'),
(6, 'CyberLife', 2016, 'Jackie', 'Italy', 'Tuscany', '2038, dans la ville de Détroit aux États-Unis, les androïdes partagent le quotidien des êtres humains en étant à leur service. Une guerre va bientôt commencer.', 'detroit.png', '2022-04-01 12:35:06'),
(7, 'Kingdom Come', 2021, 'Joey', 'France', 'Bordeaux', 'Après la mort de l\'empereur, son fils lui succède, mais se révèle être incompétent pour le trône. Son frère, Sigmond, profite de l\'opportunité pour piller le pays.', 'effect.png', '2022-04-01 12:35:06'),
(8, 'Far Far West', 2020, 'Luca', 'Italy', 'Taormina', '1899, L\'ère de l\'Ouest sauvage touche à sa fin. Les autorités ont décidé de traquer les dernières bandes de hors-la-loi. Ceux qui ne se rendent pas ou résistent sont tués.', 'rdr.png', '2022-04-01 12:35:06'),
(9, 'City', 2017, 'Atreus', 'Allemagne', 'Berlin', '3063, L\'ère de l\'ère modern à sa fin. Les autorités ont décidé de traquer les dernières hommes. Ceux qui ne se rendent pas ou résistent sont tués pour le profit des plus aisés.', 'exodus.png', '2022-04-01 12:35:06'),
(10, 'Fly', 2021, 'Bobby', 'USA', 'Texas', '1876. Capturé par les rebelles impressionnés par son courage, Nathan Algren change de camp et décide de rejoindre leur combat. Il sera le symbole d\'un combat pour la liberté.', 'ghost.png', '2022-04-01 12:35:06'),
(11, 'Mad Sanity', 2014, 'Ascent', 'Argentina', 'Mendoza', 'Hanté par un lourd passé, Max estime que le meilleur moyen de survivre est de rester seul. Cependant, il se retrouve embarqué par une bande piloté par l\'Imperator Furiosa.', 'max.png', '2022-04-01 12:35:06'),
(12, 'From Max', 2015, 'Jihn', 'Espagne', 'Barcelona', 'Incarnez le détective privé Takayuki Yagami qui utilise des systèmes d\'enquête innovants pour découvrir les secrets du quartier corrompu de Kamurocho au centre du Japon.', 'judge.png', '2022-04-01 12:35:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pseudo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(75) CHARACTER SET latin1 NOT NULL,
  `mdp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `enabled`, `firstname`, `lastname`, `pseudo`, `email`, `mdp`, `admin`) VALUES
(1, 1, 'louis', 'bobby', 'sgsgsg', 'robert@gmail.com', '$2y$10$.SrbA4w3oAQeBEX9iKTX1ujsUsFCP9g2pcOyvat9JEBX9JRWmet2a', 0),
(2, 1, 'louis', 'bobby', 'sgsgsg', 'robert@gmail.com', '$2y$10$eFQBfybNLAgmb8b2kYMjtO7M5IRnFjq4GZHJG8OQ/2uXdyTLnLUqC', 0),
(3, 1, 'louis', 'bobby', 'sgsgsg', 'robert@gmail.com', '$2y$10$VuGDL2ASbRxeMQBX7GxN7.U0C1HIa5qYaqgd911ZcX7ouM9tnm7SG', 0),
(4, 1, 'Jonathan', 'Parinet', 'Don', 'donschiada@gmail.com', '$2y$10$3.t9fHnJEFE.c9ZAbb9EpuwoMqEgchCHZWrypgaWsztxsM4OKbBcy', 1),
(5, 1, 'Joey', 'Van Stokeren', 'jovsn98', 'vanstokerenjoey@gmail.com', '$2y$10$0VFZF83xiq0DvgMF6YkXSu5sHPJ/ZUp1H4bpniM0v0Iw/ptyBYNSK', 0),
(6, 1, 'bab', 'bob', 'babob', 'aze@gmail.com', '$2y$10$gL1.rYBTykYLOa3uRzJX5ud.C91/kLWlMj/i5Xup4Tay/.yCxXqb6', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
