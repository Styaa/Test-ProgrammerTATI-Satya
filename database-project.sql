-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2025 at 08:43 AM
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
-- Database: `test-programmertati-satya`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL DEFAULT '3',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `jabatan_id`, `password`, `atasan_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Hidayat', 1, '$2y$12$D.OxVXrEPU2GVpunX7u2WOglkAFl9a40OuLW/DRUP7rhNIUYsYum.', NULL, '2025-01-07 01:27:48', '2025-01-07 01:27:48'),
(2, 'Budi Santoso', 2, '$2y$12$gg0neX3bV0Dlaz5uTT2pHOOnNeVeyDJS2Nch2mFAUSFWbWO.mMEjq', 1, '2025-01-07 01:27:48', '2025-01-07 01:27:48'),
(3, 'Citra Lesitari', 2, '$2y$12$KjyW.zlPgrU1DGjP3X2ij.H1UMg.9nYSmIM.PVivCdmHpDjM.BK1O', 1, '2025-01-07 01:27:48', '2025-01-07 01:27:48'),
(4, 'Dian Pratama', 3, '$2y$12$qK8lMD5YgV4petM8dobVIOsu61sGFlicReellBa/3A/2XnvPawhN.', 2, '2025-01-07 01:27:49', '2025-01-07 01:27:49'),
(5, 'Eka Saputra', 3, '$2y$12$uacaTneJL8RsdTztfqxRLe5SLNgKC.hxdgo/7nrgVrN11QPJ2tGE.', 3, '2025-01-07 01:27:49', '2025-01-07 01:27:49'),
(6, 'Satya', 3, '$2y$12$4QJdqAoqVGXh2aZvndimw.oUhLNu6MDgnjoyKqi4XtqXMCsmN6U0C', 3, '2025-01-07 01:40:01', '2025-01-07 05:08:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `pegawais_atasan_id_foreign` (`atasan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_atasan_id_foreign` FOREIGN KEY (`atasan_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
