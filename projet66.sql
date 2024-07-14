-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 juil. 2024 à 16:10
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet66`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `stock` int(100) NOT NULL,
  `description` text NOT NULL,
  `image` longtext DEFAULT NULL,
  `prix` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `artisan_id`, `category_id`, `title`, `subtitle`, `stock`, `description`, `image`, `prix`) VALUES
(39, NULL, 19, 'Furry hooded parka', 'Furry hooded parka', 50, '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$', 'shop-1.jpg', 5000),
(42, NULL, 15, 'Circular pendant earrings', 'Circular pendant earrings', 10, 'pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp', 'shop-7.jpg', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `metier` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `photo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artisans`
--

INSERT INTO `artisans` (`id`, `nom`, `prenom`, `email`, `contact`, `sexe`, `datenaissance`, `localisation`, `metier`, `nationalite`, `password`, `photo`) VALUES
(4, 'SORO', 'JUNIOR', 'serge5@gmail.com', '0506944519', 'MASCULIN', '2024-05-10', 'ABIDJAN', 'Couture', 'IVOIRIENNE', 'Michael', 'boubou_marocain.png'),
(7, 'SORO', 'DEBE', 'debe25@gmail.com', '070000', 'MASCULIN', '2024-02-29', 'ABIDJAN', 'Partiserie', 'IVOIRIENNE', 'Michael', 'close-up-man-with-delicious-cupcakes.jpg'),
(8, 'KOFFI', 'KOUMAN', 'kouman25@gmail.com', '071111', 'MASCULIN', '2023-11-03', 'ABIDJAN', 'Menuiserie', 'IVOIRIENNE', 'Michael', 'side-view-man-measuring-wood.jpg'),
(9, 'KARIDIOULA ', 'MARCELINE', 'kokomichael148@gmail.com', '072222', 'FEMININ', '2023-09-07', 'BOUAKE', 'Coiffure', 'IVOIRIENNE', 'Michael', 'woman-hairdresser-salon.jpg'),
(10, 'KOUAME', 'DORIAN', 'dorian25@gmail.com', '073333', 'MASCULIN', '2024-04-18', 'ABIDJAN', 'PEINTRE', 'IVOIRIENNE', 'Michael', 'strict-raised-hand-young-african-american-builder-uniform-holding-roller-brush-isolated-blue-background.jpg'),
(11, 'MICHAEL', 'KOKO', 'kokomichael148@gmail.com', '074444', 'MASCULIN', '2024-07-13', 'GRAND BASSAM', 'Boucherie', 'IVOIRIENNE', 'Michael', 'portrait-man-working-as-butcher.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(7, 'Mécanique'),
(8, 'Menuiserie'),
(9, 'Charpenterie '),
(10, 'Maçonnerie '),
(11, 'Spécialiste en froid'),
(12, 'Couture '),
(13, 'Tapisserie '),
(14, 'Coiffure '),
(15, 'Bijouterie '),
(16, 'Electronique (réparateur TV, portable, etc) '),
(17, 'Briqueterie '),
(18, 'Boucherie '),
(19, 'Vente de marchandises '),
(20, 'Agroalimentaire, alimentation, restauration '),
(21, 'Vitrerie '),
(22, 'Hygiène et soins corporels '),
(23, 'Audiovisuel et communication '),
(27, 'Transport'),
(28, 'Artisanat d’art et de décoration');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `photo` longtext DEFAULT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `datenaissance`, `email`, `contact`, `sexe`, `nationalite`, `localisation`, `photo`, `password`) VALUES
(1, 'MICHAEL', 'KOKO', '2024-07-18', 'kokomichael148@gmail.com', '070000', 'MASCULIN', 'IVOIRIENNE', 'ABIDJAN', 'WhatsApp Image 2024-01-19 at 09.23.50.jpeg', 'Michael'),
(9, 'MICHAEL', 'KOKO', '2024-07-10', 'soro4@gmail.com', '0501254701', 'MASCULIN', 'IVOIRIENNE', 'ABIDJAN', '3fb26d81-417c-4be4-96f0-e82ddd69d471.jpg', '$2y$10$55.GHKJcI');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `artisan_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `client_id`, `artisan_id`, `title`, `prix`, `quantity`, `image`) VALUES
(104, NULL, NULL, 'Circular pendant earrings', '2000', '1', 'shop-7.jpg'),
(105, NULL, NULL, 'Ankle-cuff sandals', '10000', '1', 'shop-5.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Etrangere` (`category_id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Index pour la table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `artisan_article` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
