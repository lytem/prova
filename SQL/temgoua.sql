-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Dic 06, 2021 alle 11:15
-- Versione del server: 8.0.21
-- Versione PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temgoua`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `patient_id`, `department_id`, `data`, `ora`, `deleted_at`, `created_at`, `updated_at`, `exam_id`) VALUES
(11, 0, 0, 0, '2021-12-02', '03:32', '2021-12-05 22:15:49', '2021-12-05 21:33:02', '2021-12-05 22:15:49', 0),
(9, 5, 3, 1, '2021-12-31', '04:05', '2021-12-05 21:29:25', '2021-12-05 09:29:10', '2021-12-05 21:29:25', NULL),
(10, 5, 4, 1, '2021-12-23', '23:12', NULL, '2021-12-05 10:01:04', '2021-12-05 10:01:04', 4),
(8, 4, 3, 1, '2021-12-26', '11:31', '2021-12-05 22:15:58', '2021-12-05 09:28:08', '2021-12-05 22:15:58', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indirizzo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `departments`
--

INSERT INTO `departments` (`id`, `nome`, `indirizzo`, `telefono`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'kilo', 'fghj', 'fghj', 'fghj', NULL, '2021-12-05 09:12:54', '2021-12-05 09:18:14');

-- --------------------------------------------------------

--
-- Struttura della tabella `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cognome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partita_iva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codice_fiscale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residenza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `città` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_id` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `doctors`
--

INSERT INTO `doctors` (`id`, `nome`, `cognome`, `partita_iva`, `codice_fiscale`, `telefono`, `email`, `residenza`, `città`, `specialty_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'lytemuo', 'infgrty', 'ghj', '234', 'hj', 'ghj', 'bn', 'bnm', NULL, NULL, '2021-12-05 08:40:10', '2021-12-06 00:33:31'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 20:48:39', '2021-12-05 20:47:00', '2021-12-05 20:48:39'),
(4, 'morin', 'jacques', '123', '1234', 'ghjk', 'g', 'gh', 'ghj', NULL, NULL, '2021-12-05 08:39:49', '2021-12-05 08:39:49'),
(7, '77788olp', NULL, NULL, 'ghjk', NULL, NULL, NULL, NULL, NULL, '2021-12-05 20:48:42', '2021-12-05 20:48:29', '2021-12-05 20:48:42'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 21:03:44', '2021-12-05 20:51:11', '2021-12-05 21:03:44'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 21:06:00', '2021-12-05 21:03:55', '2021-12-05 21:06:00'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 21:11:37', '2021-12-05 21:10:38', '2021-12-05 21:11:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `exams`
--

INSERT INTO `exams` (`id`, `nome`, `costo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'sang', '34', NULL, '2021-12-05 09:59:33', '2021-12-05 23:30:35'),
(5, 'yu', '12', NULL, '2021-12-05 23:28:58', '2021-12-06 01:33:17'),
(6, 'yu', '13', '2021-12-06 01:34:02', '2021-12-06 01:33:01', '2021-12-06 01:34:02'),
(7, 'ghj', '90', NULL, '2021-12-06 10:04:45', '2021-12-06 10:04:45');

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_24_144643_create_permission_tables', 1),
(6, '2021_11_30_133940_create_doctors_table', 1),
(7, '2021_11_30_163427_create_patients_table', 1),
(8, '2021_12_01_121103_create_appointments_table', 1),
(9, '2021_12_04_103618_create_departments_table', 1),
(10, '2021_12_04_104005_create_exams_table', 1),
(11, '2021_12_04_104051_create_specialty_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cognome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partita_iva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codice_fiscale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residenza` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `città` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `patients`
--

INSERT INTO `patients` (`id`, `nome`, `cognome`, `partita_iva`, `codice_fiscale`, `telefono`, `email`, `residenza`, `città`, `doctor_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'mol', 'lit', 'huii', '5678', '67890', '789', 'vbn', 'vbn', 4, NULL, '2021-12-05 08:41:18', '2021-12-05 08:41:18'),
(4, 'bn', 'nm', 'bnm', 'bn', 'bn', 'nm', 'nm', 'nm', 4, NULL, '2021-12-05 08:41:47', '2021-12-05 08:41:47'),
(5, 'mkoi', 'ujm', 'k', 'll', 'km', 'mm', 'kjk', 'kk', 4, NULL, '2021-12-05 08:42:06', '2021-12-05 08:42:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit doctors', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(2, 'read doctors', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(3, 'edit patients', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(4, 'read patients', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(5, 'edit departments', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(6, 'read departments', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(7, 'edit exams', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(8, 'read exams', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(9, 'edit specialties', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(10, 'read specialties', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(11, 'edit appointments', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(12, 'read appointments', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59');

-- --------------------------------------------------------

--
-- Struttura della tabella `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'writer', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(2, 'admin', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(3, 'Super-Admin', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59'),
(4, 'reader', 'web', '2021-12-04 20:40:59', '2021-12-04 20:40:59');

-- --------------------------------------------------------

--
-- Struttura della tabella `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `specialties`
--

INSERT INTO `specialties` (`id`, `nome`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'justine', NULL, '2021-12-06 01:28:29', '2021-12-06 01:28:29'),
(3, 'jj', NULL, '2021-12-06 01:26:36', '2021-12-06 01:32:16');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'writer', 'writer@example.com', '2021-12-04 20:41:00', '$2y$10$NSB1h6YKcrh.mLyisR5wCew8jKlW9HznVsmJDwN.RkLa231evQ22K', 'k927onxWyKG2ridiNVd1MS7jyN3e4droKAtIgL03E0pGmw4WCJxibMq2oa3E', '2021-12-04 20:41:00', '2021-12-04 20:41:00'),
(2, 'admin', 'admin@example.com', '2021-12-04 20:41:00', '$2y$10$QBIGRiSB/gs.5IALCiI46.JvFfghMpiJSxJufpRiYqaH16ZUfi.kC', 'lVKCfR7sXw', '2021-12-04 20:41:00', '2021-12-04 20:41:00'),
(3, 'superadmin', 'superadmin@example.com', '2021-12-04 20:41:00', '$2y$10$ZwipJfNCH2.r4QpYQhNMXOr9CR.c9Vd8oMlLjrvAyqdYhCXjnSXd2', 'TA9HgWYDu5', '2021-12-04 20:41:00', '2021-12-04 20:41:00'),
(4, 'reader', 'reader@example.com', '2021-12-04 20:41:00', '$2y$10$/R7Ifjph.qcLUHELt/i8f.t/DwWUmLbvdonbnZSOus8U3Bunhk9tC', 'zgbf0ggWMhqqt6Mebdb95HiIRHScA34Q8f6UaVHyIshEXFisxtHQEHETyqTc', '2021-12-04 20:41:00', '2021-12-04 20:41:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
