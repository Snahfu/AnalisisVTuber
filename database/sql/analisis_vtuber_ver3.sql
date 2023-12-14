-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 03:56 PM
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
  `caption` longtext DEFAULT NULL,
  `creator` mediumtext NOT NULL DEFAULT 'Tidak Ada',
  `like_count` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sources` enum('Youtube','Instagram') NOT NULL DEFAULT 'Youtube'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `sourcesId`, `title`, `caption`, `creator`, `like_count`, `date`, `sources`) VALUES
(1, 'kIX0sPBLG6g', '[Cover] Indonesia Coklat', NULL, 'Reynard', 96, '2023-12-07 09:19:49', 'Youtube'),
(1, 'kUX9sPALG5g', 'Freetalk & Late night stream', NULL, 'Reynard', 37, '2023-12-07 09:13:41', 'Youtube'),
(2, 'kUX9sVALG8g', '[News] Upcoming Streaming Notice', NULL, 'Reynard', 11, '2023-12-07 09:17:20', 'Instagram'),
(3, 'jUS9sPALG5g', 'Anjingku yang lucu dan gemas', NULL, 'Reynard', 9, '2023-12-07 09:12:56', 'Instagram'),
(4, 'AkX7sPBLG6g', '[Cover] Senangnya dalam Hati', NULL, 'Yaska', 54, '2023-12-07 08:17:56', 'Youtube'),
(5, 'kUX9uIa9G8g', '[News] Delayed Stream', NULL, 'Yaska', 23, '2023-12-07 07:13:56', 'Instagram'),
(6, 'jUS9sPAL717', 'Yume goes to Bali B)', NULL, 'Yaska', 12, '2023-12-07 09:17:11', 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `contents_id` int(11) NOT NULL,
  `contents_sourcesId` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `crawled_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`contents_id`, `contents_sourcesId`, `users_id`, `crawled_date`) VALUES
(1, 'kUX9sPALG5g', 3, '2023-12-07 09:33:13'),
(4, 'AkX7sPBLG6g', 6, '2023-12-07 09:33:45'),
(5, 'kUX9uIa9G8g', 3, '2023-12-07 09:34:52'),
(6, 'jUS9sPAL717', 3, '2023-12-07 09:33:45'),
(6, 'jUS9sPAL717', 6, '2023-12-07 09:34:52');

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
  `youtube_link` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group`, `password`, `role`, `url_gambar`, `instagram_link`, `youtube_link`) VALUES
(1, 'Yaska', 'yaska@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/'),
(2, 'Rony', 'rony@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/'),
(3, 'Reynard', 'reynard@gmail.com', 'Re:Memories', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'VTuber', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/'),
(4, 'M-chan', 'mchan@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/'),
(5, 'W-chan', 'wchan@gmail.com', 'YumeLive', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/'),
(6, 'Manager', 'manager@gmail.com', 'Re:Memories', '$2y$10$dympst9qvLSgJozcHKkENe3R.k5VAUct4OxTxX7kXfQ5bvyqMgp/G', 'Manager', 'storage/profile_pictures/yaska@gmail.com.jpg', 'https://www.instagram.com/', 'https://www.youtube.com/');

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
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`contents_id`,`contents_sourcesId`,`users_id`),
  ADD KEY `fk_contents_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_contents_has_users_contents1_idx` (`contents_id`,`contents_sourcesId`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
