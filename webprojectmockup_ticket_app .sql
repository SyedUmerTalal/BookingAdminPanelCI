-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2021 at 02:34 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojectmockup_ticket_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `booking_date` datetime NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>booked,0=>cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_resolved` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `user_id`, `title`, `description`, `is_resolved`, `status`, `created_at`, `updated_at`) VALUES
(77, 1, 'Check', 'Complain', 1, 1, '2021-08-17 09:21:41', '2021-08-17 09:21:41'),
(78, 1, 'hey check', 'Notification', 1, 1, '2021-08-18 09:01:36', '2021-08-18 09:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'karachi', 1, NULL, NULL),
(2, 'hyderabad', 1, NULL, NULL),
(3, 'sukkur', 1, NULL, NULL),
(4, 'Nawabshah', 1, NULL, NULL),
(5, 'sukkur', 1, NULL, NULL),
(6, 'Nawabshah', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_vehicles`
--

CREATE TABLE `location_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` smallint(5) UNSIGNED NOT NULL,
  `location_id` smallint(5) UNSIGNED NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `amount` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_vehicles`
--

INSERT INTO `location_vehicles` (`id`, `vehicle_id`, `location_id`, `departure_time`, `arrival_time`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '11:41:28', '12:41:28', 365.00, '2021-07-30 15:41:28', '2021-07-30 15:41:28');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_07_29_184623_create_vehicles_table', 1),
(6, '2021_07_29_185713_create_locations_table', 1),
(7, '2021_07_29_191233_create_seats_table', 1),
(8, '2021_07_29_191615_create_bookings_table', 1),
(9, '2021_07_29_193302_create_complains_table', 1),
(10, '2021_07_29_193328_create_notifications_table', 1),
(11, '2021_07_29_200340_create_location_vehicles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(98, 'Ajax', 'check ajax working properly', 1, '2021-08-17 09:31:22', '2021-08-17 09:31:22');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Login', 'c9228cb76a3fcb4292e92ce04a39a6eb9eb1974ce3a55c65410d5baba4598294', '[\"*\"]', NULL, '2021-07-30 09:20:16', '2021-07-30 09:20:16'),
(2, 'App\\Models\\User', 1, 'Login', '2e766149bf0415b89d8dcc441de782194dd26018851750b05139dfd839d2bbf7', '[\"*\"]', NULL, '2021-07-30 09:21:13', '2021-07-30 09:21:13'),
(3, 'App\\Models\\User', 1, 'Login', '6f9a5bf33cf5cec30eb6266e3bb37bde855179bc7fc672aece1100b829653b06', '[\"*\"]', NULL, '2021-07-30 09:27:14', '2021-07-30 09:27:14'),
(4, 'App\\Models\\User', 1, 'Login', 'a732a7331dda8575be478302b667f74795b9acd8f7b39d99ea4a2fed4b82f13c', '[\"*\"]', NULL, '2021-07-30 10:09:52', '2021-07-30 10:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('first','business','economy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `title`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'first', 1, '2021-07-30 15:48:15', NULL),
(2, '2', 'first', 1, '2021-07-30 15:53:33', NULL),
(3, '3', 'business', 1, '2021-07-30 15:33:22', NULL),
(4, '4', 'business', 1, '2021-07-30 15:54:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `number`, `address`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Syed Umer Talal Bukhari', NULL, 'umer@gmail.com', '03242422072', 'here is my address', NULL, '123', NULL, 1, '2021-08-10 14:58:14', NULL),
(49, 'muhammad.minhaj@technado.co', NULL, 'ab@g.com', '32322', 'OIP', NULL, '$2y$10$AkkvkdLjnL.a0WeDCNXuG.kbJSmVzaSxZEW6bSixVxkrtAw5ov1Gq', NULL, 1, '2021-08-16 12:04:11', '2021-08-16 12:04:11'),
(50, 'muhammad.minhaj@technado.co', NULL, 'q@abc.com', '03242422072', 'OIP', NULL, '$2y$10$UTcYvvPoMTZiiB.jwC8j2O2Wlmz2fGG7aVjeonTdVgsaC/YqDIPFq', NULL, 1, '2021-08-16 12:04:48', '2021-08-16 12:04:48'),
(52, 'muhammad.minhaj@technado.co', NULL, 'a@abc.com', '03242422072', 'OIP', NULL, '$2y$10$uMcP.TWnrvqvpmKHW3gtLujfRzQv5xOW8q/ECfy1GgRBQgVNycC7q', NULL, 1, '2021-08-16 12:05:11', '2021-08-16 12:05:11'),
(53, 'muhammad.minhaj@technado.co', NULL, 'ashok@gmail.com', '03131212131', 'OIP', NULL, '$2y$10$R16wG6B1.kWMEiHR9LlSaenKJ2/f3UGIjUcdJVVYRB/fgjRfFvhh2', NULL, 1, '2021-08-16 12:05:26', '2021-08-16 12:05:26'),
(54, 'muhammad.minhaj@technado.co', NULL, 'che@gmail.com', '03131212131', 'OIP', NULL, '$2y$10$15YUgmhZfJMwxBR8.HPARuQv9pMltwGqpDy6/In.A0hXcquB24HLG', NULL, 1, '2021-08-16 12:05:40', '2021-08-16 12:05:40'),
(55, 'muhammad.minhaj@technado.co', NULL, 'admin@admin.com', '03131212131', 'OIP', NULL, '$2y$10$t3qGoAZmWKrdsQMjGbWQFeIRE5qQy2BVin1lvjHQ5r588/798pXJ.', NULL, 1, '2021-08-16 14:26:33', '2021-08-16 14:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_seats` smallint(5) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `title`, `registration_number`, `no_of_seats`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Oip', '1133', 102, 1, '2021-08-25 19:51:53', '2021-08-26 19:51:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_vehicles`
--
ALTER TABLE `location_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location_vehicles`
--
ALTER TABLE `location_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
