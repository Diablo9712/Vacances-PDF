-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 01:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zzzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_reservation` bigint(20) UNSIGNED NOT NULL,
  `id_centre` bigint(20) UNSIGNED NOT NULL,
  `id_priorite` bigint(20) UNSIGNED NOT NULL,
  `id_etat_centre` bigint(20) UNSIGNED NOT NULL,
  `montant_reservation` double NOT NULL,
  `montant_penalite` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `id_reservation`, `id_centre`, `id_priorite`, `id_etat_centre`, `montant_reservation`, `montant_penalite`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 50000, 500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assistant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`id`, `ville_id`, `libelle`, `adresse`, `tel`, `assistant`, `created_at`, `updated_at`) VALUES
(1, 1, 'Qodss', 'Hay Nisrine', '0606060606', 'SAFI NOUHAILA', NULL, NULL),
(2, 2, 'Youssoufia', 'Hay Nisrine', '0606060606', 'SAFI OUALID', NULL, NULL),
(3, 2, 'Youspoufia', 'Hay Nisrine', '0606060606', 'SAFI OUALID', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etat_centres`
--

CREATE TABLE `etat_centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etat_centres`
--

INSERT INTO `etat_centres` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'sdfvsddvsdv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etat_reservation`
--

CREATE TABLE `etat_reservation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etat_reservation`
--

INSERT INTO `etat_reservation` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'En attente', NULL, NULL),
(2, 'Anulle', NULL, NULL),
(3, 'Valide', NULL, NULL),
(4, 'Rejete', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_09_230550_create_villes_table', 1),
(5, '2020_03_09_231838_create_centres_table', 1),
(6, '2020_03_09_234413_create_saisons_table', 1),
(7, '2020_03_09_235316_create_tarifes_table', 1),
(8, '2020_03_11_204922_alter_user_table', 1),
(9, '2020_03_11_205322_create_user_details_table', 1),
(10, '2020_03_11_205607_create_user_fonction_table', 1),
(11, '2020_03_21_234143_create_reservations_table', 1),
(12, '2020_03_22_115832_create_priorites_table', 1),
(13, '2020_03_24_124655_create_etat_reservation_table', 1),
(14, '2020_03_24_234411_create_saision_details_table', 1),
(15, '2020_04_12_103632_create_etat_centres_table', 1),
(16, '2020_04_12_110403_create_agendas_table', 1),
(17, '2020_05_15_012704_update_reservation_table', 1),
(18, '2020_05_15_012805_update_priorites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorites`
--

CREATE TABLE `priorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Ville` bigint(20) UNSIGNED NOT NULL,
  `id_Reservation` bigint(20) UNSIGNED NOT NULL,
  `classement` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorites`
--

INSERT INTO `priorites` (`id`, `id_Ville`, `id_Reservation`, `classement`, `date_debut`, `date_fin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2020-05-12', '2020-05-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Etat` bigint(20) UNSIGNED NOT NULL,
  `id_User` bigint(20) UNSIGNED NOT NULL,
  `date_etat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `id_Etat`, `id_User`, `date_etat`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2020-05-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saision_details`
--

CREATE TABLE `saision_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saision_details`
--

INSERT INTO `saision_details` (`id`, `label`, `created_at`, `updated_at`) VALUES
(3, 'Summer', NULL, NULL),
(4, 'Printemps', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saisons`
--

CREATE TABLE `saisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `saison_details_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saisons`
--

INSERT INTO `saisons` (`id`, `date_debut`, `date_fin`, `saison_details_id`, `created_at`, `updated_at`) VALUES
(7, '2020-05-08 00:27:30', '2020-05-19 00:27:30', 3, NULL, NULL),
(8, '2020-03-21 00:27:30', '2020-06-20 00:27:30', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

CREATE TABLE `tarifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant` double NOT NULL,
  `ville_id` int(10) UNSIGNED NOT NULL,
  `saison_details_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`id`, `montant`, `ville_id`, `saison_details_id`, `created_at`, `updated_at`) VALUES
(1, 300, 1, 7, NULL, NULL),
(2, 450, 2, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nom`, `numero`, `cin`, `address`, `tel`) VALUES
(1, 'admin@admin.com', NULL, '$2y$10$s6.jb5Mx45qS9HSBsA.Gv.rdlPiVjSBSr6nIdbteRm3LBDxyTYadG', NULL, NULL, NULL, 'admin', 'ddd', 'ddddd', 'ddddd', '06999999');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_embauche` datetime DEFAULT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_enfants` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `matricule`, `date_embauche`, `situation`, `nbr_enfants`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_fonctions`
--

CREATE TABLE `user_fonctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_details_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Oujda', NULL, NULL),
(2, 'Saidia', NULL, NULL),
(3, 'Rabat', NULL, NULL),
(4, 'Dakhla', NULL, NULL),
(5, 'Tanger', NULL, NULL),
(6, 'Tetouan', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendas_id_reservation_index` (`id_reservation`),
  ADD KEY `agendas_id_centre_index` (`id_centre`),
  ADD KEY `agendas_id_priorite_index` (`id_priorite`),
  ADD KEY `agendas_id_etat_centre_index` (`id_etat_centre`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centres_ville_id_index` (`ville_id`);

--
-- Indexes for table `etat_centres`
--
ALTER TABLE `etat_centres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etat_reservation`
--
ALTER TABLE `etat_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `priorites`
--
ALTER TABLE `priorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priorites_id_ville_index` (`id_Ville`),
  ADD KEY `priorites_id_reservation_index` (`id_Reservation`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_id_etat_index` (`id_Etat`),
  ADD KEY `reservations_id_user_index` (`id_User`);

--
-- Indexes for table `saision_details`
--
ALTER TABLE `saision_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saisons`
--
ALTER TABLE `saisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saisons_saison_details_id_index` (`saison_details_id`);

--
-- Indexes for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarifs_ville_id_index` (`ville_id`),
  ADD KEY `tarifs_saison_details_id_index` (`saison_details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_fonctions`
--
ALTER TABLE `user_fonctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fonctions_user_details_id_foreign` (`user_details_id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `etat_centres`
--
ALTER TABLE `etat_centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etat_reservation`
--
ALTER TABLE `etat_reservation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `priorites`
--
ALTER TABLE `priorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saision_details`
--
ALTER TABLE `saision_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saisons`
--
ALTER TABLE `saisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_fonctions`
--
ALTER TABLE `user_fonctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_id_centre_foreign` FOREIGN KEY (`id_centre`) REFERENCES `centres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendas_id_priorite_foreign` FOREIGN KEY (`id_priorite`) REFERENCES `priorites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendas_id_reservation_foreign` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `centres`
--
ALTER TABLE `centres`
  ADD CONSTRAINT `centres_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `priorites`
--
ALTER TABLE `priorites`
  ADD CONSTRAINT `priorites_id_reservation_foreign` FOREIGN KEY (`id_Reservation`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `priorites_id_ville_foreign` FOREIGN KEY (`id_Ville`) REFERENCES `villes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_id_etat_foreign` FOREIGN KEY (`id_Etat`) REFERENCES `etat_reservation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_id_user_foreign` FOREIGN KEY (`id_User`) REFERENCES `users` (`id`);

--
-- Constraints for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD CONSTRAINT `tarifs_saison_details_id_foreign` FOREIGN KEY (`saison_details_id`) REFERENCES `saisons` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_fonctions`
--
ALTER TABLE `user_fonctions`
  ADD CONSTRAINT `user_fonctions_user_details_id_foreign` FOREIGN KEY (`user_details_id`) REFERENCES `user_details` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
