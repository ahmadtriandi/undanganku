-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 06:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n1576883_undanganku`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int NOT NULL,
  `name_event` varchar(50) NOT NULL,
  `type_event` varchar(20) NOT NULL,
  `place_event` varchar(50) NOT NULL,
  `location_event` varchar(100) NOT NULL,
  `start_event` timestamp NOT NULL,
  `end_event` timestamp NOT NULL,
  `information_event` varchar(255) DEFAULT NULL,
  `image_event` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `name_event`, `type_event`, `place_event`, `location_event`, `start_event`, `end_event`, `information_event`, `image_event`, `created_at`, `updated_at`) VALUES
(1, 'Wedding', 'Wedding', 'Gedung X', 'Pati, Jawa Tengah', '2023-12-28 02:00:00', '2023-12-28 14:00:00', 'Mohon kehadirannya, terimakasih', '', '2023-11-21 05:56:44', '2023-11-21 05:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id_guest` int NOT NULL,
  `name_guest` varchar(50) NOT NULL,
  `address_guest` varchar(100) NOT NULL,
  `information_guest` varchar(150) DEFAULT NULL,
  `email_guest` varchar(40) NOT NULL,
  `phone_guest` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id_guest`, `name_guest`, `address_guest`, `information_guest`, `email_guest`, `phone_guest`, `created_at`, `updated_at`) VALUES
(1, 'Agnes Yolanda', 'Ki. Perintis Kemerdekaan No. 968, Gunungsitoli 99950, Lampung', 'Wartawan', 'melinda.pranowo@pratiwi.sch.id', '0338 4533 601', '2023-11-21 05:56:45', '2023-11-21 05:56:45'),
(2, 'Cinta Suryatmi', 'Kpg. Thamrin No. 718, Gunungsitoli 34173, Banten', 'Kepala Desa', 'dariati.pratiwi@oktaviani.com', '0279 2167 2022', '2023-11-21 05:56:45', '2023-11-21 05:56:45'),
(3, 'Bala Lukita Pradana M.Farm', 'Gg. Sudirman No. 822, Bau-Bau 33717, NTT', 'Perawat', 'ganep88@iswahyudi.asia', '0518 8513 432', '2023-11-21 05:56:45', '2023-11-21 05:56:45'),
(4, 'Gina Nasyidah', 'Jln. Abdul. Muis No. 403, Batam 78678, Jateng', 'Tukang Batu', 'vera81@gmail.com', '(+62) 545 6101 2124', '2023-11-21 05:56:45', '2023-11-21 05:56:45'),
(5, 'Bagas Ikhsan Suwarno M.Farm', 'Psr. B.Agam Dlm No. 620, Pangkal Pinang 84551, Sulteng', 'Pelaut', 'puspa.pangestu@yahoo.com', '(+62) 494 8697 205', '2023-11-21 05:56:45', '2023-11-21 05:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id_invitation` int NOT NULL,
  `qrcode_invitation` varchar(10) NOT NULL,
  `table_number_invitation` varchar(20) DEFAULT NULL,
  `type_invitation` enum('reguler','vip') NOT NULL,
  `information_invitation` varchar(255) DEFAULT NULL,
  `link_invitation` varchar(150) DEFAULT NULL,
  `image_qrcode_invitation` varchar(200) DEFAULT NULL,
  `send_email_invitation` tinyint(1) NOT NULL DEFAULT '0',
  `checkin_img_invitation` varchar(255) DEFAULT NULL,
  `checkout_img_invitation` varchar(255) DEFAULT NULL,
  `checkin_invitation` timestamp NULL DEFAULT NULL,
  `checkout_invitation` timestamp NULL DEFAULT NULL,
  `id_guest` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_02_133938_create_guest_table', 1),
(6, '2023_11_02_134436_create_invitation_table', 1),
(7, '2023_11_09_190758_create_event_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '2' COMMENT '1:admin: 2:resepsionis',
  `information` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `information`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@yukcoding.id', 'admin', '$2y$12$9wZqdPYrmC3J4kPHlbrc6.7T8WOT/09pEhV8HXMS/rPBoGJfQeBmK', 1, 'Admin Utama', NULL, NULL, NULL, NULL),
(2, 'Ujang', 'ujang@yukcoding.id', 'ujang', '$2y$12$a0UUhi3zwSoug1RDjk0mcuIzFMFdvEO0wv4YEV9kaTayYmenBD/5e', 2, 'Resepsionis 1', NULL, NULL, NULL, NULL),
(3, 'Badrul', 'badrul@yukcoding.id', 'badrul', '$2y$12$IiwpJFlXJpuPvYen74I89.361lyjo0xTgwOGlqF0HnbRXZlIRlvCa', 2, 'Resepsionis 2', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id_guest`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id_invitation`),
  ADD UNIQUE KEY `invitation_qrcode_invitation_unique` (`qrcode_invitation`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id_guest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id_invitation` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
