-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 01:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firetrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletin`
--

CREATE TABLE `bulletin` (
  `bulletin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fire_alarm`
--

CREATE TABLE `fire_alarm` (
  `firealarm_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fire_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Fire Out','Ongoing Fire') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing Fire',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fire_alarm`
--

INSERT INTO `fire_alarm` (`firealarm_id`, `user_id`, `fire_location`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 'University of San Carlos', '10.353072075803802', '123.91298865030441', 'Ongoing Fire', '2023-02-05 12:27:36', '2023-02-04 16:00:00'),
(6, 2, 'Jollibee Banilad', '10.349568075191915', '123.913374888391', 'Ongoing Fire', '2023-02-05 12:28:20', '2023-02-05 12:28:20'),
(7, 4, 'Oakridge Business Park', '10.343708802976499', '123.91613004382488', 'Fire Out', '2023-02-05 12:28:20', '2023-02-05 12:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `hydrant`
--

CREATE TABLE `hydrant` (
  `hydrant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hydrant_type_id` bigint(20) UNSIGNED NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('working','not working','maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'working',
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hydrant_type`
--

CREATE TABLE `hydrant_type` (
  `hydrant_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_02_04_092154_create_fire_alarm_table', 1),
(12, '2023_02_04_092334_create_hydrant_type_table', 1),
(13, '2023_02_04_092335_create_hydrant_table', 1),
(14, '2023_02_04_092809_create_bulletin_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('firefighter','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `fname`, `lname`, `contact_no`, `password`, `birthday`, `gender`, `img_url`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'robbie84@example.net', 'Juvenal Ledner', 'Alfredo', 'Cole', '22330', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '37035', 'male', '92IXUNpkjO0rOQ5b.png', 'admin', 'active', '2023-02-05 04:26:43', 'pTKElCqyL2', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(2, 'mallory.walsh@example.net', 'Amina O\'Connell V', 'Franz', 'Auer', '45794', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '22328', 'male', '92IXUNpkjO0rOQ5b.png', 'admin', 'inactive', '2023-02-05 04:26:43', 'TfcHKX6SW9', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(3, 'lenore.hills@example.org',  'Monroe', 'Jerde', '78250', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '54610', 'female', '92IXUNpkjO0rOQ5b.png', 'admin', 'active', '2023-02-05 04:26:43', 'zPMUtuymLF', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(4, 'lucius54@example.com',  'Freddy', 'Hill', '21439', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '62774', 'male', '92IXUNpkjO0rOQ5b.png', 'firefighter', 'active', '2023-02-05 04:26:43', 'wsSsI97Lo6', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(5, 'johnston.vida@example.net',  'Chase', 'Carter', '342', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '41200', 'male', '92IXUNpkjO0rOQ5b.png', 'firefighter', 'inactive', '2023-02-05 04:26:43', 'oqXlf7ARCI', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(6, 'sadye36@example.net', 'Laverna', 'Koelpin', '68472', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '68556', 'female', '92IXUNpkjO0rOQ5b.png', 'admin', 'inactive', '2023-02-05 04:26:43', 'hGzNu8uNaA', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(7, 'mills.theresia@example.com', 'Wilbert', 'Welch', '72788', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '44311', 'female', '92IXUNpkjO0rOQ5b.png', 'admin', 'inactive', '2023-02-05 04:26:43', 'Y6J0BkZSWg', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(8, 'kris.labadie@example.com', 'Efrain', 'Pacocha', '3119', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '709', 'male', '92IXUNpkjO0rOQ5b.png', 'firefighter', 'active', '2023-02-05 04:26:43', 'SdvudR0OqE', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(9, 'sporer.jamal@example.org', 'Laron', 'Cruickshank', '68862', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '43976', 'female', '92IXUNpkjO0rOQ5b.png', 'admin', 'inactive', '2023-02-05 04:26:43', 'rlMMqL3FoL', '2023-02-05 04:26:44', '2023-02-05 04:26:44'),
(10, 'zane.krajcik@example.net', 'Marquis', 'Beer', '85421', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '80671', 'male', '92IXUNpkjO0rOQ5b.png', 'firefighter', 'active', '2023-02-05 04:26:43', 'DNrHsPWEzQ', '2023-02-05 04:26:44', '2023-02-05 04:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`bulletin_id`),
  ADD KEY `bulletin_user_id_foreign` (`user_id`);

--
-- Indexes for table `fire_alarm`
--
ALTER TABLE `fire_alarm`
  ADD PRIMARY KEY (`firealarm_id`),
  ADD KEY `fire_alarm_user_id_foreign` (`user_id`);

--
-- Indexes for table `hydrant`
--
ALTER TABLE `hydrant`
  ADD PRIMARY KEY (`hydrant_id`),
  ADD KEY `hydrant_user_id_foreign` (`user_id`),
  ADD KEY `hydrant_hydrant_type_id_foreign` (`hydrant_type_id`);

--
-- Indexes for table `hydrant_type`
--
ALTER TABLE `hydrant_type`
  ADD PRIMARY KEY (`hydrant_type_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `bulletin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fire_alarm`
--
ALTER TABLE `fire_alarm`
  MODIFY `firealarm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hydrant`
--
ALTER TABLE `hydrant`
  MODIFY `hydrant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hydrant_type`
--
ALTER TABLE `hydrant_type`
  MODIFY `hydrant_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulletin`
--
ALTER TABLE `bulletin`
  ADD CONSTRAINT `bulletin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fire_alarm`
--
ALTER TABLE `fire_alarm`
  ADD CONSTRAINT `fire_alarm_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `hydrant`
--
ALTER TABLE `hydrant`
  ADD CONSTRAINT `hydrant_hydrant_type_id_foreign` FOREIGN KEY (`hydrant_type_id`) REFERENCES `hydrant_type` (`hydrant_type_id`),
  ADD CONSTRAINT `hydrant_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
