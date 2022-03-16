-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 16 mars 2022 à 03:56
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Test`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `civilite` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `date`, `username`, `mail`, `mot_de_passe`, `civilite`, `photo`, `date_inscription`) VALUES
(1, 'Diallo', 'hermana', '2022-01-04', 'Hermanita224', 'hermana@test', '$2y$10$Si06TfmHwK5Bi8ThehU97Opk2fM5Xyr1DzQsSu2gykxWcl6luB2iC', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(2, 'Diallo', 'Moud', '2022-01-12', 'Moud', 'moud@gmail.com', '$2y$10$6MbURfc.KpfP0C8XB2QTJe/jIm3Urzuz103LRmY3F1XzjobXSxKUG', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(3, 'DIALLO', 'Mamoudou', '2022-01-16', 'Mamoudou', 'mamoudou@test', '$2y$10$KMLzJBH6uln5oHIyp5G.qe5a1uMec.RtNbocmNgRE/Z6SwRc.ty5.', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(4, 'DIALLO', 'Hanna', '2022-01-13', 'Hanna224', 'hanna@test', '$2y$10$jW.DcDJJQIvh6hUb/itqC.yjN3XFB94YYZj5LQmV7mET6Ed6Cs.46', 'Mme/Mlle', '../Images/femme.jpeg', '2022-01-22 16:33:31'),
(5, 'Josh', 'Moud', '2021-12-27', 'Moud224', 'moud@test', '$2y$10$xS43gy1PiHY2AwDmhmUmieNE9NDaMn1.kB3JMr8fKV7V.OSshzUJy', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(6, 'Master', 'Gerant', '1996-06-18', 'Admin', 'admin@test.com', '$2y$10$aVQGiXFfb7Rd0Y3wKqTYE.kfaCwjnAk/4O89AIVAcsMc4CRHmYsK6', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(9, 'DIALLO', 'Abdoul', '2022-01-18', 'Docteur', 'abdoul@gmail.com', '$2y$10$0BxfmhqZ0COFz79l3mB66.tmOB07.zeMw9ukgkaOdDodEUX2K/9ea', 'Mr', '../Images/homme.jpg', '2022-01-22 16:33:31'),
(10, 'DIALLO', 'Taibou', '2022-01-05', 'Tai', 'tai@test', '$2y$10$HHPXU3Z.YHeJ0znicPE6ce.iCQoelalBRmoEGGhEh/ZpazJw/vYvq', 'Mme/Mlle', '../Images/femme.jpeg', '2022-01-22 16:33:31'),
(11, 'Robert', 'Black', '2022-01-03', 'black', 'black@test', '$2y$10$ziTZDmpqfgcn30LJbskL0e/lPQxxIWCell/AXsTwY/CSeJRIAKEgC', 'Mr', '../Images/homme.jpg', '2022-01-22 17:27:53'),
(13, 'Sow', 'Kadiatou', '2001-01-04', 'laila', 'layla@test', '$2y$10$GdGC0/8qPCUoOXfUC3NbEOAGYMs/MQuWblzkXVrC0yOQM9swtS06y', 'Mr', '../Images/essai3.jpg', '2022-01-22 17:32:46'),
(14, 'Bah', 'Ibrahima', '2020-07-21', 'ib224', 'ib@test', '$2y$10$TUTAxVjGrzKeHmGW9gJqIeEb8eD1zS4H7HHyucXk0HVZkJDAGGp/e', 'Mr', '../Images/essai4.jpg', '2022-01-22 17:49:02'),
(17, 'Bah', 'Oumar', '2022-01-03', 'Ramuo', 'oumar@gmail.com', '$2y$10$ldgXl0KJ5SGsg2Hk6QZh1OAn7pyp.JIHEWkyCPhr/Db4sfLLjTL.a', 'Mr', '../Images/essai4.jpg', '2022-01-24 12:38:59'),
(19, 'barry', 'Saliou', '2021-12-15', 'kiflo', 'kiflo@gmail.com', '$2y$10$myF/gPOadA4WjTN5dl7xJ.UFp3zHu6gfquyj7wFLjUVdv7MTelWxC', 'Mr', '../Images/essai5.jpg', '2022-03-01 19:25:52'),
(31, 'Rihanna', 'Umbrella', '2010-06-17', 'riri', 'riri@test', '$2y$10$Erk.MorXGfURBwZ027qFfODdPL5x1eOHRYJvl3HpisPFRivt.7Mky', 'Mme/Mlle', '../Images/woman-g728dacd49_1920.jpg', '2022-03-06 23:12:50'),
(32, 'DIALLO', 'Hermano', '2019-09-12', 'hermanofr', 'hermanofr@gmail.com', '$2y$10$mkstMsDJzjbkWsDjQFYMSezI4edICY4WCfVbjhHisRsJ/d1J7HuOe', 'Mr', '../Images/06A4EEEA-00F6-484B-BE1B-EE5148F0A5BA.jpeg', '2022-03-06 23:18:46'),
(33, 'Diallo', 'Moud', '2003-08-08', 'moud ', 'moud@test.com', '$2y$10$xAS1X2BcLI97c5phgA3UYuE1jxE3lw0sa14VUqa.Vj2.zoGZCuZjy', 'Mr', '../Images/EDD27F2C-43D8-4B47-AE97-520262B2CA90.jpeg', '2022-03-08 00:18:40'),
(38, 'DIALLO', 'Mamoudou', '2022-03-09', 'mah_moud224', 'doumouma113@gmail.com', '$2y$10$7h5S63Gf3bgwtMp/9k3HVeHq43npnqZIAdDbt1TaP/TsQwUo0F8Ry', 'Mr', '../Images/essai4.jpg', '2022-03-16 02:00:21'),
(39, 'd', 'd', '2022-03-08', 'tttest', 'essait@test', '$2y$10$hFtF8Bc9QdOrv9zptDVjEOGl7Lu6qFldPCKKYaASsrj468idQRXyq', 'Mr', '../Images/homme.jpg', '2022-03-16 03:30:34'),
(40, 'deeede', 'ferg', '2022-03-31', 'ss', 'te@dfff', '$2y$10$kNF9U5PlPcS2p3TmMwj6j.pMX3TAk.7ecNC.lBE3LXfudEt8PSznO', 'Mr', '../Images/homme.jpg', '2022-03-16 03:35:22'),
(41, 'essai', 'essai', '2022-03-07', 'tttttttttttttest', 'eeeeeeeeeeeeees@test', '$2y$10$r87rFHsSE6Vb4FJlhJHn5e87wzc4dRGJP7mmcT6QtGBG15frP4T/u', 'Mr', '../Images/homme.jpg', '2022-03-16 03:47:13'),
(42, 'M', 'M', '2022-02-28', 'nn', 'nnnnnnnnnn@nnn', '$2y$10$Z1XfQ1glxVfppunRWrl/0uHmA5wyrvfBvLZoS7kGcedOR3FVkWolW', 'Mme/Mlle', '../Images/femme.jpeg', '2022-03-16 03:51:00');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int NOT NULL,
  `username_` varchar(100) NOT NULL,
  `idUser` int NOT NULL,
  `heure_envoie` datetime DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `username_`, `idUser`, `heure_envoie`, `message`) VALUES
(1, 'Moud224', 5, '2022-03-05 03:32:37', 'Hello les gars'),
(2, 'kiflo', 19, '2022-03-05 03:36:47', 'Yo mon pote !'),
(3, 'ib224', 14, '2022-03-05 03:43:05', 'Salem a tous'),
(4, 'laila', 13, '2022-03-05 03:44:43', 'Hello tout le monde :) bien ou quoi ? Merci de ne pas calculer ma photo de profil'),
(5, 'Hanna224', 4, '2022-03-05 03:46:00', 'Salut les gens. Toi au moins t\'as pas une photo par defaut :('),
(6, 'Moud224', 5, '2022-03-05 04:58:35', 'comme vous dormez tous je vais me mettre a faire des tests'),
(7, 'Moud224', 5, '2022-03-05 05:02:21', 'J\'espere que je ne derange personne ?'),
(8, 'Moud224', 5, '2022-03-05 05:02:37', 'Si cest le cas dite le'),
(9, 'kiflo', 19, '2022-03-05 05:05:01', 'Justement moi ça me dérange '),
(10, 'Moud224', 5, '2022-03-05 05:05:43', 'Ooooooops my bad'),
(11, 'kiflo', 19, '2022-03-05 05:08:06', 'Allez bonne nuit frérot '),
(12, 'Moud224', 5, '2022-03-05 05:08:31', 'Bonne nuit @Kiflo'),
(13, 'Moud224', 5, '2022-03-06 17:54:46', 'Hello les gens'),
(14, 'Moud224', 5, '2022-03-06 17:55:18', 'Nouveau test&lt;br /&gt;\r\nPour les sauts de lignes.'),
(15, 'Moud224', 5, '2022-03-06 17:56:23', 'Test pour les<br />\r\nsauts de<br />\r\nlignes'),
(16, 'kiflo', 19, '2022-03-06 19:23:35', 'Hello le famille<br />\r\nJe viens effectuer mes restes à mon tour. Sauts de lignes, responsive sur mon mobile ect…'),
(17, 'kiflo', 19, '2022-03-06 19:26:41', 'De mon point de vue c’est parfait '),
(18, 'ib224', 14, '2022-03-06 19:46:34', 'Hello<br />\r\nJe viens aussi confirmer que tout marche sur tablette que ça soit sauts de lignes, responsive tout fonctionne'),
(19, 'Moud224', 5, '2022-03-06 19:47:24', 'perfect meeeeeeeeeeiiiiiiiiii<br />\r\n'),
(20, 'Moud224', 5, '2022-03-06 19:47:35', '<br />\r\n<br />\r\n<br />\r\n<br />\r\n'),
(21, 'Moud224', 5, '2022-03-06 19:49:01', '<br />\r\n<br />\r\n'),
(22, 'Moud224', 5, '2022-03-06 20:17:28', 'Un problème de moins ;)'),
(23, 'riri', 31, '2022-03-06 23:14:34', 'Hello un autre probleme viens d\'etre resolu<br />\r\nCelui des photos de profil maintenant on peut choisir celle qu\'on veut et d\'où l\'on veut du moment où elle ne depasse pas 2Mb'),
(24, 'hermanofr', 32, '2022-03-06 23:20:26', 'Yo !<br />\r\nJe viens de créer mon profil sur mobile et ça marche ;)'),
(25, 'riri', 31, '2022-03-06 23:30:42', 'meeeeeeeerci<br />\r\n'),
(26, 'Moud224', 5, '2022-03-08 10:39:12', 'kk'),
(27, 'Moud224', 5, '2022-03-09 07:15:28', 'test<br />\r\n'),
(29, 'kiflo', 19, '2022-03-09 12:25:30', 'salut les gars'),
(30, 'kiflo', 19, '2022-03-09 14:06:55', 'bonjour<br />\r\n'),
(31, 'Moud224', 5, '2022-03-09 14:22:09', 'test'),
(32, 'Moud224', 5, '2022-03-11 08:55:38', 'hellooo<br />\r\n'),
(33, 'Moud224', 5, '2022-03-16 01:17:55', 'test bd'),
(34, 'mah_moud224', 38, '2022-03-16 02:02:31', 'autre test');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `idUser` int NOT NULL,
  `mini_bio` text NOT NULL,
  `bio` text NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `membres` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
