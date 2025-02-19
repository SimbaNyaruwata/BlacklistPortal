-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blacklistportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklisted_clients`
--

CREATE TABLE `blacklisted_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `client_type` enum('Business','Individual') NOT NULL,
  `institution` varchar(255) NOT NULL,
  `account_manager` varchar(255) NOT NULL,
  `date_blacklisted` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blacklisted_clients`
--

INSERT INTO `blacklisted_clients` (`id`, `account_name`, `client_type`, `institution`, `account_manager`, `date_blacklisted`, `created_at`, `updated_at`) VALUES
(1, 'Miss Corene Runolfsson', 'Business', 'Kessler Group', 'Keyon O\'Kon', '2022-03-02', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(2, 'Dr. Edmond Koss Sr.', 'Individual', 'Robel-Bosco', 'Mrs. Irma Mosciski', '2021-11-06', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(3, 'Emanuel Williamson', 'Individual', 'Hauck PLC', 'Ms. Elvie Leffler', '2023-02-16', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(4, 'Bonnie Labadie', 'Individual', 'Shields and Sons', 'Prof. Akeem Waelchi IV', '2020-07-14', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(5, 'Jarrell Beatty', 'Business', 'Emard-Lind', 'Louvenia Walter', '2020-11-14', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(6, 'Mr. Everardo Miller Jr.', 'Business', 'Mitchell, Schuster and Bauch', 'Margaretta Lind', '2021-09-24', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(7, 'Mr. Darius Mante III', 'Individual', 'Daniel, Casper and Beahan', 'Matilda Gleichner Sr.', '2021-08-14', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(8, 'Mr. Gerald Dietrich PhD', 'Individual', 'Nienow-Bogan', 'Caterina Hill', '2022-02-22', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(9, 'Glenna Tromp', 'Individual', 'Steuber PLC', 'Allene Grady', '2024-12-07', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(10, 'Heather Kassulke', 'Business', 'Hickle, Farrell and Rohan', 'Lavada Borer', '2021-07-08', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(11, 'Madaline Morissette', 'Business', 'Wunsch, Schiller and Goyette', 'Dr. Sammy Howe', '2022-12-23', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(12, 'Wyatt Durgan', 'Business', 'Rolfson, Tromp and Adams', 'Jaunita Wyman IV', '2023-07-07', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(13, 'Mr. Ignatius Wilderman', 'Business', 'Boehm, Klein and Schmitt', 'Ignatius Pfeffer', '2020-06-03', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(14, 'Orval Mayert', 'Business', 'Williamson-Hill', 'Rigoberto Jacobi', '2023-02-20', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(15, 'Hailey Olson Sr.', 'Individual', 'Moore, Schultz and Schumm', 'Prudence Tillman', '2023-10-31', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(16, 'Autumn Bernhard', 'Individual', 'Hand, Cassin and West', 'Imogene McCullough Jr.', '2022-02-01', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(17, 'Etha Rolfson', 'Business', 'Breitenberg-Jenkins', 'Mr. Rosendo Dooley', '2024-04-18', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(18, 'Jordon Waters PhD', 'Business', 'Gutkowski, Langosh and Schowalter', 'Caroline Aufderhar', '2022-09-09', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(19, 'Mitchel Lebsack DVM', 'Individual', 'Grant LLC', 'Yasmin Conroy', '2022-05-15', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(20, 'Miss Iliana Waelchi', 'Business', 'Roob, Keebler and Koelpin', 'Isom Zemlak', '2025-01-12', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(21, 'Magdalena Block', 'Business', 'Kunde Group', 'Ruthie Russel', '2024-01-17', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(22, 'Dillon Bailey', 'Business', 'Grant, Carroll and Bartoletti', 'Jason Berge', '2021-03-04', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(23, 'Alvena Lind', 'Business', 'Konopelski Inc', 'Daphne Durgan Sr.', '2022-06-22', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(24, 'Thora Bayer MD', 'Business', 'Bednar-Mayert', 'Barney Schmitt', '2024-01-10', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(25, 'Dr. Zoie Rice DDS', 'Individual', 'Cassin LLC', 'Mrs. Cindy Lynch', '2022-07-17', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(26, 'Ludwig Upton', 'Individual', 'Rowe-Rutherford', 'Mr. Stanton Kuhlman DDS', '2020-05-23', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(27, 'Amy Casper', 'Business', 'O\'Reilly-Grimes', 'Maximo Sauer Sr.', '2024-05-23', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(28, 'Deondre Howe', 'Business', 'Lemke-Ryan', 'Rahul Parisian V', '2023-09-25', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(29, 'Mose Osinski', 'Business', 'Welch, Hahn and Sporer', 'Prof. Davin Effertz Jr.', '2024-09-30', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(30, 'Dahlia Rogahn', 'Individual', 'Legros, Anderson and Torp', 'Prof. Stuart Aufderhar', '2022-03-30', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(31, 'Mrs. Frances Glover DVM', 'Individual', 'Herman-Kunde', 'Erick Renner', '2021-11-25', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(32, 'Dr. Lucienne Ratke', 'Individual', 'Metz Group', 'Al Jacobson MD', '2020-03-24', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(33, 'Jensen Kuphal', 'Business', 'Boyle, Kutch and Bruen', 'Flo Spencer', '2022-06-02', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(34, 'Talon Lang', 'Business', 'Rolfson and Sons', 'Gilbert Wisoky', '2023-06-01', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(35, 'Marlee Von', 'Business', 'Howe-Hermann', 'Fletcher Quigley', '2022-01-06', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(36, 'Jennings Stehr', 'Business', 'Ankunding, Hartmann and Rutherford', 'Theron Schultz', '2021-03-20', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(37, 'Adriana Witting', 'Individual', 'Streich-Stokes', 'Orville Oberbrunner DVM', '2024-03-19', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(38, 'Dr. Gage Spinka V', 'Individual', 'Dickens Inc', 'Miss Filomena Feeney MD', '2021-10-22', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(39, 'Kylie Bauch III', 'Business', 'Heller, Trantow and Schulist', 'Della Muller', '2023-04-07', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(40, 'Mr. Braulio Kris', 'Individual', 'Kunde, Ziemann and Mueller', 'Caterina Lockman', '2021-07-18', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(41, 'Isabelle Lynch', 'Business', 'Olson Ltd', 'Dawson Rau', '2023-06-23', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(42, 'Bryana Abbott Sr.', 'Business', 'Hoppe-Cormier', 'Madisyn Kunde', '2020-09-10', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(43, 'Edythe Schultz MD', 'Individual', 'Green-Gaylord', 'Miss Idella Cummings', '2020-08-05', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(44, 'Norris Dicki', 'Business', 'Klocko, Lebsack and Brown', 'Constance Schmeler', '2024-05-29', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(45, 'Mrs. Jadyn Hettinger V', 'Individual', 'Aufderhar and Sons', 'Marcia Hayes I', '2024-06-10', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(47, 'Lauriane Armstrong', 'Business', 'Rowe Inc', 'Elian Shields', '2022-10-21', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(48, 'Prof. Ward Walsh IV', 'Business', 'Balistreri Inc', 'Daniela Fritsch', '2024-10-01', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(49, 'Ellie Leffler', 'Business', 'Cole Inc', 'Verlie O\'Hara', '2021-03-25', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(50, 'Bell Donnelly', 'Individual', 'Bradtke-Bashirian', 'Mr. Elian Kihn', '2023-06-03', '2025-02-18 04:46:54', '2025-02-18 04:46:54'),
(51, 'Muchirahondo', 'Business', 'Murewa High School', 'Simba Nyaruwata', '2019-02-21', '2025-02-18 11:16:21', '2025-02-19 11:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0dafd4c909692677bb1e11afc6801160', 'i:1;', 1739865041),
('0dafd4c909692677bb1e11afc6801160:timer', 'i:1739865041;', 1739865041);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_17_201830_add_two_factor_columns_to_users_table', 1),
(5, '2025_02_17_201935_create_personal_access_tokens_table', 1),
(6, '2025_02_17_212812_create_blacklisted_clients', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('S1wVN5C5AqWG6USnLsMZiSYm1hmveEvRWRCPO6YY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY1RlNDZ5bTVCWEJjbUF1TjJZZXd5bW1mM0Y4M1BiQkNLWktGM1RVRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEx0bEhvZUtIUEdZNTl0M3F2VjJlVGUuSTNFUERKcmpwR0xyc3lzdkdXdzhUNzBIWk5jS3ltIjt9', 1739881777);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Simbarashe Keith Nyaruwata', 'simbarashenyaruwata9@gmail.com', NULL, '$2y$12$LtlHoeKHPGY59t3qvV2eTe.I3EPDJrjpGLrsysvGWw8T70HZNcKym', NULL, NULL, NULL, 'IFwpKZ6ZYBevwf6pMrFDUuja8OupEvy4JWeFmWkyX6tbjWwMkopgwq5FLQLp', NULL, NULL, '2025-02-17 19:14:58', '2025-02-17 19:14:58'),
(2, 'Test User', 'test@example.com', '2025-02-18 04:33:09', '$2y$12$0uz74z5HonX1nzmi7dWtR.v2r8L5V.GaDHlafd3wqxapSIxUp8tLK', NULL, NULL, NULL, '67vEDNJzwZ', NULL, NULL, '2025-02-18 04:33:09', '2025-02-18 04:33:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklisted_clients`
--
ALTER TABLE `blacklisted_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklisted_clients`
--
ALTER TABLE `blacklisted_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
