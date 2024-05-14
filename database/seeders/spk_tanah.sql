-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 06:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_tanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `kode`, `nama_alternatif`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Cadek', NULL, '2024-05-13 19:52:40', '2024-05-13 19:57:39'),
(3, 'A2', 'Baet', NULL, '2024-05-13 19:59:04', '2024-05-13 19:59:04'),
(4, 'A3', 'Alue Naga', NULL, '2024-05-13 19:59:11', '2024-05-13 19:59:11'),
(5, 'A4', 'Lampeudaya', NULL, '2024-05-13 19:59:16', '2024-05-13 19:59:16'),
(6, 'A5', 'Miruk', NULL, '2024-05-13 19:59:25', '2024-05-13 19:59:25'),
(7, 'A6', 'Tanjong Deah', NULL, '2024-05-13 19:59:31', '2024-05-13 19:59:31'),
(8, 'A7', 'Kajhu', NULL, '2024-05-13 19:59:39', '2024-05-13 20:00:05'),
(9, 'A8', 'Blang Krueng', NULL, '2024-05-13 19:59:45', '2024-05-13 19:59:45'),
(10, 'A9', 'Lambaro Skep', NULL, '2024-05-13 19:59:52', '2024-05-13 19:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `atribut` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kode`, `nama_kriteria`, `role`, `bobot`, `atribut`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Perizinan', 'marketing', 0.5, 'benefit', '2024-05-13 12:25:07', '2024-05-13 12:35:26'),
(3, 'C2', 'Jarak dengan fasilitas umum', 'marketing', 0.4, 'cost', '2024-05-13 12:33:46', '2024-05-13 12:33:46'),
(4, 'C3', 'Harga lahan', 'marketing', 0.4, 'cost', '2024-05-13 12:33:58', '2024-05-13 12:33:58'),
(5, 'C4', 'Jarak ke pusat kota', 'marketing', 0.3, 'cost', '2024-05-13 12:34:21', '2024-05-13 12:34:21'),
(6, 'C5', 'Sarana pendidikan', 'marketing', 0.25, 'cost', '2024-05-13 12:34:41', '2024-05-13 12:34:41'),
(7, 'C6', 'Aksesbilitas jalan', 'marketing', 0.2, 'benefit', '2024-05-13 12:35:01', '2024-05-13 12:35:01'),
(8, 'C7', 'Sasaran pembeli', 'marketing', 0.1, 'benefit', '2024-05-13 12:35:12', '2024-05-13 12:35:12'),
(9, 'C1', 'Perizinan', 'finance', 0.6, 'benefit', '2024-05-13 20:04:37', '2024-05-13 20:04:37'),
(10, 'C3', 'Harga lahan', 'finance', 0.55, 'cost', '2024-05-13 20:04:51', '2024-05-13 20:04:51'),
(11, 'C10', 'Fisik dasar tanah', 'finance', 0.5, 'benefit', '2024-05-13 20:05:03', '2024-05-13 20:05:03'),
(12, 'C2', 'Jarak dengan fasilitas umum', 'finance', 0.4, 'cost', '2024-05-13 21:26:21', '2024-05-13 21:26:21'),
(13, 'C5', 'Sarana pendidikan', 'finance', 0.3, 'cost', '2024-05-13 21:26:40', '2024-05-13 21:26:40'),
(14, 'C9', 'Fasilitas air bersih', 'finance', 0.27, 'benefit', '2024-05-13 21:27:00', '2024-05-13 21:27:00'),
(15, 'C11', 'Sarana transportasi', 'finance', 0.25, 'benefit', '2024-05-13 21:27:21', '2024-05-13 21:27:21'),
(16, 'C4', 'Jarak ke pusat kota', 'finance', 0.2, 'cost', '2024-05-13 21:27:38', '2024-05-13 21:27:38'),
(17, 'C6', 'Aksesbilitas jalan', 'finance', 0.1, 'benefit', '2024-05-13 21:27:53', '2024-05-13 21:27:53'),
(18, 'C1', 'Perizinan', 'stakeholder', 0.76, 'benefit', '2024-05-13 21:34:46', '2024-05-13 21:34:46'),
(19, 'C3', 'Harga lahan', 'stakeholder', 0.7, 'cost', '2024-05-13 21:34:58', '2024-05-13 21:34:58'),
(20, 'C2', 'Jarak dengan fasilitas umum', 'stakeholder', 0.6, 'cost', '2024-05-13 21:35:16', '2024-05-13 21:35:16'),
(21, 'C10', 'Fisik dasar tanah', 'stakeholder', 0.5, 'benefit', '2024-05-13 21:35:31', '2024-05-13 21:35:31'),
(22, 'C6', 'Aksesbilitas jalan', 'stakeholder', 0.4, 'benefit', '2024-05-13 21:35:48', '2024-05-13 21:35:48'),
(23, 'C5', 'Sarana pendidikan', 'stakeholder', 0.32, 'cost', '2024-05-13 21:36:28', '2024-05-13 21:36:28'),
(24, 'C9', 'Fasilitas air bersih', 'stakeholder', 0.3, 'benefit', '2024-05-13 21:36:43', '2024-05-13 21:36:43'),
(25, 'C4', 'Jarak ke pusat kota', 'stakeholder', 0.2, 'cost', '2024-05-13 21:36:59', '2024-05-13 21:36:59'),
(26, 'C11', 'Sarana transportasi', 'stakeholder', 0.15, 'benefit', '2024-05-13 21:37:15', '2024-05-13 21:37:15'),
(27, 'C8', 'Akses jalan ke lokasi', 'stakeholder', 0.1, 'benefit', '2024-05-13 21:37:26', '2024-05-13 21:37:26');

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
(37, '0001_01_01_000000_create_users_table', 1),
(38, '0001_01_01_000001_create_cache_table', 1),
(39, '0001_01_01_000002_create_jobs_table', 1),
(40, '2024_03_24_173145_create_kriterias_table', 1),
(41, '2024_03_25_050534_create_sub_kriterias_table', 1),
(42, '2024_04_01_043343_create_alternatifs_table', 1);

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
('V9qUyDnRjOqQ7dZHgEGNgKQ29mkZssAlMR9RxMHt', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N1YmtyaXRlcmlhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImtPM2JIM1BWOXpjNUF5T1E2M3FjT1F6WWZQcmdKcnZXUWFUbFpSREsiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1715661764);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` varchar(255) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `id_kriteria`, `nama_subkriteria`, `role`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '1', 'Sudah memiliki perizinan yang lengkap', 'marketing', 100, '2024-05-13 12:35:46', '2024-05-13 12:35:46'),
(2, '1', 'Belum memiliki perizinan yang lengkap', 'marketing', 20, '2024-05-13 12:35:53', '2024-05-13 12:35:53'),
(3, '3', 'Jarak ke fasilitas umum <= 5 km', 'marketing', 100, '2024-05-13 12:36:04', '2024-05-13 12:36:04'),
(4, '3', 'Jarak dengan fasilitas umum > 5 s/d <= 10 km', 'marketing', 75, '2024-05-13 12:36:12', '2024-05-13 12:36:12'),
(5, '3', 'Jarak dengan fasilitas umum > 10 s/d <= 15 km', 'marketing', 50, '2024-05-13 12:36:21', '2024-05-13 12:36:21'),
(6, '3', 'Jarak dengan fasilitas umum > 15 km', 'marketing', 25, '2024-05-13 12:36:31', '2024-05-13 12:36:31'),
(7, '4', '<= Rp 1.000.000 m2', 'marketing', 100, '2024-05-13 12:36:47', '2024-05-13 12:36:47'),
(8, '4', '> Rp 1.000.000 s/d <= Rp 2.000.000 m2', 'marketing', 75, '2024-05-13 12:36:57', '2024-05-13 12:36:57'),
(9, '4', '> Rp 2.000.000 s/d <= Rp 3.000.000 m2', 'marketing', 50, '2024-05-13 12:37:04', '2024-05-13 12:37:04'),
(10, '4', 'Rp > 3.000.000 m2', 'marketing', 25, '2024-05-13 12:37:12', '2024-05-13 12:37:12'),
(11, '5', '<= 2 km', 'marketing', 100, '2024-05-13 12:37:28', '2024-05-13 12:37:28'),
(12, '5', '> 2 s/d <= 5 km', 'marketing', 75, '2024-05-13 12:37:37', '2024-05-13 12:37:37'),
(13, '5', '> 5 s/d <= 9 km', 'marketing', 50, '2024-05-13 12:37:46', '2024-05-13 12:37:46'),
(14, '5', '>  9 km', 'marketing', 25, '2024-05-13 12:37:55', '2024-05-13 12:37:55'),
(15, '6', '<= 2 km', 'marketing', 100, '2024-05-13 12:38:23', '2024-05-13 12:38:23'),
(16, '6', '> 2 s/d <= 5 km', 'marketing', 75, '2024-05-13 12:38:30', '2024-05-13 12:38:30'),
(17, '6', '> 5 s/d <= 9 km', 'marketing', 50, '2024-05-13 12:38:54', '2024-05-13 12:38:54'),
(18, '6', '>  9 km', 'marketing', 25, '2024-05-13 12:39:03', '2024-05-13 12:39:03'),
(19, '7', 'Beraspal', 'marketing', 100, '2024-05-13 12:39:10', '2024-05-13 12:39:10'),
(20, '7', 'Beton', 'marketing', 75, '2024-05-13 12:39:18', '2024-05-13 12:39:18'),
(21, '7', 'Berbatu', 'marketing', 50, '2024-05-13 12:39:26', '2024-05-13 12:39:26'),
(22, '7', 'Tanah', 'marketing', 25, '2024-05-13 12:39:33', '2024-05-13 12:39:33'),
(23, '8', 'Investor Properti', 'marketing', 100, '2024-05-13 12:39:40', '2024-05-13 12:39:40'),
(24, '8', 'Kelas menengah ke atas', 'marketing', 75, '2024-05-13 12:39:47', '2024-05-13 12:39:47'),
(25, '8', 'Keluarga muda', 'marketing', 50, '2024-05-13 12:39:53', '2024-05-13 12:39:53'),
(26, '8', 'Kelas menengah', 'marketing', 25, '2024-05-13 12:40:00', '2024-05-13 12:40:00'),
(27, '9', 'Sudah memiliki perizinan yang lengkap', 'finance', 100, '2024-05-13 21:28:18', '2024-05-13 21:28:18'),
(28, '9', 'Belum memiliki perizinan yang lengkap', 'finance', 20, '2024-05-13 21:28:24', '2024-05-13 21:28:24'),
(29, '10', '<= Rp 1.000.000 m2', 'finance', 100, '2024-05-13 21:28:58', '2024-05-13 21:28:58'),
(30, '10', '> Rp 1.000.000 s/d <= Rp 2.000.000 m2', 'finance', 75, '2024-05-13 21:29:05', '2024-05-13 21:29:05'),
(31, '10', '> Rp 2.000.000 s/d <= Rp 3.000.000 m2', 'finance', 50, '2024-05-13 21:29:13', '2024-05-13 21:29:13'),
(32, '10', 'Rp > 3.000.000 m2', 'finance', 25, '2024-05-13 21:29:19', '2024-05-13 21:29:19'),
(33, '11', 'Kemiringan tanah <= 2%', 'finance', 100, '2024-05-13 21:29:27', '2024-05-13 21:29:27'),
(34, '11', 'Kemiringan tanah > 2% s/d <= 5%', 'finance', 75, '2024-05-13 21:29:49', '2024-05-13 21:29:49'),
(35, '11', 'Kemiringan tanah > 5% s/d <= 10%', 'finance', 50, '2024-05-13 21:30:06', '2024-05-13 21:30:06'),
(36, '11', 'Kemiringan tanah >10%', 'finance', 5, '2024-05-13 21:30:24', '2024-05-13 21:30:24'),
(37, '12', 'Jarak ke fasilitas umum <= 5 km', 'finance', 100, '2024-05-13 21:30:37', '2024-05-13 21:30:37'),
(38, '12', 'Jarak dengan fasilitas umum > 5 s/d <= 10 km', 'finance', 75, '2024-05-13 21:30:45', '2024-05-13 21:30:45'),
(39, '12', 'Jarak dengan fasilitas umum > 10 s/d <= 15 km', 'finance', 50, '2024-05-13 21:30:52', '2024-05-13 21:30:52'),
(40, '12', 'Jarak dengan fasilitas umum > 15 km', 'finance', 25, '2024-05-13 21:31:02', '2024-05-13 21:31:02'),
(41, '13', '<= 2 km', 'finance', 100, '2024-05-13 21:31:23', '2024-05-13 21:31:23'),
(42, '13', '> 2 s/d <= 5 km', 'finance', 75, '2024-05-13 21:31:34', '2024-05-13 21:31:34'),
(43, '13', '> 5 s/d <= 9 km', 'finance', 50, '2024-05-13 21:31:43', '2024-05-13 21:31:43'),
(44, '13', '>  9 km', 'finance', 25, '2024-05-13 21:31:48', '2024-05-13 21:31:48'),
(45, '14', 'PDAM', 'finance', 100, '2024-05-13 21:31:58', '2024-05-13 21:31:58'),
(46, '14', 'Sumur', 'finance', 75, '2024-05-13 21:32:05', '2024-05-13 21:32:05'),
(47, '14', 'Sungai', 'finance', 50, '2024-05-13 21:32:12', '2024-05-13 21:32:12'),
(48, '15', 'Bus', 'finance', 100, '2024-05-13 21:32:21', '2024-05-13 21:32:21'),
(49, '15', 'Taxi', 'finance', 75, '2024-05-13 21:32:31', '2024-05-13 21:32:31'),
(50, '15', 'Becak', 'finance', 50, '2024-05-13 21:32:38', '2024-05-13 21:32:38'),
(51, '15', 'Ojek', 'finance', 25, '2024-05-13 21:32:46', '2024-05-13 21:32:46'),
(52, '16', '<= 2 km', 'finance', 100, '2024-05-13 21:32:53', '2024-05-13 21:32:53'),
(53, '16', '> 2 s/d <= 5 km', 'finance', 75, '2024-05-13 21:33:01', '2024-05-13 21:33:01'),
(54, '16', '> 5 s/d <= 9 km', 'finance', 50, '2024-05-13 21:33:07', '2024-05-13 21:33:07'),
(55, '16', '>  9 km', 'finance', 25, '2024-05-13 21:33:14', '2024-05-13 21:33:14'),
(56, '17', 'Beraspal', 'finance', 100, '2024-05-13 21:33:22', '2024-05-13 21:33:22'),
(57, '17', 'Beton', 'finance', 75, '2024-05-13 21:33:31', '2024-05-13 21:33:31'),
(58, '17', 'Berbatu', 'finance', 50, '2024-05-13 21:33:40', '2024-05-13 21:33:40'),
(59, '17', 'Tanah', 'finance', 25, '2024-05-13 21:33:46', '2024-05-13 21:33:46'),
(60, '18', 'Sudah memiliki perizinan yang lengkap', 'stakeholder', 100, '2024-05-13 21:38:11', '2024-05-13 21:38:11'),
(61, '18', 'Belum memiliki perizinan yang lengkap', 'stakeholder', 20, '2024-05-13 21:38:17', '2024-05-13 21:38:17'),
(62, '19', '<= Rp 1.000.000 m2', 'stakeholder', 100, '2024-05-13 21:38:24', '2024-05-13 21:38:24'),
(63, '19', '> Rp 1.000.000 s/d <= Rp 2.000.000 m2', 'stakeholder', 75, '2024-05-13 21:38:30', '2024-05-13 21:38:30'),
(64, '19', '> Rp 2.000.000 s/d <= Rp 3.000.000 m2', 'stakeholder', 50, '2024-05-13 21:38:36', '2024-05-13 21:38:36'),
(65, '19', 'Rp > 3.000.000 m2', 'stakeholder', 25, '2024-05-13 21:38:41', '2024-05-13 21:38:41'),
(66, '20', 'Jarak ke fasilitas umum <= 5 km', 'stakeholder', 100, '2024-05-13 21:38:47', '2024-05-13 21:38:47'),
(67, '20', 'Jarak dengan fasilitas umum > 5 s/d <= 10 km', 'stakeholder', 75, '2024-05-13 21:38:54', '2024-05-13 21:38:54'),
(68, '20', 'Jarak dengan fasilitas umum > 10 s/d <= 15 km', 'stakeholder', 50, '2024-05-13 21:39:01', '2024-05-13 21:39:01'),
(69, '20', 'Jarak dengan fasilitas umum > 15 km', 'stakeholder', 25, '2024-05-13 21:39:08', '2024-05-13 21:39:08'),
(70, '21', 'Kemiringan tanah <= 2%', 'stakeholder', 100, '2024-05-13 21:39:17', '2024-05-13 21:39:17'),
(71, '21', 'Kemiringan tanah > 2% s/d <= 5%', 'stakeholder', 75, '2024-05-13 21:39:27', '2024-05-13 21:39:27'),
(72, '21', 'Kemiringan tanah > 5% s/d <= 10%', 'stakeholder', 50, '2024-05-13 21:39:33', '2024-05-13 21:39:33'),
(73, '21', 'Kemiringan tanah >10%', 'stakeholder', 25, '2024-05-13 21:39:38', '2024-05-13 21:39:38'),
(74, '22', 'Beraspal', 'stakeholder', 100, '2024-05-13 21:39:46', '2024-05-13 21:39:46'),
(75, '22', 'Beton', 'stakeholder', 75, '2024-05-13 21:39:52', '2024-05-13 21:39:52'),
(76, '22', 'Berbatu', 'stakeholder', 50, '2024-05-13 21:39:58', '2024-05-13 21:39:58'),
(77, '22', 'Tanah', 'stakeholder', 25, '2024-05-13 21:40:03', '2024-05-13 21:40:03'),
(78, '23', '<= 2 km', 'stakeholder', 100, '2024-05-13 21:40:13', '2024-05-13 21:40:13'),
(79, '23', '> 2 s/d <= 5 km', 'stakeholder', 75, '2024-05-13 21:40:20', '2024-05-13 21:40:20'),
(80, '23', '> 5 s/d <= 9 km', 'stakeholder', 50, '2024-05-13 21:40:27', '2024-05-13 21:40:27'),
(81, '23', '>  9 km', 'stakeholder', 25, '2024-05-13 21:40:35', '2024-05-13 21:40:35'),
(82, '24', 'PDAM', 'stakeholder', 100, '2024-05-13 21:40:58', '2024-05-13 21:40:58'),
(83, '24', 'Sumur', 'stakeholder', 75, '2024-05-13 21:41:05', '2024-05-13 21:41:05'),
(84, '24', 'Sungai', 'stakeholder', 50, '2024-05-13 21:41:10', '2024-05-13 21:41:10'),
(85, '25', '<= 2 km', 'stakeholder', 100, '2024-05-13 21:41:16', '2024-05-13 21:41:16'),
(86, '25', '> 2 s/d <= 5 km', 'stakeholder', 75, '2024-05-13 21:41:23', '2024-05-13 21:41:23'),
(87, '25', '> 5 s/d <= 9 km', 'stakeholder', 50, '2024-05-13 21:41:30', '2024-05-13 21:41:30'),
(88, '25', '>  9 km', 'stakeholder', 25, '2024-05-13 21:41:36', '2024-05-13 21:41:36'),
(89, '26', 'Bus', 'stakeholder', 100, '2024-05-13 21:41:42', '2024-05-13 21:41:42'),
(90, '26', 'Taxi', 'stakeholder', 75, '2024-05-13 21:41:48', '2024-05-13 21:41:48'),
(91, '26', 'Becak', 'stakeholder', 50, '2024-05-13 21:41:54', '2024-05-13 21:41:54'),
(92, '26', 'Ojek', 'stakeholder', 25, '2024-05-13 21:42:00', '2024-05-13 21:42:00'),
(93, '27', 'Jalan nasional', 'stakeholder', 100, '2024-05-13 21:42:08', '2024-05-13 21:42:08'),
(94, '27', 'Jalan provinsi', 'stakeholder', 75, '2024-05-13 21:42:16', '2024-05-13 21:42:16'),
(95, '27', 'Jalan kabupaten', 'stakeholder', 50, '2024-05-13 21:42:24', '2024-05-13 21:42:24'),
(96, '27', 'Jalan kota', 'stakeholder', 25, '2024-05-13 21:42:30', '2024-05-13 21:42:30'),
(97, '27', 'Jalan desa', 'stakeholder', 20, '2024-05-13 21:42:36', '2024-05-13 21:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', 'marketing', 'marketing', '$2y$12$yILUdqPWi0bdLSNzNRYIN.B3nMGDvmNv0YsZ1IfNxR3az96nOq7Fy', NULL, '2024-05-13 19:52:24', '2024-05-13 19:52:24'),
(2, 'Finance', 'finance', 'finance', '$2y$12$59zI6a8w2151qja9yknIDuFLG3ixhwFRXYMUDzh2RcdxxS1Lp7Y9y', NULL, '2024-05-13 19:52:24', '2024-05-13 19:52:24'),
(3, 'Stakeholder', 'stakeholder', 'stakeholder', '$2y$12$Gr0y8Qr.h4RPA3UQxSuCHOkTfziQcymHDGtdGZg/F0DM0fUZQiMm.', NULL, '2024-05-13 19:52:25', '2024-05-13 19:52:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
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
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
