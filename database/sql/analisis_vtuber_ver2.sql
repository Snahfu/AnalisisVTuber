-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 10:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analisis_vtuber`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `contents_sourcesId` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` text NOT NULL DEFAULT 'Tidak Ada',
  `like_count` int(11) NOT NULL,
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kelas_sentimen` enum('Positif','Negatif','Netral') NOT NULL DEFAULT 'Netral',
  `kelas_kategori` enum('Feedback','Engagement','Pertanyaan') NOT NULL DEFAULT 'Engagement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `contents_id`, `contents_sourcesId`, `text`, `author`, `like_count`, `published`, `kelas_sentimen`, `kelas_kategori`) VALUES
(1, 0, 'kIX0sPBLG6g', 'Suaranya keren banget kak ><', 'Si_paling misterius', 2, '2023-12-07 09:21:04', 'Positif', 'Engagement'),
(2, 0, 'kIX0sPBLG6g', 'Bagus banget bang, teruskan konten covernya', 'Si_paling_komentar', 7, '2023-12-07 09:22:13', 'Positif', 'Engagement'),
(3, 0, 'kIX0sPBLG6g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:26:59', 'Positif', 'Feedback'),
(3, 1, 'kUX9sPALG5g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:27:52', 'Positif', 'Feedback'),
(3, 2, 'kUX9sVALG8g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:28:22', 'Positif', 'Feedback'),
(3, 3, 'jUS9sPALG5g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:28:59', 'Positif', 'Feedback'),
(3, 4, 'AkX7sPBLG6g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:29:31', 'Positif', 'Feedback'),
(3, 5, 'kUX9uIa9G8g', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:30:07', 'Positif', 'Feedback'),
(3, 6, 'jUS9sPAL717', 'Micnya bisa lebih di dekatin ya, tapi humor banget sih diakhir wkwk', 'AA', 1, '2023-12-07 09:30:37', 'Positif', 'Feedback'),
(4, 0, 'kIX0sPBLG6g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:26:59', 'Negatif', 'Feedback'),
(4, 1, 'kUX9sPALG5g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:27:52', 'Negatif', 'Feedback'),
(4, 2, 'kUX9sVALG8g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:28:22', 'Negatif', 'Feedback'),
(4, 3, 'jUS9sPALG5g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:28:59', 'Negatif', 'Feedback'),
(4, 4, 'AkX7sPBLG6g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:29:31', 'Negatif', 'Feedback'),
(4, 5, 'kUX9uIa9G8g', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:30:07', 'Negatif', 'Feedback'),
(4, 6, 'jUS9sPAL717', 'Ah kocak gitu aja gk bisa fales banget sih, pakai mixer dong', 'BB', 0, '2023-12-07 09:30:38', 'Negatif', 'Feedback'),
(5, 0, 'kIX0sPBLG6g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:26:59', 'Netral', 'Engagement'),
(5, 1, 'kUX9sPALG5g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:27:52', 'Netral', 'Engagement'),
(5, 2, 'kUX9sVALG8g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:28:22', 'Netral', 'Engagement'),
(5, 3, 'jUS9sPALG5g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:28:59', 'Netral', 'Engagement'),
(5, 4, 'AkX7sPBLG6g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:29:31', 'Netral', 'Engagement'),
(5, 5, 'kUX9uIa9G8g', 'Cuman lewat', 'CC', 1, '2023-12-07 09:30:07', 'Netral', 'Engagement'),
(5, 6, 'jUS9sPAL717', 'Cuman lewat', 'CC', 1, '2023-12-07 09:30:38', 'Netral', 'Engagement'),
(6, 0, 'kIX0sPBLG6g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:26:59', 'Netral', 'Feedback'),
(6, 1, 'kUX9sPALG5g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:27:52', 'Netral', 'Feedback'),
(6, 2, 'kUX9sVALG8g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:28:22', 'Netral', 'Feedback'),
(6, 3, 'jUS9sPALG5g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:28:59', 'Netral', 'Feedback'),
(6, 4, 'AkX7sPBLG6g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:29:31', 'Netral', 'Feedback'),
(6, 5, 'kUX9uIa9G8g', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:30:07', 'Netral', 'Feedback'),
(6, 6, 'jUS9sPAL717', 'Pertama hehe, bang request lagu X', 'ACD', 2, '2023-12-07 09:30:38', 'Netral', 'Feedback'),
(7, 0, 'kIX0sPBLG6g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:26:59', 'Netral', 'Pertanyaan'),
(7, 1, 'kUX9sPALG5g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:27:52', 'Netral', 'Pertanyaan'),
(7, 2, 'kUX9sVALG8g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:28:22', 'Netral', 'Pertanyaan'),
(7, 3, 'jUS9sPALG5g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:28:59', 'Netral', 'Pertanyaan'),
(7, 4, 'AkX7sPBLG6g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:29:31', 'Netral', 'Pertanyaan'),
(7, 5, 'kUX9uIa9G8g', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:30:07', 'Netral', 'Pertanyaan'),
(7, 6, 'jUS9sPAL717', 'Kapan live lagi bang?', 'si_paling_live', 3, '2023-12-07 09:30:38', 'Netral', 'Pertanyaan'),
(8, 0, 'kIX0sPBLG6g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:26:59', 'Negatif', 'Pertanyaan'),
(8, 1, 'kUX9sPALG5g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:27:52', 'Negatif', 'Pertanyaan'),
(8, 2, 'kUX9sVALG8g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:28:23', 'Negatif', 'Pertanyaan'),
(8, 3, 'jUS9sPALG5g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:28:59', 'Negatif', 'Pertanyaan'),
(8, 4, 'AkX7sPBLG6g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:29:31', 'Negatif', 'Pertanyaan'),
(8, 5, 'kUX9uIa9G8g', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:30:07', 'Negatif', 'Pertanyaan'),
(8, 6, 'jUS9sPAL717', 'kenapa harus lagu ini T_T', 'si_palingsedih', 0, '2023-12-07 09:30:38', 'Negatif', 'Pertanyaan'),
(9, 0, 'kIX0sPBLG6g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:26:59', 'Positif', 'Pertanyaan'),
(9, 1, 'kUX9sPALG5g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:27:52', 'Positif', 'Pertanyaan'),
(9, 2, 'kUX9sVALG8g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:28:23', 'Positif', 'Pertanyaan'),
(9, 3, 'jUS9sPALG5g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:28:59', 'Positif', 'Pertanyaan'),
(9, 4, 'AkX7sPBLG6g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:29:31', 'Positif', 'Pertanyaan'),
(9, 5, 'kUX9uIa9G8g', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:30:07', 'Positif', 'Pertanyaan'),
(9, 6, 'jUS9sPAL717', 'wkwkwk di akhir itu best banget seh kelas bang, btw itu siapa ya yang gitarin?', 'Si_paling_komentar', 7, '2023-12-07 09:30:38', 'Positif', 'Pertanyaan'),
(10, 0, 'kIX0sPBLG6g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:26:59', 'Positif', 'Engagement'),
(10, 1, 'kUX9sPALG5g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:27:52', 'Positif', 'Engagement'),
(10, 2, 'kUX9sVALG8g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:28:23', 'Positif', 'Engagement'),
(10, 3, 'jUS9sPALG5g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:28:59', 'Positif', 'Engagement'),
(10, 4, 'AkX7sPBLG6g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:29:31', 'Positif', 'Engagement'),
(10, 5, 'kUX9uIa9G8g', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:30:07', 'Positif', 'Engagement'),
(10, 6, 'jUS9sPAL717', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:30:38', 'Positif', 'Engagement');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `sourcesId` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `creator` mediumtext NOT NULL DEFAULT 'Tidak Ada',
  `like_count` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sources` enum('Youtube','Instagram') NOT NULL DEFAULT 'Youtube'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `sourcesId`, `title`, `creator`, `like_count`, `date`, `sources`) VALUES
