-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 13:54
-- Version du serveur : 10.6.21-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qhyendxcgr_guestbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Test', 1, '2022-12-05 00:00:00'),
(4, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisÃ©e Ã  titre provisoire pour calibrer une mise en page, le texte dÃ©finitif venant remplacer le faux-texte dÃ¨s qu\'il est prÃªt ou que la mise en page est achevÃ©e. GÃ©nÃ©ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 4, '2022-12-07 00:00:00'),
(5, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisÃ©e Ã  titre provisoire pour calibrer une mise en page, le texte dÃ©finitif venant remplacer le faux-texte dÃ¨s qu\'il est prÃªt ou que la mise en page est achevÃ©e. GÃ©nÃ©ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 3, '2022-12-07 00:00:00'),
(6, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisÃ©e Ã  titre provisoire pour calibrer une mise en page, le texte dÃ©finitif venant remplacer le faux-texte dÃ¨s qu\'il est prÃªt ou que la mise en page est achevÃ©e. GÃ©nÃ©ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 2, '2022-12-07 00:00:00'),
(9, 'Un test de confirmation', 36, '2023-02-17 00:00:00'),
(13, 'Ceci est un commentaire de test', 36, '2023-02-17 12:11:46'),
(15, 'enfin, ça marche', 36, '2023-02-17 12:13:34'),
(16, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisable à  titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 37, '2023-02-19 19:50:24');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(36, 'x', '$2y$10$G/QWyQPKwCatkaI0Tmumf.y0GOtprNOctiqfA.w0ygiiXQlmMkVR2'),
(39, 'admin', '$2y$10$ObvCEaAOUTze8Pm8ldoI/OXIX73ov1GoCJBU/KtBVwvG8CEK.kTxy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
