-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 10 déc. 2024 à 22:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Structure de la table `COMPTES` de la base de données PAPID 

CREATE TABLE `COMPTES` (
  `id` int(11) NOT NULL,
  `utilisateur` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Role 1 = ADMIN
-- Role 2 = CLIENT
-- Role 3 = VENDEUR 

INSERT INTO `COMPTES` (`id`, `utilisateur`, `password`, `role`) VALUES
(7, 'Ibti', '$2y$10$5e4/Bse9zbna/odihdxM4uhR7RFl22XW52neGyqYjh8WgmajQVCCG', '3'),
(8, 'Assia', '$2y$10$5e4/Bse9zbna/odihdxM4uhR7RFl22XW52neGyqYjh8WgmajQVCCG', '2'),
(9, 'Zeinabou', '$2y$10$5e4/Bse9zbna/odihdxM4uhR7RFl22XW52neGyqYjh8WgmajQVCCG', '1'),
(10, 'Sheinez', '$2y$10$5e4/Bse9zbna/odihdxM4uhR7RFl22XW52neGyqYjh8WgmajQVCCG', '3'),

ALTER TABLE `COMPTES`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur` (`utilisateur`);

ALTER TABLE `COMPTES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

