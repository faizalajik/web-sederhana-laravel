-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Okt 2021 pada 07.21
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `nama_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Lulus','Belum Lulus','DO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id_mahasiswa`, `nama_mahasiswa`, `jk`, `jurusan`, `status`, `created_at`, `updated_at`) VALUES
(2, 'dian meitasari', 'P', 'informatika', 'Lulus', NULL, '2021-10-18 22:17:27'),
(3, 'ranu kumbolo', 'P', 'informatika', 'Belum Lulus', NULL, '2021-10-18 22:17:39'),
(5, 'sastro', 'L', 'informatika', 'Belum Lulus', NULL, NULL),
(6, 'bona', 'L', 'informatika', 'Lulus', NULL, NULL),
(7, 'iqbal', 'L', 'informatika', 'Belum Lulus', NULL, NULL),
(8, 'dea', 'P', 'informatika', 'Belum Lulus', NULL, NULL),
(9, 'dini', 'P', 'informatika', 'DO', NULL, NULL),
(10, 'axel', 'L', 'informatika', 'Lulus', NULL, NULL),
(11, 'faizal', 'L', 'informatika', 'DO', '2021-10-18 14:16:08', '2021-10-18 14:16:08'),
(12, 'hani', 'P', 'ekonomi', 'Lulus', NULL, NULL),
(13, 'difa', 'L', 'ekonomi', 'Lulus', NULL, NULL),
(14, 'hana', 'P', 'ekonomi', 'Belum Lulus', NULL, NULL),
(15, 'saproni', 'L', 'ekonomi', 'DO', NULL, NULL),
(17, 'samsul', 'L', 'ekonomi', 'Belum Lulus', NULL, NULL),
(18, 'daniel', 'L', 'ekonomi', 'Belum Lulus', NULL, NULL),
(19, 'vania', 'P', 'ekonomi', 'Lulus', NULL, NULL),
(20, 'laura', 'P', 'ekonomi', 'Lulus', NULL, NULL),
(21, 'agus', 'L', 'ekonomi', 'DO', NULL, NULL),
(22, 'luna', 'P', 'ekonomi', 'DO', NULL, NULL),
(24, 'dhimas', 'L', 'informatika', 'Lulus', '2021-10-18 22:16:31', '2021-10-18 22:16:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2021_10_18_143419_create_mahasiswas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Faizal Aji', 'faizalajik23@gmail.com', 'admin', NULL, '$2y$10$c3vT5F5W4KB//hFW.3PB3OSiwJZbWHI.pBHFrb8sW0EFPLcfRU7rC', NULL, '2021-10-18 08:48:27', '2021-10-18 08:48:27'),
(2, 'Saipul', 'saipul@gmail.com', 'saipul', NULL, '$2y$10$QDeHjM7lGnpJ/80VErJC9e1QdH0uMu28EulbMdG9GXiSn2J7YAcr.', NULL, '2021-10-18 22:12:00', '2021-10-18 22:12:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id_mahasiswa`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id_mahasiswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