(0, 'kIX0sPBLG6g', '[Cover] Indonesia Coklat', 'Reynard', 96, '2023-12-07 09:19:49', 'Youtube'),
(1, 'kUX9sPALG5g', 'Freetalk & Late night stream', 'Reynard', 37, '2023-12-07 09:13:41', 'Youtube'),
(2, 'kUX9sVALG8g', '[News] Upcoming Streaming Notice', 'Reynard', 11, '2023-12-07 09:17:20', 'Instagram'),
(3, 'jUS9sPALG5g', 'Anjingku yang lucu dan gemas', 'Reynard', 9, '2023-12-07 09:12:56', 'Instagram'),
(4, 'AkX7sPBLG6g', '[Cover] Senangnya dalam Hati', 'Yaska', 54, '2023-12-07 08:17:56', 'Youtube'),
(5, 'kUX9uIa9G8g', '[News] Delayed Stream', 'Yaska', 23, '2023-12-07 07:13:56', 'Instagram'),
(6, 'jUS9sPAL717', 'Yume goes to Bali B)', 'Yaska', 12, '2023-12-07 09:17:11', 'Instagram');

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `contents_id` int(11) NOT NULL,
  `contents_sourcesId` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `crawled_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`contents_id`, `contents_sourcesId`, `users_id`, `crawled_date`, `note`) VALUES
(1, 'kUX9sPALG5g', 3, '2023-12-07 09:33:13', NULL),
(4, 'AkX7sPBLG6g', 6, '2023-12-07 09:33:45', NULL),
(5, 'kUX9uIa9G8g', 3, '2023-12-07 09:34:52', NULL),
(6, 'jUS9sPAL717', 3, '2023-12-07 09:33:45', NULL),
(6, 'jUS9sPAL717', 6, '2023-12-07 09:34:52', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext NOT NULL DEFAULT 'Unknown',
  `email` varchar(255) NOT NULL,
  `group` mediumtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Manager','VTuber') NOT NULL DEFAULT 'VTuber',
  `url_gambar` longtext NOT NULL,
  `instagram_link` longtext DEFAULT NULL,
  `youtube_link` longtext NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group`, `password`, `role`, `url_gambar`, `instagram_link`, `youtube_link`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Yaska', 'yaska@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, '2023-12-07 02:05:49', '2023-12-07 02:05:49'),
(2, 'Rony', 'rony@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, NULL, NULL),
(3, 'Reynard', 'reynard@gmail.com', 'Re:Memories', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, NULL, NULL),
(4, 'M-chan', 'mchan@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, NULL, NULL),
(5, 'W-chan', 'wchan@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, NULL, NULL),
(6, 'Manager', 'manager@gmail.com', 'Re:Memories', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.comjpg', 'https://www.instagram.com/', 'https://www.youtube.com/', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`,`contents_id`,`contents_sourcesId`),
  ADD KEY `fk_comments_contents_idx` (`contents_id`,`contents_sourcesId`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`,`sourcesId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`contents_id`,`contents_sourcesId`,`users_id`),
  ADD KEY `fk_contents_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_contents_has_users_contents1_idx` (`contents_id`,`contents_sourcesId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_contents` FOREIGN KEY (`contents_id`,`contents_sourcesId`) REFERENCES `contents` (`id`, `sourcesId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `fk_contents_has_users_contents1` FOREIGN KEY (`contents_id`,`contents_sourcesId`) REFERENCES `contents` (`id`, `sourcesId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contents_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
