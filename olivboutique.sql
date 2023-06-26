-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 09:08
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
-- Base de données : `olivboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `client_id` int(10) NOT NULL,
  `total` float DEFAULT NULL,
  `number_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `date`, `client_id`, `total`, `number_order`) VALUES
(84, '2023-06-15 10:30:21', 1, 31.91, 14),
(85, '2023-06-15 10:31:09', 1, 31.91, 110954243),
(86, '2023-06-15 10:56:34', 1, 31.91, 110713902),
(87, '2023-06-15 14:30:56', 1, 31.91, 132005531),
(88, '2023-06-19 15:13:20', 1, 79.08, 117320540);

-- --------------------------------------------------------

--
-- Structure de la table `orders_product`
--

CREATE TABLE `orders_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `number_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders_product`
--

INSERT INTO `orders_product` (`id`, `product_id`, `quantity`, `number_order`) VALUES
(5, 8, 1, 14),
(6, 8, 1, 110954243),
(7, 8, 1, 110713902),
(8, 8, 1, 132005531),
(9, 6, 1, 117320540),
(10, 11, 1, 117320540);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `picture_url` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell` int(1) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `picture_url`, `price`, `discount`, `weight`, `description`, `quantity`, `sell`, `category`) VALUES
(1, 'teeshirt fatal Dev', '../assets/images/t-shirt-fatal.png', 1990, NULL, 150, 'Teeshirt sublime', 15, 0, 'cat.1'),
(6, 'Poster', '../assets/images/poster.jpg', 2290, NULL, 120, 'Poster sublime qui fera briller votre bureau', 0, 1, 'cat.1'),
(8, 'tapis souris fatal dev', '../assets/images/tapis-souris.jpg', 2990, 10, 250, 'le tapis pour la glisse ultime', 20, 1, 'cat.1'),
(9, 'Teeshirt Just Sudo It', '../assets/images/T-shirt.webp', 499, NULL, 200, 'tee-shirt des c0deurs !', 15, 1, 'cat.2'),
(10, 'Tapis anti-windows', '../assets/images/Linux-tapis.webp', 999, NULL, 450, 'Le tapis ultime ', 45, 0, 'cat.2'),
(11, 'La couverture Linux', '../assets/images/Linux-couvertures.webp', 3990, NULL, 600, 'Linux peut être la Source avec vous, couvertures tricotées, pingouin programmeur codage Nerd en peluche, literie canapé couvre-lit', 88, 1, 'Cat.2'),
(12, 'Le roi Seb du linuxverse', '../assets/images/seb.png', 99, 20, 85000, 'Le plaisir ultime du maitre de la glisse rien que pour vous régaler les mirettes !!!', 1, 1, 'cat.3');

-- --------------------------------------------------------

--
-- Structure de la table `transporteur`
--

CREATE TABLE `transporteur` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transporteur`
--

INSERT INTO `transporteur` (`id`, `name`, `price`) VALUES
(1, 'TNT', 500),
(2, 'La Poste', 1000),
(3, 'DPD', 750),
(4, 'Chronopost', 1500),
(5, 'Relais Colis', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `postalcode` varchar(5) NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `Name`, `Last_Name`, `mail`, `adress`, `postalcode`, `city`) VALUES
(1, 'Chuck', 'Norris', 'chucknorris@mahomedaubled.fr', 'même google ne le sait pas', '00000', 'Mystère'),
(2, 'Charlize ', 'Theron', 'charlizetheron@passechezmoi.DTC', '69 rue Viens chez moi ', '60009', 'et vite même !'),
(3, 'Jean Claude', 'Van Damme', 'JVCD@aware.be', 'c\'est un belge quoi', '99999', 'trop loin pour nous');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders_product`
--
ALTER TABLE `orders_product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transporteur`
--
ALTER TABLE `transporteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `orders_product`
--
ALTER TABLE `orders_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `transporteur`
--
ALTER TABLE `transporteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
