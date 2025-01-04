-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2025 at 06:31 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `phone_number`, `created_at`, `updated_at`) VALUES
(35, 'Test', 'test', '0652514912', '2025-01-02 17:02:53', '2025-01-02 17:02:53'),
(34, 'Test', 'test', '0652514912', '2025-01-02 17:01:58', '2025-01-02 17:01:58'),
(33, 'Test', 'test', '0652583234', '2025-01-02 16:57:35', '2025-01-02 16:57:35'),
(32, 'Test', 'Test', '0652583234', '2025-01-02 16:56:22', '2025-01-02 16:56:22'),
(31, 'Test', 'Test', '0652583234', '2025-01-02 16:55:25', '2025-01-02 16:55:25'),
(30, 'Test', 'Test', '0652583234', '2025-01-02 16:50:32', '2025-01-02 16:50:32'),
(29, 'Test', 'Test', '0652583234', '2025-01-02 16:49:15', '2025-01-02 16:49:15'),
(28, 'Test', 'Test', '0652583234', '2025-01-02 16:35:06', '2025-01-02 16:35:06'),
(27, 'Test', 'Test', '0652583234', '2025-01-02 16:29:29', '2025-01-02 16:29:29'),
(26, 'Test', 'Test', '065258332', '2025-01-02 16:27:03', '2025-01-02 16:27:03'),
(25, 'Test', 'Test', '0652583234', '2025-01-02 16:26:08', '2025-01-02 16:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `horaires_time_unique` (`time`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horaires`
--

INSERT INTO `horaires` (`id`, `time`, `created_at`, `updated_at`) VALUES
(28, '20:00:00', '2025-01-02 16:50:12', '2025-01-02 16:50:12'),
(26, '19:00:00', '2024-12-31 12:49:42', '2024-12-31 12:49:42'),
(25, '18:00:00', '2024-12-31 12:49:38', '2024-12-31 12:49:38'),
(24, '17:00:00', '2024-12-31 12:49:34', '2024-12-31 12:49:34'),
(23, '16:00:00', '2024-12-31 12:49:30', '2024-12-31 12:49:30'),
(22, '15:00:00', '2024-12-31 12:49:26', '2024-12-31 12:49:26'),
(21, '14:00:00', '2024-12-31 12:49:21', '2024-12-31 12:49:21'),
(20, '13:00:00', '2024-12-31 12:49:16', '2024-12-31 12:49:16'),
(19, '12:00:00', '2024-12-31 12:48:56', '2024-12-31 12:48:56'),
(18, '11:00:00', '2024-12-31 12:48:50', '2024-12-31 12:48:50'),
(17, '10:00:00', '2024-12-31 12:48:46', '2024-12-31 12:48:46'),
(16, '09:00:00', '2024-12-31 12:48:38', '2024-12-31 12:48:38'),
(29, '21:00:00', '2025-01-02 16:56:02', '2025-01-02 16:56:02'),
(30, '22:00:00', '2025-01-02 17:02:36', '2025-01-02 17:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2024_12_31_093532_create_clients_table', 1),
(25, '2024_12_31_093619_create_horaires_table', 1),
(26, '2024_12_31_111831_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation` date NOT NULL,
  `time_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_time_id_foreign` (`time_id`),
  KEY `reservations_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservation`, `time_id`, `user_id`, `created_at`, `updated_at`) VALUES
(39, '2025-01-02', 22, 34, '2025-01-02 17:01:58', '2025-01-02 17:01:58'),
(38, '2025-01-02', 19, 33, '2025-01-02 16:57:35', '2025-01-02 16:57:35'),
(35, '2025-01-03', 18, 30, '2025-01-02 16:50:32', '2025-01-02 16:50:32'),
(34, '2025-01-03', 17, 29, '2025-01-02 16:49:15', '2025-01-02 16:49:15'),
(36, '2025-01-03', 19, 31, '2025-01-02 16:55:25', '2025-01-02 16:55:25'),
(32, '2025-01-16', 16, 27, '2025-01-02 16:29:29', '2025-01-02 16:29:29'),
(40, '2025-01-03', 16, 35, '2025-01-02 17:02:53', '2025-01-02 17:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$AhgIiQQ8Og.y4VRAMuMnxO3nZ3AIplQLkRbNZNXVepSAM7iSrNwxK', NULL, NULL, '2024-12-31 19:43:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
