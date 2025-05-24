-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 mai 2025 à 12:17
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mongoo_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `active`, `created_at`, `updated_at`, `restaurant_id`) VALUES
(2, 'Xavier dupont', 'jensairien@gmail.com', 1, '2025-05-19 14:50:42', '2025-05-24 02:20:01', 1),
(3, 'Alain Sliman', 'Alainzensliman@gmail.com', 1, '2025-05-24 01:29:27', '2025-05-24 01:29:56', 1),
(4, 'Alain souliman', 'zaz@zfzf.zzd', 1, '2025-05-24 01:32:03', NULL, 2),
(5, 'Jean Dupont', 'jean.dupont@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 11),
(6, 'Marie Laurent', 'marie.laurent@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 11),
(7, 'Lucas Martin', 'lucas.martin@mongoo.fr', 0, '2025-05-24 01:45:16', NULL, 11),
(8, 'Sophie Petit', 'sophie.petit@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 12),
(9, 'Maxime Dubois', 'maxime.dubois@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 12),
(10, 'Claire Leroy', 'claire.leroy@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 13),
(11, 'Thomas Moreau', 'thomas.moreau@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 13),
(12, 'Julie Roux', 'julie.roux@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 14),
(13, 'Antoine Vincent', 'antoine.vincent@mongoo.fr', 0, '2025-05-24 01:45:16', NULL, 14),
(14, 'Camille Simon', 'camille.simon@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 15),
(15, 'Nicolas Girard', 'nicolas.girard@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 16),
(16, 'Emma Blanc', 'emma.blanc@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 16),
(17, 'Paul Mercier', 'paul.mercier@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 17),
(18, 'Laura Faure', 'laura.faure@mongoo.fr', 1, '2025-05-24 01:45:16', NULL, 18),
(19, 'David Rousseau', 'david.rousseau@mongoo.fr', 0, '2025-05-24 01:45:16', NULL, 18);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'zdz', 'dzdzdzd', '2025-05-19 14:20:21', '2025-05-19 14:22:29'),
(2, 'Le barr', '25 rue raviolie', '2025-05-24 01:31:39', NULL),
(11, 'Mongoo Châtelet', '23 Rue de Rivoli, 75004 Paris', '2025-05-24 01:45:16', NULL),
(12, 'Mongoo Opéra', '12 Boulevard des Capucines, 75009 Paris', '2025-05-24 01:45:16', NULL),
(13, 'Mongoo La Défense', '15 Esplanade du Général de Gaulle, 92800 Puteaux', '2025-05-24 01:45:16', NULL),
(14, 'Mongoo Bastille', '8 Rue du Faubourg Saint-Antoine, 75012 Paris', '2025-05-24 01:45:16', NULL),
(15, 'Mongoo Montparnasse', '35 Boulevard du Montparnasse, 75006 Paris', '2025-05-24 01:45:16', NULL),
(16, 'Mongoo Étoile', '41 Avenue des Champs-Élysées, 75008 Paris', '2025-05-24 01:45:16', NULL),
(17, 'Mongoo République', '10 Place de la République, 75011 Paris', '2025-05-24 01:45:16', NULL),
(18, 'Mongoo Nation', '25 Avenue du Trône, 75012 Paris', '2025-05-24 01:45:16', NULL),
(19, 'zd', 'zddzd', '2025-05-24 01:56:59', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_5D9F75A1B1E7706E` (`restaurant_id`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A1B1E7706E` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
