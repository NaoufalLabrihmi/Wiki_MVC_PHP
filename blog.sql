-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 jan. 2024 à 21:04
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `image` text NOT NULL,
  `start_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `name`, `link`, `image`, `start_at`, `end_at`, `page`, `status`, `created`) VALUES
(5, 'Wallpapers', 'wlp.com', '9839633015ea3d5ff4f261ee110f117b7f408a49_f243e24924c2cf671b9dfd6c0c85f2855132342a.jpg', 1705183200, 1705701600, '/post/:text/:id', 'enabled', 1705256914);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `status`) VALUES
(6, 0, 'Sport', 'enabled'),
(7, 0, 'Politics', 'enabled'),
(8, 0, 'Fashion', 'enabled'),
(11, 0, 'WWE', 'enabled'),
(15, 0, 'Anime', 'enabled'),
(16, 0, 'Nature', 'enabled');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`) VALUES
(51, 33, 20),
(52, 33, 19),
(53, 34, 22),
(54, 34, 19),
(57, 35, 22);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(17, 'site_name', 'WIKI'),
(18, 'site_email', 'admin@my-blog.com'),
(19, 'site_status', 'enabled'),
(20, 'site_close_msg', '&lt;h1&gt;Wiki&amp;trade; : Explorez, Cr&amp;eacute;ez et Partagez des Savoirs Ensemble!&lt;/h1&gt;');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`) VALUES
(9, 'TAGS EFFECT', 'enabled'),
(19, 'Exception', 'enabled'),
(20, 'Fire', 'enabled'),
(21, 'Bug', 'enabled'),
(22, 'Nature', 'enabled');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `users_group_id`, `first_name`, `last_name`, `email`, `password`, `image`, `gender`, `birthday`, `created`, `status`, `ip`, `code`) VALUES
(1, 1, 'Naoufal', 'Labrihmi', 'naoufal@gmail.com', '$2y$10$JnSQbKd.JyrMSNYZHWkqDOhcd3VTjuELk52IF/t2CONLSoJtjpAi.', '626a82321c7d12c81ee0610a590397e192ca756a_1047e2fa1b08157989d69dff2b8287572a470da0.webp', 'male', 0, 1471429381, '', '', '80a315d99d01b28e68e58c0c899bc4ce2197c524'),
(11, 2, 'lb', 'lbb', 'lb@gmail.com', '$2y$10$0vf4EFI/k03lFLsxPdunpeJ9ZQb.mMGBEZVnJDwzYIi4fAhE9FJVq', '76c9942112a1edcc768668076ff05e651ec69632_61292cf41957b6667c2b19e0537419d4f3b2ba34.webp', 'male', 0, 1705255579, '', '::1', 'c935489b84f61a380c61e0ee75bad751dfe19e9c');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`) VALUES
(1, 'Super Administrators'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Structure de la table `users_group_permissions`
--

CREATE TABLE `users_group_permissions` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_tags_post_id` (`post_id`),
  ADD KEY `fk_post_tags_tag_id` (`tag_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `fk_post_tags_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_post_tags_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `post_tags_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
