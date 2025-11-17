-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 04:32 AM
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
-- Database: `kkse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kkse', '$2y$12$IyqhfNnkKplv/o0Ya0.D2O9Y/PsHCB2oQxalqth3KbDcYT2QQR4DK', '2025-11-15 07:26:03', '2025-11-15 07:26:03');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_11_15_095526_create_sessions_table', 1);

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
('fuEHfgTu60Y9P91xZJcC08IPnKEk828zUyqTEY27', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3U2bG84SzB6SHZsZHJpVDNIR0N4eTVtQTczWFhZSnB5Z3pxSFNSSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763347439),
('ipPKiT3KDrp2INZYquG630IqlvI4i3r5BDgBTmBI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieExoR0lSb3hSdXR4eUhLTzFVa1VTNmFrWkNVNDdBRGkzTW5mNjhLbCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763347564),
('o1FHLYGUY8O997jhSmIiSNPdNvf4Synz0DI4JFii', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1NBak5nYWp4NEFEVngxQ0lnY2RxQVBReWd2TjZPN2pLMWxnNDhqRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763347306),
('OQC5s4GyQJcqrJ6VcPGwKhow9oAnl4gjMr7hqlk3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEtXRmRkbTBueUtnWHJhRjdWbG9sOVVUaTVoOG51THVjNnBzUEYySiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3JtIjtzOjU6InJvdXRlIjtzOjEyOiJ2aXNpdG9yLmZvcm0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763349050);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim_nip` varchar(50) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `tingkat` enum('mahasiswa/i','dosen/pegawai') NOT NULL,
  `keperluan` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `nama`, `nim_nip`, `department`, `tingkat`, `keperluan`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Genta Oktaviani', 'NIP197063173', 'Matematika', 'dosen/pegawai', 'Cum quis tenetur quam quia.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(2, 'Jatmiko Thamrin', 'NIM2055240', 'Matematika', 'mahasiswa/i', 'Optio quisquam enim voluptas molestiae.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(3, 'Kani Yolanda', 'NIP197018933', 'Manajemen', 'dosen/pegawai', 'Soluta suscipit sed quam molestiae corporis quo.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(4, 'Kala Prabowo S.Farm', 'NIM2010749', 'Manajemen', 'mahasiswa/i', 'Et sed non placeat reprehenderit fugit.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(5, 'Hairyanto Harimurti Maulana S.I.Kom', 'NIM2014144', 'Sistem Informasi', 'mahasiswa/i', 'Libero voluptates ratione ullam odit tenetur.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(6, 'Estiono Simanjuntak', 'NIM2017962', 'Matematika', 'mahasiswa/i', 'Cum aut dolor cum molestiae numquam sed quia.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(7, 'Olivia Laksmiwati', 'NIP197002858', 'Teknik Informatika', 'dosen/pegawai', 'Qui tempora placeat nihil et corrupti nulla voluptatem aut.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(8, 'Elma Siska Wahyuni', 'NIP197011024', 'Teknik Informatika', 'dosen/pegawai', 'Quaerat et atque aut alias voluptatum.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(9, 'Siti Vivi Usada S.T.', 'NIM2031327', 'Manajemen', 'mahasiswa/i', 'Dolore aliquid tempore voluptatem ut omnis repellat.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(10, 'Tasnim Samosir', 'NIM2085770', 'Manajemen', 'mahasiswa/i', 'Libero facere necessitatibus veritatis et repellendus.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(11, 'Sarah Wijayanti', 'NIM2098793', 'Manajemen', 'mahasiswa/i', 'Hic omnis autem debitis temporibus aut aut accusantium ut.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(12, 'Yoga Halim', 'NIP197005400', 'Elektro', 'dosen/pegawai', 'Ipsam sit saepe accusantium.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(13, 'Setya Darsirah Hidayanto', 'NIP197097791', 'Sistem Informasi', 'dosen/pegawai', 'Minus aperiam et autem quia.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(14, 'Prayogo Winarno', 'NIP197051166', 'Teknik Informatika', 'dosen/pegawai', 'Omnis et exercitationem porro vero.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(15, 'Tirta Sihotang', 'NIM2066041', 'Matematika', 'mahasiswa/i', 'Molestiae in animi autem iusto eum laborum voluptatem.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(16, 'Luwes Hendra Hardiansyah S.Sos', 'NIM2068763', 'Teknik Informatika', 'mahasiswa/i', 'Iure a qui accusantium aut quo omnis optio.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(17, 'Prakosa Ramadan', 'NIP197002599', 'Manajemen', 'dosen/pegawai', 'Ut sit corporis omnis labore.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(18, 'Ibrahim Kuswoyo', 'NIP197089900', 'Sistem Informasi', 'dosen/pegawai', 'Laudantium tempore provident assumenda quis vel.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(19, 'Uli Hasanah', 'NIP197093511', 'Sistem Informasi', 'dosen/pegawai', 'Atque delectus magni perferendis rerum sed necessitatibus.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(20, 'Gatot Cakrajiya Saragih', 'NIM2067999', 'Teknik Informatika', 'mahasiswa/i', 'Ut magni molestiae illum architecto aspernatur ut eveniet deleniti.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(21, 'Wasis Rajata', 'NIP197026371', 'Matematika', 'dosen/pegawai', 'Exercitationem consequuntur aliquid eum rerum.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(22, 'Rahayu Kasiyah Haryanti S.Kom', 'NIM2035100', 'Elektro', 'mahasiswa/i', 'Culpa praesentium laboriosam aut dolorem ex.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(23, 'Jasmin Safitri', 'NIM2098871', 'Teknik Informatika', 'mahasiswa/i', 'Quae totam veniam esse voluptas delectus doloremque rerum.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(24, 'Timbul Prima Mandala S.Ked', 'NIM2020163', 'Matematika', 'mahasiswa/i', 'Harum impedit sunt eius sint nobis corporis odio molestias.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(25, 'Rahman Ramadan', 'NIM2086613', 'Elektro', 'mahasiswa/i', 'Libero eum eum modi enim itaque aliquid minima.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(26, 'Novi Suryatmi M.Ak', 'NIP197077263', 'Elektro', 'dosen/pegawai', 'Quia sed nisi fugit qui.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(27, 'Vanesa Nurdiyanti', 'NIM2015916', 'Elektro', 'mahasiswa/i', 'In magni nisi et enim et est.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(28, 'Lukita Hutasoit', 'NIP197044034', 'Elektro', 'dosen/pegawai', 'Dolore dolorum libero inventore dolores qui voluptatem sed.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(29, 'Kairav Eluh Firmansyah', 'NIM2043790', 'Manajemen', 'mahasiswa/i', 'Sit quia eius rerum sint commodi.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(30, 'Candra Budiyanto', 'NIM2051220', 'Teknik Informatika', 'mahasiswa/i', 'Delectus maxime incidunt maiores et voluptatem eum aut quas.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(31, 'Ihsan Latupono S.E.', 'NIP197000601', 'Manajemen', 'dosen/pegawai', 'Nesciunt assumenda ut dolorem maxime sed deleniti.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(32, 'Febi Winarsih', 'NIM2022314', 'Elektro', 'mahasiswa/i', 'Soluta nulla praesentium velit quidem.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(33, 'Erik Agus Nainggolan M.Farm', 'NIP197039727', 'Elektro', 'dosen/pegawai', 'Doloremque dolorem quae sint nisi natus optio quas.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(34, 'Oskar Nainggolan', 'NIM2081290', 'Matematika', 'mahasiswa/i', 'Soluta qui repellat ab voluptatem quia.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(35, 'Bakianto Dongoran', 'NIM2058593', 'Sistem Informasi', 'mahasiswa/i', 'Qui ea odit sed quae.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(36, 'Darmanto Umay Wibisono', 'NIP197041488', 'Matematika', 'dosen/pegawai', 'Quasi voluptas sunt minima.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(37, 'Syahrini Winarsih', 'NIP197003894', 'Matematika', 'dosen/pegawai', 'Magnam nobis laboriosam et provident pariatur distinctio.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(38, 'Tedi Warta Firmansyah', 'NIM2002803', 'Elektro', 'mahasiswa/i', 'Eos eum doloremque exercitationem sit culpa excepturi dolorum enim.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(39, 'Dirja Mustofa', 'NIP197097075', 'Manajemen', 'dosen/pegawai', 'Porro placeat sed enim molestiae nihil.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(40, 'Opung Waluyo Nugroho S.Pt', 'NIM2045299', 'Sistem Informasi', 'mahasiswa/i', 'Consequatur voluptas in esse placeat sunt eveniet.', NULL, '2025-11-15 07:26:07', '2025-11-15 07:26:07'),
(41, 'Aldo', '2311512015', 'TeknikKomputer', 'mahasiswa/i', 'Mengunjungi Kawan', NULL, '2025-11-15 09:53:46', '2025-11-15 09:53:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
