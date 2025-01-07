-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 07:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resepkitaherd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `resep_id`, `created_at`, `updated_at`) VALUES
(2, 6, 3, '2024-12-09 10:13:31', '2024-12-09 10:13:31'),
(4, 6, 6, '2024-12-16 11:50:27', '2024-12-16 11:50:27');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `resep_id`, `created_at`, `updated_at`) VALUES
(43, 6, 3, '2024-12-09 10:06:05', '2024-12-09 10:06:05');

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
(4, '2024_11_20_061944_create_reseps_table', 1),
(5, '2024_11_20_062016_create_bookmarks_table', 1),
(6, '2024_11_20_062050_create_comments_table', 1),
(7, '2024_11_20_062123_create_contact_uses_table', 1),
(8, '2024_11_20_062152_create_faqs_table', 1),
(9, '2024_11_20_062218_create_likes_table', 1),
(10, '2024_11_20_062240_create_notifications_table', 1),
(11, '2024_11_20_062327_create_search_histories_table', 2),
(12, '2024_11_20_062347_create_shares_table', 2),
(13, '2024_11_20_062407_create_subscribes_table', 2),
(14, '2024_11_20_062432_create_views_table', 2),
(15, '2024_11_20_063205_create_sessions_table', 3),
(16, '2024_11_20_075340_add_category_to_reseps_table', 4),
(17, '2024_11_24_053730_search_query', 5),
(18, '2024_11_24_053857_search_history', 6),
(19, '2024_11_24_061643_search_histories', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reseps`
--

CREATE TABLE `reseps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `ingredients` text DEFAULT NULL,
  `steps` text DEFAULT NULL,
  `cooking_time` varchar(255) NOT NULL,
  `portion` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` enum('makanan','minuman') NOT NULL DEFAULT 'makanan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseps`
--

INSERT INTO `reseps` (`id`, `user_id`, `title`, `descriptions`, `ingredients`, `steps`, `cooking_time`, `portion`, `image_path`, `category`, `created_at`, `updated_at`) VALUES
(3, 4, 'Opor Ayam', 'Opor ayam memang identik sama lebaran ya bun.. Pake ketupat dan menu pendamping lainnya.. Tapi kl lagi pengen, ga harus nunggu lebaran boleh kan yaaa. Yuk cobain pake porsi mini aja, 1/2 ekor. Pas deh buat serumah. Oiya resep asli ini pake cabe yg dihaluskan juga.. Krn aku punya anak kecil jadi aku skip cabe nya.', '1/2 ekor ayam\r\n200 ml santan\r\n500 ml air\r\n2 sdt garam\r\n1 sdt gula\r\n1 sdm penyedap rasa\r\nBumbu halus:\r\n5 siung bawang merah\r\n3 siung bawang putih\r\n3 butir kemiri\r\n1 sdt ketumbar\r\n1 cm kunyit(sy ganti 1sdm kunyit bubuk)\r\nBumbu aromatik:\r\n2 lembar daun salam\r\n2 lembar daun jeruk\r\n1 batang serai geprek\r\n1 ruas jahe geprek\r\n1 cm lengkuas', 'Siapkan bumbu halus dan bumbu aromatik\r\nTumis bumbu hingga halus. Rebus ayam sebentar\r\nMasukkan air, didihkan bersama ayam dan bumbu\r\nTuang santan, beri garam, gula, penyedap\r\nMasak hingga bumbu meresap, jgn lupa utk koreksi rasa. Sajikan dgn taburan bawang goreng', '30', '4', 'images/to8QrQNyDeC5ztRrjAwIo7MOeAkOKrs6SmQZGB8F.webp', 'makanan', '2024-11-23 21:31:37', '2024-11-23 21:31:37'),
(4, 5, 'Pesmol Ikan Kembung', 'Pesmol Ikan Kembung yang super enak, bumbu meresap. Cocok banget dimakan dengan nasi hangat. Apalagi dikonsumsi saat hujan dingin-dingin begini, super lezat bangetttt.', '750 gram Ikan Kembung Como\r\n12 buah Cabai rawit\r\n2 buah Cabai merah besar, iris serong\r\n4 helai Daun bawang, iris serong\r\nSecukupnya Minyak goreng\r\n2 sdt Garam halus\r\nBumbu Halus:\r\n8 butir Bawang merah\r\n5 butir Bawang putih\r\n2 buah Cabai merah besar\r\n2 ruas Kunyit\r\n1 ruas Jahe\r\n3 butir Kemiri\r\nPelengkap:\r\n200 ml Air\r\n1,5 sdt Garam halus\r\n1,5 sdt Gula pasir\r\n1 sdt Kaldu jamur\r\nSecukupnya gula merah', 'Cuci bersih ikan kembung. Kerat-kerat bagian tubuh ikan kembung. Tambahkan sedikit garam halus.\r\nPanaskan minyak goreng, goreng ikan kembung hingga kuning kecoklatan. Angkat dan tiriskan.\r\nHaluskan bumbu halus. Tuang sedikit minyak goreng di wajan, tumis bumbu halus hingga harum, masukkan sedikit air, masak sampai mendidih.\r\nMasukkan garam halus, gula pasir, gula merah dan kaldu jamur. Aduk rata. Masukkan irisan cabe merah besar dan cabe rawit utuh, aduk-aduk sebentar, masukkan ikan, masak sampai bumbu meresap.\r\nKoreksi rasa, jika sudah pas taburi irisan daun bawang.\r\nPesmol ikan kembung siap disajikan.', '45', '4', 'images/SPIGYnDhkASgmUtgRs87ZwjOGtsQenaMzhuEWHWd.webp', 'makanan', '2024-11-23 21:41:01', '2024-11-23 21:41:01'),
(5, 5, 'Cappuccino Cincau', 'Segeernya.\r\nCuaca tidak terik tapi panas sekali, adeemnya minum Cappuccino Cincau.., Alhamdulillah...', '2 sdm cincau (sy beli cincau sj)\r\n1 sahcet kopi Indocafe Cappuccino\r\n1 sdm gula pasir\r\n2 sdm SKM\r\n50 ml air hangat\r\n50 ml air dingin\r\nSecukupnya es batu', 'Campur jadi satu kopi cappuccino, gula pasir dan air panas, aduk rata. Tambahkan SKM, aduk rata.\r\nMasukkan serutan cincau, aduk rata. Tambahkan es batu.\r\nSajikan👍👍.\r\nNote: simpan es cincau cappuccino ke dalam kulkas jika tidak langsung disajikan. Jika suka manis, bisa langsung disajikan tanpa ditambahkan es batu.\r\nNote: cincau bisa dimasukkan saat akan disajikan ke dalam gelas saji.', '10', '1', 'images/HCph3HqPCLTvE7ZN81BHB26HpZwBuLiKWkCwCND9.webp', 'minuman', '2024-11-23 21:44:10', '2024-11-23 21:44:10'),
(6, 6, 'Ayam Bakar', 'Ayam Bakar adalah hidangan ayam yang dibumbui dengan rempah seperti bawang putih, cabai, kunyit, dan kecap manis, lalu dipanggang hingga matang. Proses pemanggangan memberikan rasa gurih, pedas, dan manis dengan aroma khas bakaran. Ayam bakar sering disajikan dengan nasi putih dan sambal, menjadikannya hidangan yang lezat dan populer di Indonesia.', 'Resep Ayam Bakar\r\nBahan-Bahan:\r\n1 ekor ayam utuh, potong menjadi 4-6 bagian\r\n2 sendok makan air jeruk nipis\r\n2 sendok teh garam\r\n2 sendok makan minyak goreng untuk olesan\r\nBumbu Halus:\r\n6 siung bawang putih\r\n4 siung bawang merah\r\n4 buah cabai merah (sesuai selera)\r\n3 cm kunyit\r\n3 cm jahe\r\n2 batang serai (ambil bagian putihnya, memarkan)\r\n3 lembar daun jeruk purut\r\n1 sendok teh gula merah serut\r\n1 sendok teh ketumbar\r\n1 sendok teh merica bubuk\r\n3 sendok makan kecap manis\r\n2 sendok makan minyak goreng', 'Menyiapkan Ayam:\r\n\r\nCuci bersih ayam yang sudah dipotong.\r\nLumuri ayam dengan air jeruk nipis dan garam, diamkan selama 10 menit untuk mengurangi bau amis.\r\nMembuat Bumbu Halus:\r\n\r\nHaluskan bawang putih, bawang merah, cabai merah, kunyit, dan jahe menggunakan blender atau cobek hingga halus.\r\nTumis bumbu halus bersama serai, daun jeruk, dan minyak goreng hingga harum.\r\nMemasak Ayam:\r\n\r\nMasukkan ayam ke dalam tumisan bumbu halus, aduk rata hingga ayam terbalur bumbu.\r\nTambahkan gula merah, ketumbar, merica bubuk, kecap manis, dan sedikit air. Masak ayam hingga matang dan bumbu meresap, sekitar 15-20 menit.\r\nJika air sudah mengering dan ayam sudah hampir matang, angkat ayam dan tiriskan.\r\nMembakar Ayam:\r\n\r\nPanaskan grill atau panggangan.\r\nOlesi ayam dengan sedikit minyak goreng agar tidak lengket saat dibakar.\r\nBakar ayam di atas api sedang, balik-balik ayam setiap beberapa menit agar tidak gosong, hingga ayam berwarna kecokelatan dan memiliki aroma bakar yang khas. Jangan lupa untuk mengoleskan sisa bumbu ke ayam selama proses pemanggangan.\r\nSajikan:\r\n\r\nSetelah ayam matang, angkat dan sajikan di atas piring saji.\r\nNikmati ayam bakar dengan nasi putih hangat dan sambal favorit.', '30', '6', 'images/XJfLlOzTP3K1iHuJKJ6ZpCBCA5w1kboBI5b9Qat9.jpg', 'makanan', '2024-11-24 12:17:04', '2024-12-09 09:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `search_histories`
--

CREATE TABLE `search_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `search_query` varchar(255) NOT NULL,
  `resep_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_query`
--

CREATE TABLE `search_query` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `search_query` varchar(255) NOT NULL,
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
('RqoS18bYTd1ROpaJtEb76iNiia78JFsqZOjgV66V', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTUzaEpDNVlpaVFIODUxbzJzTnFpRjI2ZjI4R21YOTRKUk5WSGJwTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1734378802),
('U6OHsb8pa3YCesurRaXPhP48JK0InCIMRtIf9bv4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT2dVTmZwZkxseXgwakVOZGFSMUxZME9TRlV1V2UycVc0Smx5ZGJTYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734374976);

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `platform` varchar(255) NOT NULL,
  `share_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subscribed_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_number`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'krisna', 'krisna@gmail.com', '0864767692', '$2y$12$648zvC7EW0WHZE596L6Bo.L8hcF7Z6UFATW.MqZTv/8ZLjai3gpCy', 'user', '2024-11-20 00:02:00', '2024-11-20 00:02:00'),
(2, 'rezky', 'rezky@gmail.com', '0877432665', '$2y$12$EWNeCnAaLefa9T9.Gs0ABe7KXrl0LB/9GbMkgW5ultS.ZKRgiEZJW', 'user', '2024-11-20 04:04:32', '2024-11-20 04:04:32'),
(3, 'agus', 'agus@gmail.com', '082876778980', '$2y$12$bE0QpFVxkehGh2SHDy.z3eQMZaLycYRwKerOtYgp5I2UaZDMbXZ6y', 'user', '2024-11-20 04:11:37', '2024-11-20 04:11:37'),
(4, 'mamalily', 'mamalily@gmail.com', '08567432534', '$2y$12$7bfogcAR1b8UBBrLT1me6O0i/gIIcPAAUe0uX7.PFk3KSn6FI3U/y', 'user', '2024-11-23 19:07:15', '2024-11-23 19:07:15'),
(5, 'yulikitchen', 'yulikitchen@gmail.com', '0897654321', '$2y$12$sEuGWqVrb0d2bL7C9YQ9EOmsC6Sm5Uur1XszxO5fQHM.PWy139Xw2', 'user', '2024-11-23 21:38:41', '2024-11-23 21:38:41'),
(6, 'syamil', 'syamilchalifah123@gmail.com', '85718566762', '$2y$12$IEgg8U0zv8Q3tsaVZPR.C.Ulv0Zc8eKw05F90e1VhOExBX1kzR5CO', 'user', '2024-11-24 09:00:39', '2024-11-24 09:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `resep_id`, `created_at`, `updated_at`) VALUES
(4, 1, 3, '2024-11-24 06:52:01', '2024-11-24 06:52:01'),
(5, 6, 3, '2024-11-24 09:03:06', '2024-11-24 09:03:06'),
(6, 6, 4, '2024-11-24 09:03:48', '2024-11-24 09:03:48'),
(7, 6, 6, '2024-12-16 11:50:25', '2024-12-16 11:50:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`),
  ADD KEY `bookmarks_resep_id_foreign` (`resep_id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `reseps`
--
ALTER TABLE `reseps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reseps_user_id_foreign` (`user_id`);

--
-- Indexes for table `search_histories`
--
ALTER TABLE `search_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_histories_user_id_foreign` (`user_id`),
  ADD KEY `search_histories_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `search_query`
--
ALTER TABLE `search_query`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_queries_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_user_id_foreign` (`user_id`),
  ADD KEY `shares_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`),
  ADD KEY `subscribers_subscribed_user_id_foreign` (`subscribed_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_foreign` (`user_id`),
  ADD KEY `views_resep_id_foreign` (`resep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseps`
--
ALTER TABLE `reseps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `search_histories`
--
ALTER TABLE `search_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `search_query`
--
ALTER TABLE `search_query`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reseps`
--
ALTER TABLE `reseps`
  ADD CONSTRAINT `reseps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_histories`
--
ALTER TABLE `search_histories`
  ADD CONSTRAINT `search_histories_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `search_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_query`
--
ALTER TABLE `search_query`
  ADD CONSTRAINT `search_queries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_subscribed_user_id_foreign` FOREIGN KEY (`subscribed_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
