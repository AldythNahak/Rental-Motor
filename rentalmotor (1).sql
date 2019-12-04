-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 01:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$Wu7Ljhf1xjZjV2TfiiBFB.mL5oi2pie91TmJ.MPujOk4ntoRd5CV6', '2019-11-22 22:52:52', '2019-11-22 22:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(9) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_identity` varchar(25) NOT NULL,
  `waktu_sewa` varchar(50) NOT NULL,
  `waktu_sewa_return` varchar(50) NOT NULL,
  `harga_sewa` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `motor_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nama_user`, `no_identity`, `waktu_sewa`, `waktu_sewa_return`, `harga_sewa`, `no_telepon`, `motor_id`, `user_id`) VALUES
(13, 'Dinda', '69201712', '2019-11-19T14:02', 'NULL', 'Rp', '00088123231', 2, 0),
(14, 'Ardy', '562010114', '2019-11-19T16:00', 'NULL', 'Rp', '08234352354', 4, 0),
(15, 'Yafed', '672017229', '2019-11-19T13:00', 'NULL', 'Rp', '08234352354', 10, 0),
(16, 'Sarly', '32000', '2019-11-19T14:00', 'NULL', 'Rp', '0821312445', 5, 0),
(17, 'Nadia', '322018002', '2019-11-20T08:00', 'NULL', 'Rp', '08234352354', 7, 0),
(19, 'Aldyth', '69201712', '2019-11-21T13:00', 'NULL', 'Rp', '021836124132', 8, 0);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(9) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_identity` varchar(25) NOT NULL,
  `waktu_sewa` varchar(50) NOT NULL,
  `waktu_sewa_return` varchar(50) NOT NULL,
  `harga_sewa` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `motor_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `nama_user`, `no_identity`, `waktu_sewa`, `waktu_sewa_return`, `harga_sewa`, `no_telepon`, `motor_id`, `user_id`) VALUES
(1, 'Aldyth', '672017081', '2019-11-30 13:00:00', '2019-11-30 19:00:00', '20000', '082139898453', 1, 0),
(2, 'Irvons', '672017200', '2019-11-30 15:00:00', '2019-11-30T17:00', '15000', '082139892341', 2, 0),
(3, 'Kores', '672017000', '2019-11-21 13:00:00', '2019-11-21 14:00:00', '10000', '123143223123', 5, 0),
(4, 'Efraim', '672017185', '2019-11-21 13:30:00', '2019-11-21T17:00', 'Rp 20000', '082139898232', 7, 0),
(6, 'Jehezkiel', '672017096', '2019-11-30 13:00:00', '2019-11-30 15:00:00', '10000', '0821312445', 7, 0),
(9, 'Julio', '322018081', '2019-11-19T07:00', '2019-11-19T13:00', 'Rp 25000', '021836124132', 10, 0),
(10, 'Julio', '322018081', '2019-11-19T07:00', '2019-11-19T13:00', 'Rp 25000', '021836124132', 8, 0),
(11, 'Jay', '672017096', '2019-11-19T15:00', '2019-11-20T15:00', 'Rp 40000', '021836124132', 6, 0),
(12, 'William', '672017081', '2019-11-30 15:00:00', '2019-11-25 17:46:00', 'Rp 15000', '0821398314132', 9, 0),
(13, 'Fanly', '672017091', '2019-11-18T01:07', '2019-11-25 17:49:00', 'Rp 40000', '00088123231', 3, 0),
(14, 'Julio', '322018081', '2019-11-19T07:00', '2019-11-25 17:50:00', 'Rp 40000', '021836124132', 1, 0);

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
(4, '2019_11_22_054529_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` int(9) NOT NULL,
  `nama_motor` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL,
  `gas` varchar(20) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `warna_motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id`, `nama_motor`, `type`, `gas`, `plat_motor`, `warna_motor`) VALUES
(1, 'Honda Beat -ESp', 'Matic', 'Premium', 'H2134FH', 'Putih'),
(2, 'Honda Beat -ESp', 'Matic', 'Premium', 'H3424AB', 'Putih'),
(3, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H1045GB', 'Putih'),
(4, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H1192AD', 'Putih'),
(5, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H3366QS', 'Putih'),
(6, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H2049KL', 'Hitam'),
(7, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H4476RL', 'Hitam'),
(8, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H2436JD', 'Hitam'),
(9, 'Honda Beat -ESp', 'Matic', 'Pertalite', 'H3125JG', 'Hitam'),
(10, 'Honda Beat -ESp', 'Matic', 'Pertamax', 'H4325FG', 'Hitam');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nama_user` varchar(25) NOT NULL,
  `no_identity` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `waktu_sewa` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `id` int(100) NOT NULL,
  `waktu_booking` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nama_user`, `no_identity`, `email`, `waktu_sewa`, `no_telepon`, `id`, `waktu_booking`, `user_id`) VALUES
('Moncez', '672018094', '@', '2019-11-23T19:00', '21312435463', 11, '2019-11-23 15:33:00', 0),
('Aldyth', '672017081', 'aldyth@gmail.com', '2019-11-24T07:00', '081238994385', 12, '2019-11-23 23:10:00', 1),
('Bethran', '03062010', 'bethran@gmail.com', '2019-11-26T07:00', '00000000000', 13, '2019-11-25 17:25:00', 2),
('Bethran', '03062010', 'bethran@gmail.com', '2019-11-27T14:00', '00000000000', 14, '2019-11-25 17:28:00', 2),
('Aldyth', '672017081', 'aldyth@gmail.com', '2019-11-30T15:00', '081238994385', 15, '2019-11-25 17:35:00', 1),
('Aldyth', '672017081', 'aldyth@gmail.com', '2019-11-28T12:00', '081238994385', 16, '2019-11-25 17:41:00', 1),
('Bethran', '03062010', 'bethran@gmail.com', '2019-11-27T06:00', '00000000000', 17, '2019-11-25 17:57:00', 2),
('Dinda', '602018030', 'dinda@gmail.com', '2019-12-10T10:00', '08113816205', 18, '2019-11-25 18:58:00', 3),
('Dinda', '602018030', 'dinda@gmail.com', '2019-11-28T13:00', '08113816205', 19, '2019-11-25 19:00:00', 3),
('Aldyth', '672017081', 'aldyth@gmail.com', '2019-11-27T13:00', '081238994385', 20, '2019-11-25 19:12:00', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `no_identity`, `no_telepon`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aldyth', 'aldyth@gmail.com', NULL, '$2y$10$BJbGg2F0YEjJfjrEwn2HqeybjLM0/HpKPLoGjUD/avFpwmt6eri.C', '672017081', '081238994385', 'jln. Kemiri Barat', NULL, '2019-11-22 23:34:09', '2019-11-22 23:34:09'),
(2, 'Bethran', 'bethran@gmail.com', NULL, '$2y$10$iWvqbmU4qUxUetPEi4077OwAFWZmXSdw2CNNseau2KtGsgZ03m82W', '03062010', '00000000000', 'Kupang', NULL, '2019-11-23 23:23:48', '2019-11-23 23:23:48'),
(3, 'Dinda', 'dinda@gmail.com', NULL, '$2y$10$XSKLCJh9maa7.VnC7wcM2..QLMQdT4w56Io7frIMxuDurq2qmvjVK', '602018030', '08113816205', 'jln. Kemiri 3', NULL, '2019-11-25 04:58:32', '2019-11-25 04:58:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
