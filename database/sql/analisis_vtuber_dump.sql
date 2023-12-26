-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 04:05 AM
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
(10, 6, 'jUS9sPAL717', 'mantap banget nih cover rekomend buat ciwi ciwi', 'Si_paling_komentar', 7, '2023-12-07 09:30:38', 'Positif', 'Engagement'),
(11, 7, 'C-bgFaefdXY', 'This editing is 🔥 🔥🔥🔥🔥', '@kalahana6572', 1, '2023-12-15 01:39:08', 'Negatif', 'Engagement'),
(12, 7, 'C-bgFaefdXY', 'This screams &quot;dedication&quot;.', '@nkmjst', 1, '2023-09-06 04:57:47', 'Negatif', 'Engagement'),
(13, 7, 'C-bgFaefdXY', 'Amazing great job', '@maciej3721', 1, '2023-08-26 16:47:12', 'Netral', 'Engagement'),
(14, 7, 'C-bgFaefdXY', 'wait... GOD EATER???? how nostalgic..<br>wrong universe but still nice to hear', '@ardhiyudisthira8558', 4, '2023-08-20 18:40:16', 'Positif', 'Pertanyaan'),
(16, 8, 'C0Yo2TOxXeY', 'Itu standee cecil bisa dibawa ke KUA nggak? Mau ku nikahin 😂', 'kang_zul_z', 3, '2023-12-06 00:12:28', 'Positif', 'Feedback'),
(17, 8, 'C0Yo2TOxXeY', 'Sepundak❤️', 'beexee_', 12, '2023-12-03 02:04:17', 'Netral', 'Engagement'),
(18, 8, 'C0Yo2TOxXeY', 'pendek kali❤️', 'rhenaid_', 6, '2023-12-03 02:07:34', 'Negatif', 'Engagement'),
(19, 8, 'C0Yo2TOxXeY', 'Kalau di lihat lihat kayanya gw se Cecil dah tapi agak lebih 20cm an dikit heheh', 'nugiezaky_art', 2, '2023-12-03 09:36:08', 'Positif', 'Feedback'),
(20, 8, 'C0Yo2TOxXeY', 'Pendek', 'takamiyarui', 1, '2023-12-03 02:05:31', 'Netral', 'Engagement'),
(21, 8, 'C0Yo2TOxXeY', 'Potret botol yakult sama terong 😂', 'jul_co_id', 8, '2023-12-03 09:14:10', 'Negatif', 'Engagement'),
(22, 8, 'C0Yo2TOxXeY', 'kapan kapan dibandung lah😡😡 duit ku tidak cukup untuk kesana jadi ku tunggu saja kamu live😔', 'bread_waras', 4, '2023-12-03 04:05:51', 'Negatif', 'Pertanyaan'),
(23, 8, 'C0Yo2TOxXeY', 'Ku kira selama ini ecchi pendek', 'story_on_a_rainy_day', 0, '2023-12-06 00:03:17', 'Negatif', 'Engagement'),
(24, 8, 'C0Yo2TOxXeY', 'Bogel', 'misaelchrst', 0, '2023-12-03 03:06:07', 'Netral', 'Engagement'),
(25, 9, 'C0Yo2TOxXeY', 'Itu standee cecil bisa dibawa ke KUA nggak? Mau ku nikahin 😂', 'kang_zul_z', 3, '2023-12-06 00:12:28', 'Positif', 'Feedback'),
(26, 9, 'C0Yo2TOxXeY', 'Sepundak❤️', 'beexee_', 12, '2023-12-03 02:04:17', 'Netral', 'Engagement'),
(27, 9, 'C0Yo2TOxXeY', 'pendek kali❤️', 'rhenaid_', 6, '2023-12-03 02:07:34', 'Negatif', 'Engagement'),
(28, 9, 'C0Yo2TOxXeY', 'Kalau di lihat lihat kayanya gw se Cecil dah tapi agak lebih 20cm an dikit heheh', 'nugiezaky_art', 2, '2023-12-03 09:36:08', 'Positif', 'Feedback'),
(29, 9, 'C0Yo2TOxXeY', 'Potret botol yakult sama terong 😂', 'jul_co_id', 8, '2023-12-03 09:14:10', 'Negatif', 'Engagement'),
(30, 9, 'C0Yo2TOxXeY', 'kapan kapan dibandung lah😡😡 duit ku tidak cukup untuk kesana jadi ku tunggu saja kamu live😔', 'bread_waras', 4, '2023-12-03 04:05:51', 'Negatif', 'Pertanyaan'),
(31, 9, 'C0Yo2TOxXeY', 'Pendek', 'takamiyarui', 1, '2023-12-03 02:05:31', 'Netral', 'Engagement'),
(32, 9, 'C0Yo2TOxXeY', 'Ku kira selama ini ecchi pendek', 'story_on_a_rainy_day', 0, '2023-12-06 00:03:17', 'Negatif', 'Engagement'),
(33, 9, 'C0Yo2TOxXeY', 'Bogel', 'misaelchrst', 0, '2023-12-03 03:06:07', 'Netral', 'Engagement'),
(34, 9, 'C0Yo2TOxXeY', 'kaya ibu sama anak😭', 'neorainsky', 0, '2023-12-03 03:19:11', 'Netral', 'Engagement'),
(35, 9, 'C0Yo2TOxXeY', 'Ptuber medok 😂', 'gratis.isiulang.9', 0, '2023-12-05 00:39:00', 'Negatif', 'Engagement'),
(36, 9, 'C0Yo2TOxXeY', 'Aku kira lagi duduk ternyata berdiri🤣', 'aleefv____', 0, '2023-12-03 03:50:08', 'Netral', 'Engagement'),
(37, 9, 'C0Yo2TOxXeY', 'Di lelang gk chi?', 'yut_btsa', 0, '2023-12-03 04:04:36', 'Netral', 'Engagement'),
(38, 9, 'C0Yo2TOxXeY', 'Cebol kali', 'akihiro_pratama', 1, '2023-12-03 02:55:05', 'Netral', 'Engagement'),
(39, 9, 'C0Yo2TOxXeY', 'Wait, memangnya tinggi model vtuber kak@cecilialieberiaberapa sih?😅', 'fachrullmaulana', 0, '2023-12-03 17:29:50', 'Negatif', 'Engagement'),
(40, 9, 'C0Yo2TOxXeY', '@minerose_iddia ikut diliat dri sg ny', 'eika.satoryu', 0, '2023-12-03 13:23:48', 'Negatif', 'Engagement'),
(41, 9, 'C0Yo2TOxXeY', 'Mba@cecilialieberiaberdiri loh, duduk mulu 🤭', 'novian_98', 0, '2023-12-03 09:11:52', 'Netral', 'Engagement'),
(42, 9, 'C0Yo2TOxXeY', 'Pendecc 😭😭', 'nr.zr', 0, '2023-12-03 04:29:08', 'Negatif', 'Engagement'),
(43, 9, 'C0Yo2TOxXeY', 'Pendeccc coyyy 💀', 'hoshito64p', 0, '2023-12-03 03:39:53', 'Negatif', 'Engagement'),
(44, 9, 'C0Yo2TOxXeY', 'mampir kak wali band Fatimah Nagaswara 🎶👍', 'automaton.567', 0, '2023-12-03 05:41:22', 'Positif', 'Engagement'),
(45, 9, 'C0Yo2TOxXeY', 'Jakung bener', 'geng_chan', 0, '2023-12-03 15:27:03', 'Netral', 'Engagement'),
(46, 9, 'C0Yo2TOxXeY', 'terong', 'yeheheboiis', 0, '2023-12-03 04:28:58', 'Netral', 'Engagement'),
(47, 9, 'C0Yo2TOxXeY', 'Echii tinggi amayyy', 'widyaawaww', 0, '2023-12-03 16:55:27', 'Negatif', 'Engagement'),
(48, 9, 'C0Yo2TOxXeY', 'Ihh lucu bangett, adeek', 'm_zahwan168', 0, '2023-12-03 06:13:43', 'Negatif', 'Engagement'),
(49, 10, 'C0Yo2TOxXeY', 'Itu standee cecil bisa dibawa ke KUA nggak? Mau ku nikahin 😂', 'kang_zul_z', 3, '2023-12-06 00:12:28', 'Positif', 'Feedback'),
(50, 10, 'C0Yo2TOxXeY', 'Sepundak❤️', 'beexee_', 12, '2023-12-03 02:04:17', 'Netral', 'Engagement'),
(51, 10, 'C0Yo2TOxXeY', 'pendek kali❤️', 'rhenaid_', 6, '2023-12-03 02:07:34', 'Negatif', 'Engagement'),
(52, 10, 'C0Yo2TOxXeY', 'Kalau di lihat lihat kayanya gw se Cecil dah tapi agak lebih 20cm an dikit heheh', 'nugiezaky_art', 2, '2023-12-03 09:36:08', 'Positif', 'Feedback'),
(53, 10, 'C0Yo2TOxXeY', 'Pendek', 'takamiyarui', 1, '2023-12-03 02:05:31', 'Netral', 'Engagement'),
(54, 10, 'C0Yo2TOxXeY', 'Potret botol yakult sama terong 😂', 'jul_co_id', 8, '2023-12-03 09:14:10', 'Negatif', 'Engagement'),
(55, 10, 'C0Yo2TOxXeY', 'kapan kapan dibandung lah😡😡 duit ku tidak cukup untuk kesana jadi ku tunggu saja kamu live😔', 'bread_waras', 4, '2023-12-03 04:05:51', 'Negatif', 'Pertanyaan'),
(56, 10, 'C0Yo2TOxXeY', 'Ku kira selama ini ecchi pendek', 'story_on_a_rainy_day', 0, '2023-12-06 00:03:17', 'Negatif', 'Engagement'),
(57, 10, 'C0Yo2TOxXeY', 'Bogel', 'misaelchrst', 0, '2023-12-03 03:06:07', 'Netral', 'Engagement'),
(58, 11, 'C0Yo2TOxXeY', 'Itu standee cecil bisa dibawa ke KUA nggak? Mau ku nikahin 😂', 'kang_zul_z', 3, '2023-12-06 00:12:28', 'Positif', 'Feedback'),
(59, 11, 'C0Yo2TOxXeY', 'Sepundak❤️', 'beexee_', 12, '2023-12-03 02:04:17', 'Netral', 'Engagement'),
(60, 11, 'C0Yo2TOxXeY', 'Potret botol yakult sama terong 😂', 'jul_co_id', 8, '2023-12-03 09:14:10', 'Negatif', 'Engagement'),
(61, 11, 'C0Yo2TOxXeY', 'pendek kali❤️', 'rhenaid_', 6, '2023-12-03 02:07:34', 'Negatif', 'Engagement'),
(62, 11, 'C0Yo2TOxXeY', 'Kalau di lihat lihat kayanya gw se Cecil dah tapi agak lebih 20cm an dikit heheh', 'nugiezaky_art', 2, '2023-12-03 09:36:08', 'Positif', 'Feedback'),
(63, 11, 'C0Yo2TOxXeY', 'Pendek', 'takamiyarui', 1, '2023-12-03 02:05:31', 'Netral', 'Engagement'),
(64, 11, 'C0Yo2TOxXeY', 'kapan kapan dibandung lah😡😡 duit ku tidak cukup untuk kesana jadi ku tunggu saja kamu live😔', 'bread_waras', 4, '2023-12-03 04:05:51', 'Negatif', 'Pertanyaan'),
(65, 11, 'C0Yo2TOxXeY', 'Ku kira selama ini ecchi pendek', 'story_on_a_rainy_day', 0, '2023-12-06 00:03:17', 'Negatif', 'Engagement'),
(66, 11, 'C0Yo2TOxXeY', 'Bogel', 'misaelchrst', 0, '2023-12-03 03:06:07', 'Netral', 'Engagement'),
(67, 11, 'C0Yo2TOxXeY', 'Cecil cilik😋', 'vtuber_idn', 0, '2023-12-03 03:52:47', 'Netral', 'Engagement'),
(68, 11, 'C0Yo2TOxXeY', 'Ptuber medok 😂', 'gratis.isiulang.9', 0, '2023-12-05 00:39:00', 'Negatif', 'Engagement'),
(69, 11, 'C0Yo2TOxXeY', 'kaya ibu sama anak😭', 'neorainsky', 0, '2023-12-03 03:19:11', 'Netral', 'Engagement'),
(70, 11, 'C0Yo2TOxXeY', 'Aku kira lagi duduk ternyata berdiri🤣', 'aleefv____', 0, '2023-12-03 03:50:08', 'Netral', 'Engagement'),
(71, 11, 'C0Yo2TOxXeY', 'Wait, memangnya tinggi model vtuber kak@cecilialieberiaberapa sih?😅', 'fachrullmaulana', 0, '2023-12-03 17:29:50', 'Negatif', 'Engagement'),
(72, 11, 'C0Yo2TOxXeY', 'Di lelang gk chi?', 'yut_btsa', 0, '2023-12-03 04:04:36', 'Netral', 'Engagement'),
(73, 11, 'C0Yo2TOxXeY', 'Cebol kali', 'akihiro_pratama', 1, '2023-12-03 02:55:05', 'Netral', 'Engagement'),
(74, 11, 'C0Yo2TOxXeY', '@minerose_iddia ikut diliat dri sg ny', 'eika.satoryu', 0, '2023-12-03 13:23:48', 'Negatif', 'Engagement'),
(75, 11, 'C0Yo2TOxXeY', 'Mba@cecilialieberiaberdiri loh, duduk mulu 🤭', 'novian_98', 0, '2023-12-03 09:11:52', 'Netral', 'Engagement'),
(76, 11, 'C0Yo2TOxXeY', 'Pendecc 😭😭', 'nr.zr', 0, '2023-12-03 04:29:08', 'Negatif', 'Engagement'),
(77, 11, 'C0Yo2TOxXeY', 'Jakung bener', 'geng_chan', 0, '2023-12-03 15:27:03', 'Netral', 'Engagement'),
(78, 11, 'C0Yo2TOxXeY', 'mampir kak wali band Fatimah Nagaswara 🎶👍', 'automaton.567', 0, '2023-12-03 05:41:22', 'Positif', 'Engagement'),
(79, 11, 'C0Yo2TOxXeY', 'terong', 'yeheheboiis', 0, '2023-12-03 04:28:58', 'Netral', 'Engagement'),
(80, 11, 'C0Yo2TOxXeY', 'Ihh lucu bangett, adeek', 'm_zahwan168', 0, '2023-12-03 06:13:43', 'Negatif', 'Engagement'),
(81, 11, 'C0Yo2TOxXeY', 'Emng boleh se yakult itu?', 'mas.hm_05', 1, '2023-12-04 01:52:22', 'Netral', 'Engagement'),
(82, 11, 'C0Yo2TOxXeY', 'Pendeccc coyyy 💀', 'hoshito64p', 0, '2023-12-03 03:39:53', 'Negatif', 'Engagement'),
(83, 11, 'C0Yo2TOxXeY', 'Loh kok pendek?', 'kowalski_deep', 0, '2023-12-03 09:01:12', 'Netral', 'Engagement'),
(84, 11, 'C0Yo2TOxXeY', 'fendek😂', 'sukronmzen', 1, '2023-12-03 02:14:48', 'Negatif', 'Engagement'),
(85, 11, 'C0Yo2TOxXeY', 'Assass1n dan mbak herta', 'rahul_shiso', 0, '2023-12-03 04:13:42', 'Negatif', 'Engagement'),
(86, 11, 'C0Yo2TOxXeY', 'echi bersama botol yakult', '00sinns', 1, '2023-12-03 03:47:22', 'Negatif', 'Engagement'),
(87, 11, 'C0Yo2TOxXeY', 'Pendek', 'igasaki_korel', 0, '2023-12-05 18:42:41', 'Netral', 'Engagement'),
(88, 11, 'C0Yo2TOxXeY', 'Ngambil rapor moment', 'aal_san', 0, '2023-12-03 15:25:23', 'Netral', 'Engagement'),
(89, 11, 'C0Yo2TOxXeY', 'Bogel mamank', 'ageng.gusti', 0, '2023-12-03 05:10:51', 'Negatif', 'Engagement'),
(90, 11, 'C0Yo2TOxXeY', 'Echii tinggi amayyy', 'widyaawaww', 0, '2023-12-03 16:55:27', 'Negatif', 'Engagement'),
(91, 11, 'C0Yo2TOxXeY', 'Cecil ternyata.....', 'the_virtuallist', 0, '2023-12-03 03:54:16', 'Netral', 'Engagement'),
(92, 11, 'C0Yo2TOxXeY', 'Ini tukang poster nya beda ya? Kok ukurannya gak sama', 'dimstjo', 0, '2023-12-03 16:32:25', 'Negatif', 'Pertanyaan'),
(93, 11, 'C0Yo2TOxXeY', 'Tenang mba cecil kamu masih keliatan tinggi kok...... Maksud akuTinggi akhlaknya 😍❤️', 'aryaiswandi25', 0, '2023-12-03 03:16:29', 'Positif', 'Pertanyaan'),
(94, 11, 'C0Yo2TOxXeY', 'Heeeee berapa cm tu cil😮😮 143 cm kah ??@cecilialieberia', 'filigamers', 2, '2023-12-03 02:47:33', 'Negatif', 'Engagement'),
(95, 11, 'C0Yo2TOxXeY', 'muat di karung 50 kilo ini :v', 'kokoro_san453', 0, '2023-12-08 05:00:17', 'Netral', 'Engagement'),
(96, 12, '4TXypBS_IfY', '洨知識補充: 這首歌當初爆紅於YT是因為有人用一堆虐戀遊戲和動畫做成了MAD<br>並標明Love is a beautiful pain<br>結果沒想到這個副標題反而比原曲名還紅，而且大家都在猜是哪部動漫歌曲。<br>並不是喔，單純是因為這歌曲的斷點非常漂亮，又有rap。<br>P.S. 建議可以加上 <a href=\"http://www.youtube.com/results?search_query=%23love\">#Love</a> is a beautiful pain', '@user-ch5bm8si2p', 0, '2023-12-17 09:37:42', 'Positif', 'Feedback'),
(97, 12, '4TXypBS_IfY', 'Kobo nailed it', '@JulielleKuna-um2jk', 0, '2023-12-05 08:52:29', 'Netral', 'Engagement'),
(98, 12, '4TXypBS_IfY', 'I love you kobo', '@Kusuma_Family1022', 0, '2023-11-27 03:06:38', 'Positif', 'Engagement'),
(99, 12, '4TXypBS_IfY', 'KELASSZZZ', '@sindubaby.7648', 1, '2023-11-25 11:15:08', 'Netral', 'Engagement'),
(100, 12, '4TXypBS_IfY', 'Aku menangis mendengar ini❤❤❤😢😢', '@itsame2728', 0, '2023-12-19 08:52:44', 'Negatif', 'Engagement'),
(101, 12, '4TXypBS_IfY', 'this is such a great cover!! the first time I listened to this was in Osu! back then in 2014. CLSW&#39;s map of this song for Osu! Catch was great, now that&#39;s some nice memories....', '@Ealstrom', 1, '2023-11-25 05:41:24', 'Positif', 'Engagement'),
(102, 12, '4TXypBS_IfY', 'Kobo聲音真的好聽，實力唱將', '@Jjjiiiiixjx', 1, '2023-11-24 02:01:24', 'Negatif', 'Engagement'),
(104, 12, '4TXypBS_IfY', '<a href=\"https://www.youtube.com/watch?v=4TXypBS_IfY&amp;t=2m55s\">2:55</a> this part &gt;&gt;&gt;&gt;&gt;', '@sessho144p', 0, '2023-11-21 02:31:54', 'Negatif', 'Feedback'),
(105, 12, '4TXypBS_IfY', 'aduh saya nyasar kemana ini 🙈', '@milmus7223', 2, '2023-12-18 02:09:25', 'Positif', 'Pertanyaan'),
(106, 12, '4TXypBS_IfY', 'A voz da Kobo é linda', '@hudsondejota', 6, '2023-11-18 12:50:50', 'Netral', 'Engagement'),
(107, 12, '4TXypBS_IfY', '年輕的29歲拉，算年輕吧，對吧QAQ?', '@heyman55544', 0, '2023-11-18 10:47:21', 'Netral', 'Engagement'),
(108, 12, '4TXypBS_IfY', '@@heyman5554429歲+1，現在才發現這首歌已經發行十年了😂', '@hermitmercury4890', 0, '2023-11-18 10:47:21', 'Positif', 'Feedback'),
(109, 12, '4TXypBS_IfY', '⁠@@user-di7ox8xe1m24也來報到一下', '@dong1359', 0, '2023-11-18 10:47:21', 'Netral', 'Engagement'),
(110, 12, '4TXypBS_IfY', '這首歌 真的滿是回憶 可以說是開始使用YouTube時 點開的第一首歌', '@user-dl5ow7wv4b', 0, '2023-11-18 08:11:13', 'Netral', 'Engagement'),
(111, 12, '4TXypBS_IfY', 'いい歌声すぎる。ＩDは歌唱力オバケが多すぎる。', '@mr.7923', 6, '2023-11-18 01:55:04', 'Netral', 'Engagement'),
(112, 12, '4TXypBS_IfY', '哭啊，超喜歡這首MAD的', '@user-cj7jl4fb6v', 0, '2023-11-18 01:30:44', 'Netral', 'Engagement'),
(113, 12, '4TXypBS_IfY', '天哪！我以前很愛這首耶QAQ', '@HolyLightBill', 0, '2023-11-17 23:14:25', 'Netral', 'Engagement'),
(114, 12, '4TXypBS_IfY', 'HOLO又多一個歌姬，一個多語言天才又可愛的KOBO，太香了', '@snowandmomo', 16, '2023-11-17 05:59:15', 'Netral', 'Feedback'),
(116, 12, '4TXypBS_IfY', 'KOBO來唱，少了種熱戀中的韻味，多了些少女對戀愛的期許&amp;清純', '@nyjah7314', 0, '2023-11-17 05:59:15', 'Negatif', 'Engagement'),
(117, 12, '4TXypBS_IfY', 'I remember listening to this way back when bring back so many good memories', '@Silverstorm173', 3, '2023-11-17 04:49:04', 'Positif', 'Engagement'),
(118, 12, '4TXypBS_IfY', 'Amazing 🔥', '@pakelboys', 0, '2023-11-16 10:53:18', 'Positif', 'Engagement'),
(119, 12, '4TXypBS_IfY', 'This is amazing', '@kentangsquare6648', 1, '2023-11-16 07:53:53', 'Negatif', 'Engagement'),
(120, 12, '4TXypBS_IfY', 'Did you know, every songs kobo sing it, there is the word of kobo to..', '@smart99five74', 2, '2023-11-15 22:47:00', 'Positif', 'Feedback'),
(121, 12, '4TXypBS_IfY', 'Suara kobo sangat jernih', '@kimochi_888', 3, '2023-11-15 14:12:54', 'Negatif', 'Feedback'),
(122, 12, '4TXypBS_IfY', 'I can&#39;t believe it Kobo 😂 The loudest of all people..', '@_Ciosu..', 4, '2023-11-14 06:59:15', 'Positif', 'Engagement'),
(123, 12, '4TXypBS_IfY', 'The nostalgia hit me right in the feel', '@namvo3013', 9, '2023-11-14 04:50:45', 'Negatif', 'Engagement'),
(124, 12, '4TXypBS_IfY', 'Reminds me when I actually play OSU', '@boaofdeath', 0, '2023-11-14 04:50:45', 'Negatif', 'Engagement'),
(125, 12, '4TXypBS_IfY', 'Man, this is so cool. Would be cooler if midlliope is not there.', '@kato_dsrdr', 0, '2023-11-14 02:54:05', 'Positif', 'Pertanyaan'),
(126, 12, '4TXypBS_IfY', 'but some one need too rap that part and honestly calli fit in there too', '@zoaero', 3, '2023-11-14 02:54:05', 'Negatif', 'Feedback'),
(127, 12, '4TXypBS_IfY', 'Then who will sing the rap part? You?😂', '@henzotanaka9134', 2, '2023-11-14 02:54:05', 'Positif', 'Feedback'),
(128, 12, '4TXypBS_IfY', 'wow 😱', '@sessho144p', 0, '2023-11-14 02:54:05', 'Negatif', 'Feedback'),
(129, 12, '4TXypBS_IfY', 'ngawi music festival', '@Sayurawesome11', 0, '2023-11-13 23:35:33', 'Netral', 'Engagement'),
(130, 12, '4TXypBS_IfY', 'Now how on earth did I miss this magic', '@michaelxiong1650', 4, '2023-11-13 04:39:24', 'Negatif', 'Feedback'),
(131, 12, '4TXypBS_IfY', 'b&#39;-&#39;)b', '@Shino_666', 1, '2023-11-12 10:16:36', 'Netral', 'Pertanyaan'),
(132, 12, '4TXypBS_IfY', 'Endless Tears 前奏一出來整個回憶拉滿', '@john20381', 9, '2023-11-10 21:24:19', 'Negatif', 'Engagement'),
(133, 12, '4TXypBS_IfY', '這首的MAD真的很多', '@swingsummer0107', 2, '2023-11-10 11:44:48', 'Netral', 'Engagement'),
(134, 12, '4TXypBS_IfY', '還以為是彩音的Endless Tears... 但這首真的也是經典，有一個AMV就是用這首 (Love is a Beautiful Pain - Endless)，做的超好的一直都很喜歡。找Calli來唱Rap超適合的，而且Kobo很多地方都很還原但小改的地方也很讚', '@Leonlion0305', 15, '2023-11-10 08:47:34', 'Positif', 'Feedback'),
(135, 12, '4TXypBS_IfY', '好懷念的歌喔，沒想到能聽到holo的人唱', '@user-hy2vm5di2m', 12, '2023-11-10 07:20:05', 'Netral', 'Feedback'),
(136, 12, '4TXypBS_IfY', 'Lagu yang pernah di nyanyikan kobo tahun lalu dan sekarang di bawakan dengan 3D 😊', '@andreallbertaries5446', 8, '2023-11-10 02:37:36', 'Positif', 'Engagement'),
(137, 12, '4TXypBS_IfY', 'MANTAP JIWA', '@videoloversful', 6, '2023-11-09 21:02:15', 'Positif', 'Engagement'),
(138, 12, '4TXypBS_IfY', '腦中直接跳出Love is a beautiful Pain-Endless Tears 這個MAD', '@live_johnson7105', 15, '2023-11-09 03:42:00', 'Positif', 'Feedback'),
(139, 12, '4TXypBS_IfY', 'i really like that MAD its so beautiful', '@zoaero', 2, '2023-11-09 03:42:00', 'Negatif', 'Feedback'),
(140, 12, '4TXypBS_IfY', 'kobo my lord 😤😁', '@Taka9haruu', 4, '2023-11-08 16:22:53', 'Positif', 'Engagement'),
(141, 12, '4TXypBS_IfY', '感謝翻譯！當天跟直播時看到dad走出來眼淚差點掉下來，感謝kobo圓了讓粉絲聽他們合唱的夢😭', '@user-wi6by7pc1r', 22, '2023-11-08 07:35:36', 'Negatif', 'Feedback'),
(142, 12, '4TXypBS_IfY', '居然是這首？！！小時候第一次接觸動漫mad聽的歌~這個年頭居然有人cover？！太神啦！！！這首可是動漫愛情向mad的神曲啊啊啊！！！kobo和死神唱的好好聽啊啊！回憶回來了啊啊啊！感謝烤肉！', '@44yangyang', 88, '2023-11-08 04:39:32', 'Netral', 'Engagement'),
(143, 12, '4TXypBS_IfY', '真的超喜歡這首QQ很意外KOBO與死神傾情獻唱！！也感謝剪輯！', '@yuki-yi5rp', 30, '2023-11-08 03:23:34', 'Netral', 'Engagement'),
(144, 12, '4TXypBS_IfY', 'Dad真的好帥', '@-ck1616', 9, '2023-11-07 02:08:08', 'Netral', 'Engagement'),
(145, 12, '4TXypBS_IfY', '能聽到holo翻唱這首老歌，真難得阿', '@kuanhantang3700', 23, '2023-11-05 22:02:45', 'Netral', 'Feedback'),
(146, 12, '4TXypBS_IfY', '還不是JP組唱的', '@user-kh2ml9qd2u', 2, '2023-11-05 22:02:45', 'Negatif', 'Engagement'),
(147, 12, '4TXypBS_IfY', '@@user-az7255 所以很佩服', '@user-kh2ml9qd2u', 1, '2023-11-05 22:02:45', 'Netral', 'Engagement'),
(148, 12, '4TXypBS_IfY', 'Kobo 在karaoke 也唱過 也推薦那個版本', '@manclipperkfgkobofunnegura5454', 0, '2023-11-05 22:02:45', 'Negatif', 'Engagement'),
(149, 12, '4TXypBS_IfY', '嗚嗚~ Kobo好可愛喔，這首之前蠻常被做成MAD的呢', '@user-gr7om9wm2p', 27, '2023-11-04 23:58:10', 'Negatif', 'Feedback'),
(150, 12, '4TXypBS_IfY', 'Kobo&#39;s voice is too sweet', '@ZanPhan13', 36, '2023-10-29 23:44:33', 'Negatif', 'Feedback'),
(151, 12, '4TXypBS_IfY', '居然是這首歌！<br>沒想到會從holo聽到翻唱<br>感謝烤這首歌', '@rexchankcc', 67, '2023-10-28 04:28:17', 'Netral', 'Feedback'),
(152, 12, '4TXypBS_IfY', '這RAP真的很適合，KOBO聲音又很清澈有夠棒，3D律動感又高樂器還會很多種真的才女', '@omgangel6837', 118, '2023-10-27 22:33:30', 'Negatif', 'Engagement'),
(153, 12, '4TXypBS_IfY', '居然這首歌，我最近很喜歡這首歌，是有一天偶然聽到這首歌，一聽就上癮了，剛去查發現kobo之前就有在歌回唱過了，這首的的旋律是真的好聽，這首好好聽，kobo跟calli唱的好好聽', '@user-hu5hc1nc2q', 131, '2023-10-27 22:06:48', 'Negatif', 'Feedback'),
(154, 12, '4TXypBS_IfY', '這首曲子找來Dad一起唱真的是畫龍點睛w', '@Fir3k0', 20, '2023-10-27 22:06:48', 'Netral', 'Engagement'),
(155, 12, '4TXypBS_IfY', '@@Fir3k0<br>想像一下<br>攝影棚內<br>一大一小在那又蹦又跳的唱著...', '@s95566', 2, '2023-10-27 22:06:48', 'Netral', 'Engagement'),
(156, 12, '4TXypBS_IfY', '一聽就愛上，父子組合怎麼能這麼搭啊拜託多唱一點XDD', '@RogerFireW', 176, '2023-10-27 21:59:06', 'Netral', 'Engagement'),
(157, 12, '4TXypBS_IfY', '@@Dylan-hw3tg E', '@user-pj6fb8en1p', 0, '2023-10-27 21:59:06', 'Netral', 'Engagement'),
(158, 13, 'C0Yo2TOxXeY', 'Sepundak❤️', 'beexee_', 13, '2023-12-03 02:04:17', 'Negatif', 'Feedback'),
(159, 13, 'C0Yo2TOxXeY', 'Potret botol yakult sama terong 😂', 'jul_co_id', 9, '2023-12-03 09:14:10', 'Positif', 'Feedback'),
(160, 13, 'C0Yo2TOxXeY', 'Pendek', 'takamiyarui', 1, '2023-12-03 02:05:31', 'Netral', 'Engagement'),
(161, 13, 'C0Yo2TOxXeY', 'Kalau di lihat lihat kayanya gw se Cecil dah tapi agak lebih 20cm an dikit heheh', 'nugiezaky_art', 2, '2023-12-03 09:36:08', 'Positif', 'Feedback'),
(162, 13, 'C0Yo2TOxXeY', 'pendek kali❤️', 'rhenaid_', 6, '2023-12-03 02:07:34', 'Negatif', 'Engagement'),
(163, 13, 'C0Yo2TOxXeY', 'Jakung bener', 'geng_chan', 0, '2023-12-03 15:27:03', 'Netral', 'Engagement'),
(164, 13, 'C0Yo2TOxXeY', 'Itu standee cecil bisa dibawa ke KUA nggak? Mau ku nikahin 😂', 'kang_zul_z', 3, '2023-12-06 00:12:28', 'Positif', 'Pertanyaan'),
(165, 13, 'C0Yo2TOxXeY', 'kapan kapan dibandung lah😡😡 duit ku tidak cukup untuk kesana jadi ku tunggu saja kamu live😔', 'bread_waras', 4, '2023-12-03 04:05:51', 'Negatif', 'Pertanyaan'),
(166, 13, 'C0Yo2TOxXeY', 'Bogel', 'misaelchrst', 0, '2023-12-03 03:06:07', 'Netral', 'Feedback'),
(167, 13, 'C0Yo2TOxXeY', 'kaya ibu sama anak😭', 'neorainsky', 0, '2023-12-03 03:19:11', 'Negatif', 'Feedback'),
(168, 13, 'C0Yo2TOxXeY', 'Ngambil rapor moment', 'aal_san', 0, '2023-12-03 15:25:23', 'Netral', 'Engagement'),
(169, 13, 'C0Yo2TOxXeY', 'Cebol kali', 'akihiro_pratama', 1, '2023-12-03 02:55:05', 'Negatif', 'Engagement'),
(170, 13, 'C0Yo2TOxXeY', 'Mba@cecilialieberiaberdiri loh, duduk mulu 🤭', 'novian_98', 0, '2023-12-03 09:11:52', 'Positif', 'Pertanyaan'),
(171, 13, 'C0Yo2TOxXeY', '@minerose_iddia ikut diliat dri sg ny', 'eika.satoryu', 0, '2023-12-03 13:23:48', 'Netral', 'Engagement'),
(172, 13, 'C0Yo2TOxXeY', 'Ihh lucu bangett, adeek', 'm_zahwan168', 0, '2023-12-03 06:13:43', 'Positif', 'Engagement'),
(173, 13, 'C0Yo2TOxXeY', 'Di lelang gk chi?', 'yut_btsa', 0, '2023-12-03 04:04:36', 'Netral', 'Pertanyaan'),
(174, 13, 'C0Yo2TOxXeY', 'terong', 'yeheheboiis', 0, '2023-12-03 04:28:58', 'Netral', 'Engagement'),
(175, 13, 'C0Yo2TOxXeY', 'Pendeccc coyyy 💀', 'hoshito64p', 0, '2023-12-03 03:39:53', 'Negatif', 'Engagement'),
(176, 13, 'C0Yo2TOxXeY', 'Wait, memangnya tinggi model vtuber kak@cecilialieberiaberapa sih?😅', 'fachrullmaulana', 0, '2023-12-03 17:29:50', 'Netral', 'Pertanyaan'),
(177, 13, 'C0Yo2TOxXeY', 'mampir kak wali band Fatimah Nagaswara 🎶👍', 'automaton.567', 0, '2023-12-03 05:41:22', 'Netral', 'Engagement'),
(178, 13, 'C0Yo2TOxXeY', 'Echii tinggi amayyy', 'widyaawaww', 0, '2023-12-03 16:55:27', 'Positif', 'Engagement'),
(179, 13, 'C0Yo2TOxXeY', 'Cecil ternyata.....', 'the_virtuallist', 0, '2023-12-03 03:54:16', 'Positif', 'Pertanyaan'),
(180, 13, 'C0Yo2TOxXeY', 'Pendecc 😭😭', 'nr.zr', 0, '2023-12-03 04:29:08', 'Negatif', 'Engagement'),
(181, 13, 'C0Yo2TOxXeY', 'Ku kira selama ini ecchi pendek', 'story_on_a_rainy_day', 0, '2023-12-06 00:03:17', 'Netral', 'Engagement'),
(182, 13, 'C0Yo2TOxXeY', 'Loh kok pendek?', 'kowalski_deep', 0, '2023-12-03 09:01:12', 'Negatif', 'Pertanyaan'),
(183, 13, 'C0Yo2TOxXeY', 'fendek😂', 'sukronmzen', 1, '2023-12-03 02:14:48', 'Positif', 'Engagement'),
(184, 13, 'C0Yo2TOxXeY', 'Aku kira lagi duduk ternyata berdiri🤣', 'aleefv____', 0, '2023-12-03 03:50:08', 'Positif', 'Engagement'),
(185, 13, 'C0Yo2TOxXeY', 'Bogel mamank', 'ageng.gusti', 0, '2023-12-03 05:10:51', 'Netral', 'Pertanyaan'),
(186, 13, 'C0Yo2TOxXeY', 'Emng boleh se yakult itu?', 'mas.hm_05', 1, '2023-12-04 01:52:22', 'Negatif', 'Pertanyaan'),
(187, 14, 'OKdXotpPx1w', 'Ih mbak ramputmu dikuncir ya', '@GordVendome', 0, '2022-06-07 08:43:41', 'Negatif', 'Engagement'),
(188, 14, 'OKdXotpPx1w', 'mami', '@madhubabu1386', 0, '2022-06-06 12:13:01', 'Netral', 'Engagement'),
(189, 14, 'OKdXotpPx1w', 'mama', '@madhubabu1386', 0, '2022-06-06 12:12:47', 'Negatif', 'Engagement'),
(190, 14, 'OKdXotpPx1w', 'Seperti di dalam mimpi', '@Ghazzz.', 1, '2022-06-06 08:56:27', 'Negatif', 'Engagement'),
(191, 14, 'OKdXotpPx1w', 'maap Elaine<br><br>GWS YA 🤧', '@YTQi', 0, '2022-06-06 04:44:25', 'Netral', 'Engagement'),
(192, 14, 'OKdXotpPx1w', 'why are we still here.. just to suffer... from the cuteness it is.', '@takoaako2541', 0, '2022-06-06 04:09:05', 'Positif', 'Pertanyaan'),
(193, 14, 'OKdXotpPx1w', 'Hoho', '@kyy2552', 0, '2022-06-06 03:26:54', 'Netral', 'Engagement'),
(194, 14, 'OKdXotpPx1w', 'Subscribe nggak nih ngen😝😂😂', '@tupperware850', 0, '2022-06-06 03:10:05', 'Positif', 'Pertanyaan'),
(195, 14, 'OKdXotpPx1w', 'Y', '@yasuotod6492', 0, '2022-06-06 01:59:14', 'Netral', 'Engagement'),
(196, 14, 'OKdXotpPx1w', 'Echi  cantik banget nih', '@Rizkya.212', 1, '2022-06-05 22:49:01', 'Positif', 'Engagement'),
(197, 14, 'OKdXotpPx1w', 'Hello ^ ^', '@ZedFernando', 1, '2022-06-05 21:14:38', 'Netral', 'Engagement'),
(198, 14, 'OKdXotpPx1w', 'Hai juga... 🤗', '@didiettry', 0, '2022-06-05 21:11:35', 'Netral', 'Pertanyaan'),
(199, 14, 'OKdXotpPx1w', 'Halo', '@elfrandoagungsahalas7274', 0, '2022-06-05 20:29:58', 'Netral', 'Engagement'),
(200, 14, 'OKdXotpPx1w', 'Haii halloo Echi', '@ryoualvarez9823', 0, '2022-06-05 20:03:27', 'Netral', 'Engagement'),
(201, 14, 'OKdXotpPx1w', 'Hii echii😆', '@clarencedesuwa', 0, '2022-06-05 18:00:12', 'Positif', 'Pertanyaan'),
(202, 14, 'OKdXotpPx1w', 'Kamu random banget, tapi aku tetep suka', '@HanazokoJeff', 0, '2022-06-05 17:46:06', 'Positif', 'Engagement'),
(203, 14, 'OKdXotpPx1w', 'Hi', '@Kaaa00', 0, '2022-06-05 17:41:06', 'Negatif', 'Engagement'),
(204, 14, 'OKdXotpPx1w', 'Hai Echi🗿', '@Zeeakins', 0, '2022-06-05 16:53:21', 'Netral', 'Engagement'),
(205, 14, 'OKdXotpPx1w', 'Who is this sassy, beautiful girl?<br><br>she captured my heart', '@EmKunWeebGaming', 0, '2022-06-05 16:21:14', 'Positif', 'Engagement'),
(206, 14, 'OKdXotpPx1w', 'Ehek .. ..', '@tuta8612', 0, '2022-06-05 16:13:37', 'Netral', 'Pertanyaan'),
(207, 14, 'OKdXotpPx1w', 'GWS kak Echi, Agak Creepy sih tb tb ketawa', '@ihsanfizhilaalilquran7254', 0, '2022-06-05 16:04:20', 'Netral', 'Feedback'),
(208, 14, 'OKdXotpPx1w', 'Um...hello...', '@toyarookie413', 0, '2022-06-05 15:59:52', 'Netral', 'Pertanyaan'),
(209, 14, 'OKdXotpPx1w', 'Hi', '@manusiabukit14', 0, '2022-06-05 14:59:35', 'Negatif', 'Engagement'),
(210, 14, 'OKdXotpPx1w', 'Hi', '@MoonaHoshinovahololive-ID', 0, '2022-06-05 12:21:15', 'Negatif', 'Engagement'),
(211, 14, 'OKdXotpPx1w', 'Cakep amat', '@heejin8386', 0, '2022-06-05 11:57:16', 'Netral', 'Engagement'),
(212, 14, 'OKdXotpPx1w', 'Hey you. You&#39;re finally awake', '@prisoner_van_houten', 0, '2022-06-05 11:41:18', 'Positif', 'Pertanyaan'),
(213, 14, 'OKdXotpPx1w', 'Hi Honey', '@yogapawapua', 0, '2022-06-05 11:38:20', 'Negatif', 'Engagement'),
(214, 14, 'OKdXotpPx1w', 'KAWAII😺', '@bociloomaga1293', 0, '2022-06-05 11:09:15', 'Negatif', 'Feedback'),
(215, 14, 'OKdXotpPx1w', 'Hai 🤗', '@haaaaA3', 0, '2022-06-05 11:04:03', 'Netral', 'Engagement'),
(216, 14, 'OKdXotpPx1w', 'Hi juga', '@enderman7165', 0, '2022-06-05 10:40:13', 'Negatif', 'Engagement'),
(217, 14, 'OKdXotpPx1w', 'Duh', '@tumbill5019', 0, '2022-06-05 09:59:42', 'Negatif', 'Engagement'),
(218, 14, 'OKdXotpPx1w', '... Hi Echi 😳', '@rifu_san', 0, '2022-06-05 09:59:30', 'Netral', 'Pertanyaan'),
(219, 14, 'OKdXotpPx1w', 'Halo cantik', '@LeoReal96', 0, '2022-06-05 09:52:30', 'Netral', 'Engagement'),
(220, 14, 'OKdXotpPx1w', 'Damn... efek2 glowingnya ngeunah pisan wkwk', '@michaelsv4644', 0, '2022-06-05 09:51:54', 'Positif', 'Feedback'),
(221, 14, 'OKdXotpPx1w', 'Yaampun, cantiknya istri anime aku 😍🥰🥰/plak <br><br>Btw hai juga Echi!', '@gosick6875', 0, '2022-06-05 09:51:12', 'Positif', 'Engagement'),
(222, 14, 'OKdXotpPx1w', '😳 H...hh... hiii Echi...<br>(Ponytail-nya langsung bikin critical damage)', '@RiadyawanAcoustica', 1, '2022-06-05 09:48:49', 'Netral', 'Pertanyaan'),
(223, 14, 'OKdXotpPx1w', 'Hai', '@meteor8169', 0, '2022-06-05 09:47:44', 'Netral', 'Engagement'),
(224, 14, 'OKdXotpPx1w', 'hyy', '@okkywibuwu1074', 0, '2022-06-05 09:40:37', 'Netral', 'Feedback'),
(225, 14, 'OKdXotpPx1w', 'Selamat malam ka Elaine', '@sahrulefendi140', 0, '2022-06-05 09:40:12', 'Netral', 'Engagement'),
(226, 14, 'OKdXotpPx1w', 'HI👋', '@sahrulefendi140', 0, '2022-06-05 09:39:08', 'Negatif', 'Engagement'),
(227, 14, 'OKdXotpPx1w', 'sedang menunggu', '@mitimytha6201', 0, '2022-06-05 09:38:13', 'Netral', 'Engagement'),
(228, 14, 'OKdXotpPx1w', 'Echi ponytail sangat wangy😍', '@ElDiamante09', 1, '2022-06-05 09:34:18', 'Positif', 'Engagement'),
(229, 14, 'OKdXotpPx1w', 'Hi', '@zulanu7180', 0, '2022-06-05 09:34:06', 'Negatif', 'Engagement'),
(230, 14, 'OKdXotpPx1w', 'Hai 👋', '@sleeper173', 0, '2022-06-05 09:32:36', 'Netral', 'Engagement'),
(231, 14, 'OKdXotpPx1w', 'oh hi echi<br>i&#39;m stay here', '@leviimlbb171', 0, '2022-06-05 09:31:33', 'Positif', 'Engagement'),
(232, 14, 'OKdXotpPx1w', 'Uwohhh baru nyadar Gaya Rambutnya PonyTail😀', '@OneRid.nataDewa', 0, '2022-06-05 09:31:13', 'Netral', 'Feedback'),
(233, 14, 'OKdXotpPx1w', 'lho lho lho, anda bukannya youtuber versi baru, pixeltuber?', '@GrandyDWM', 0, '2022-06-05 09:30:34', 'Positif', 'Pertanyaan'),
(234, 14, 'OKdXotpPx1w', 'Turu', '@beastard4110', 1, '2022-06-05 09:30:25', 'Netral', 'Engagement'),
(235, 14, 'OKdXotpPx1w', 'oh hi~', '@ramzyhanansyah4854', 0, '2022-06-05 09:30:14', 'Netral', 'Engagement'),
(236, 14, 'OKdXotpPx1w', 'jiwaku hanyut dalam senyumanmu', '@megadh2686', 0, '2022-06-05 09:26:51', 'Netral', 'Engagement'),
(237, 14, 'OKdXotpPx1w', 'Mau streaming apa engga nih Elaine🤔', '@OneRid.nataDewa', 6, '2022-06-05 09:26:32', 'Negatif', 'Pertanyaan'),
(238, 14, 'OKdXotpPx1w', 'Tapi Lucu😎', '@OneRid.nataDewa', 1, '2022-06-05 09:25:32', 'Positif', 'Engagement'),
(239, 14, 'OKdXotpPx1w', 'Ngaceng', '@bloodofseeker', 0, '2022-06-05 09:25:22', 'Netral', 'Engagement'),
(240, 14, 'OKdXotpPx1w', 'turu besok senin', '@JejehXD', 0, '2022-06-05 09:25:17', 'Netral', 'Engagement'),
(241, 14, 'OKdXotpPx1w', 'Gaje nih 🗿', '@OneRid.nataDewa', 1, '2022-06-05 09:24:54', 'Negatif', 'Engagement'),
(242, 14, 'OKdXotpPx1w', '😍😍😍', '@phrulisanelangicikiwirr', 1, '2022-06-05 09:24:04', 'Positif', 'Engagement'),
(243, 14, 'OKdXotpPx1w', 'Makasih endurance stream nya kak eci puas banget barusan 30jam nontonnya seru banget', '@syneesaurus', 5, '2022-06-05 09:24:02', 'Positif', 'Feedback'),
(244, 14, 'OKdXotpPx1w', 'Hi Bang', '@haqqij1660', 0, '2022-06-05 09:23:47', 'Netral', 'Engagement'),
(245, 14, 'OKdXotpPx1w', 'Tawanya candu', '@suneater5712', 0, '2022-06-05 09:23:41', 'Positif', 'Feedback'),
(246, 14, 'OKdXotpPx1w', 'Hi', '@deviloni3427', 0, '2022-06-05 09:22:33', 'Negatif', 'Engagement'),
(247, 14, 'OKdXotpPx1w', 'Hi', '@hansz2887', 0, '2022-06-05 09:22:30', 'Negatif', 'Engagement'),
(248, 14, 'OKdXotpPx1w', 'Hi', '@abdilllahramadhani3341', 0, '2022-06-05 09:22:26', 'Negatif', 'Engagement'),
(249, 14, 'OKdXotpPx1w', 'Gabut kah echi', '@iamfatir6897', 0, '2022-06-05 09:22:21', 'Negatif', 'Pertanyaan'),
(250, 14, 'OKdXotpPx1w', 'Hi', '@ghuxlynx5839', 0, '2022-06-05 09:22:21', 'Negatif', 'Engagement'),
(251, 14, 'OKdXotpPx1w', 'Hi jugak', '@ndyyy4324', 0, '2022-06-05 09:21:47', 'Negatif', 'Engagement'),
(252, 14, 'OKdXotpPx1w', 'Hehehe😀😀😀', '@hamzah7431', 0, '2022-06-05 09:21:42', 'Netral', 'Engagement'),
(253, 14, 'OKdXotpPx1w', 'Hehe..', '@hardikusuma383', 0, '2022-06-05 09:21:37', 'Netral', 'Pertanyaan'),
(254, 14, 'OKdXotpPx1w', 'Hi', '@comfuse7658', 0, '2022-06-05 09:21:29', 'Negatif', 'Engagement'),
(255, 14, 'OKdXotpPx1w', 'Malam Elaine', '@sonic5072', 0, '2022-06-05 09:21:21', 'Netral', 'Engagement'),
(256, 15, 'OKdXotpPx1w', 'Ih mbak ramputmu dikuncir ya', '@GordVendome', 0, '2022-06-07 08:43:41', 'Negatif', 'Engagement'),
(257, 15, 'OKdXotpPx1w', 'mami', '@madhubabu1386', 0, '2022-06-06 12:13:01', 'Netral', 'Engagement'),
(258, 15, 'OKdXotpPx1w', 'mama', '@madhubabu1386', 0, '2022-06-06 12:12:47', 'Negatif', 'Engagement'),
(259, 15, 'OKdXotpPx1w', 'Seperti di dalam mimpi', '@Ghazzz.', 1, '2022-06-06 08:56:27', 'Negatif', 'Engagement'),
(260, 15, 'OKdXotpPx1w', 'maap Elaine<br><br>GWS YA 🤧', '@YTQi', 0, '2022-06-06 04:44:25', 'Netral', 'Engagement'),
(261, 15, 'OKdXotpPx1w', 'why are we still here.. just to suffer... from the cuteness it is.', '@takoaako2541', 0, '2022-06-06 04:09:05', 'Positif', 'Pertanyaan'),
(262, 15, 'OKdXotpPx1w', 'Hoho', '@kyy2552', 0, '2022-06-06 03:26:54', 'Netral', 'Engagement'),
(263, 15, 'OKdXotpPx1w', 'Subscribe nggak nih ngen😝😂😂', '@tupperware850', 0, '2022-06-06 03:10:05', 'Positif', 'Pertanyaan'),
(264, 15, 'OKdXotpPx1w', 'Y', '@yasuotod6492', 0, '2022-06-06 01:59:14', 'Netral', 'Engagement'),
(265, 15, 'OKdXotpPx1w', 'Echi  cantik banget nih', '@Rizkya.212', 1, '2022-06-05 22:49:01', 'Positif', 'Engagement'),
(266, 15, 'OKdXotpPx1w', 'Hello ^ ^', '@ZedFernando', 1, '2022-06-05 21:14:38', 'Netral', 'Engagement'),
(267, 15, 'OKdXotpPx1w', 'Hai juga... 🤗', '@didiettry', 0, '2022-06-05 21:11:35', 'Netral', 'Pertanyaan'),
(268, 15, 'OKdXotpPx1w', 'Halo', '@elfrandoagungsahalas7274', 0, '2022-06-05 20:29:58', 'Netral', 'Engagement'),
(269, 15, 'OKdXotpPx1w', 'Haii halloo Echi', '@ryoualvarez9823', 0, '2022-06-05 20:03:27', 'Netral', 'Engagement'),
(270, 15, 'OKdXotpPx1w', 'Hii echii😆', '@clarencedesuwa', 0, '2022-06-05 18:00:12', 'Positif', 'Pertanyaan'),
(271, 15, 'OKdXotpPx1w', 'Kamu random banget, tapi aku tetep suka', '@HanazokoJeff', 0, '2022-06-05 17:46:06', 'Positif', 'Engagement'),
(272, 15, 'OKdXotpPx1w', 'Hi', '@Kaaa00', 0, '2022-06-05 17:41:06', 'Negatif', 'Engagement'),
(273, 15, 'OKdXotpPx1w', 'Hai Echi🗿', '@Zeeakins', 0, '2022-06-05 16:53:21', 'Netral', 'Engagement'),
(274, 15, 'OKdXotpPx1w', 'Who is this sassy, beautiful girl?<br><br>she captured my heart', '@EmKunWeebGaming', 0, '2022-06-05 16:21:14', 'Positif', 'Engagement'),
(275, 15, 'OKdXotpPx1w', 'Ehek .. ..', '@tuta8612', 0, '2022-06-05 16:13:37', 'Netral', 'Pertanyaan'),
(276, 15, 'OKdXotpPx1w', 'GWS kak Echi, Agak Creepy sih tb tb ketawa', '@ihsanfizhilaalilquran7254', 0, '2022-06-05 16:04:20', 'Netral', 'Feedback'),
(277, 15, 'OKdXotpPx1w', 'Um...hello...', '@toyarookie413', 0, '2022-06-05 15:59:52', 'Netral', 'Pertanyaan'),
(278, 15, 'OKdXotpPx1w', 'Hi', '@manusiabukit14', 0, '2022-06-05 14:59:35', 'Negatif', 'Engagement'),
(279, 15, 'OKdXotpPx1w', 'Hi', '@MoonaHoshinovahololive-ID', 0, '2022-06-05 12:21:15', 'Negatif', 'Engagement'),
(280, 15, 'OKdXotpPx1w', 'Cakep amat', '@heejin8386', 0, '2022-06-05 11:57:16', 'Netral', 'Engagement'),
(281, 15, 'OKdXotpPx1w', 'Hey you. You&#39;re finally awake', '@prisoner_van_houten', 0, '2022-06-05 11:41:18', 'Positif', 'Pertanyaan'),
(282, 15, 'OKdXotpPx1w', 'Hi Honey', '@yogapawapua', 0, '2022-06-05 11:38:20', 'Negatif', 'Engagement'),
(283, 15, 'OKdXotpPx1w', 'KAWAII😺', '@bociloomaga1293', 0, '2022-06-05 11:09:15', 'Negatif', 'Feedback'),
(284, 15, 'OKdXotpPx1w', 'Hai 🤗', '@haaaaA3', 0, '2022-06-05 11:04:03', 'Netral', 'Engagement'),
(285, 15, 'OKdXotpPx1w', 'Hi juga', '@enderman7165', 0, '2022-06-05 10:40:13', 'Negatif', 'Engagement'),
(286, 15, 'OKdXotpPx1w', 'Duh', '@tumbill5019', 0, '2022-06-05 09:59:42', 'Negatif', 'Engagement'),
(287, 15, 'OKdXotpPx1w', '... Hi Echi 😳', '@rifu_san', 0, '2022-06-05 09:59:30', 'Netral', 'Pertanyaan'),
(288, 15, 'OKdXotpPx1w', 'Halo cantik', '@LeoReal96', 0, '2022-06-05 09:52:30', 'Netral', 'Engagement'),
(289, 15, 'OKdXotpPx1w', 'Damn... efek2 glowingnya ngeunah pisan wkwk', '@michaelsv4644', 0, '2022-06-05 09:51:54', 'Positif', 'Feedback'),
(290, 15, 'OKdXotpPx1w', 'Yaampun, cantiknya istri anime aku 😍🥰🥰/plak <br><br>Btw hai juga Echi!', '@gosick6875', 0, '2022-06-05 09:51:12', 'Positif', 'Engagement'),
(291, 15, 'OKdXotpPx1w', '😳 H...hh... hiii Echi...<br>(Ponytail-nya langsung bikin critical damage)', '@RiadyawanAcoustica', 1, '2022-06-05 09:48:49', 'Netral', 'Pertanyaan'),
(292, 15, 'OKdXotpPx1w', 'Hai', '@meteor8169', 0, '2022-06-05 09:47:44', 'Netral', 'Engagement'),
(293, 15, 'OKdXotpPx1w', 'hyy', '@okkywibuwu1074', 0, '2022-06-05 09:40:37', 'Netral', 'Feedback'),
(294, 15, 'OKdXotpPx1w', 'Selamat malam ka Elaine', '@sahrulefendi140', 0, '2022-06-05 09:40:12', 'Netral', 'Engagement'),
(295, 15, 'OKdXotpPx1w', 'HI👋', '@sahrulefendi140', 0, '2022-06-05 09:39:08', 'Negatif', 'Engagement'),
(296, 15, 'OKdXotpPx1w', 'sedang menunggu', '@mitimytha6201', 0, '2022-06-05 09:38:13', 'Netral', 'Engagement'),
(297, 15, 'OKdXotpPx1w', 'Echi ponytail sangat wangy😍', '@ElDiamante09', 1, '2022-06-05 09:34:18', 'Positif', 'Engagement'),
(298, 15, 'OKdXotpPx1w', 'Hi', '@zulanu7180', 0, '2022-06-05 09:34:06', 'Negatif', 'Engagement'),
(299, 15, 'OKdXotpPx1w', 'Hai 👋', '@sleeper173', 0, '2022-06-05 09:32:36', 'Netral', 'Engagement'),
(300, 15, 'OKdXotpPx1w', 'oh hi echi<br>i&#39;m stay here', '@leviimlbb171', 0, '2022-06-05 09:31:33', 'Positif', 'Engagement'),
(301, 15, 'OKdXotpPx1w', 'Uwohhh baru nyadar Gaya Rambutnya PonyTail😀', '@OneRid.nataDewa', 0, '2022-06-05 09:31:13', 'Netral', 'Feedback'),
(302, 15, 'OKdXotpPx1w', 'lho lho lho, anda bukannya youtuber versi baru, pixeltuber?', '@GrandyDWM', 0, '2022-06-05 09:30:34', 'Positif', 'Pertanyaan'),
(303, 15, 'OKdXotpPx1w', 'Turu', '@beastard4110', 1, '2022-06-05 09:30:25', 'Netral', 'Engagement'),
(304, 15, 'OKdXotpPx1w', 'oh hi~', '@ramzyhanansyah4854', 0, '2022-06-05 09:30:14', 'Netral', 'Engagement'),
(305, 15, 'OKdXotpPx1w', 'jiwaku hanyut dalam senyumanmu', '@megadh2686', 0, '2022-06-05 09:26:51', 'Netral', 'Engagement'),
(306, 15, 'OKdXotpPx1w', 'Mau streaming apa engga nih Elaine🤔', '@OneRid.nataDewa', 6, '2022-06-05 09:26:32', 'Negatif', 'Pertanyaan'),
(307, 15, 'OKdXotpPx1w', 'Tapi Lucu😎', '@OneRid.nataDewa', 1, '2022-06-05 09:25:32', 'Positif', 'Engagement'),
(308, 15, 'OKdXotpPx1w', 'Ngaceng', '@bloodofseeker', 0, '2022-06-05 09:25:22', 'Netral', 'Engagement'),
(309, 15, 'OKdXotpPx1w', 'turu besok senin', '@JejehXD', 0, '2022-06-05 09:25:17', 'Netral', 'Engagement'),
(310, 15, 'OKdXotpPx1w', 'Gaje nih 🗿', '@OneRid.nataDewa', 1, '2022-06-05 09:24:54', 'Negatif', 'Engagement'),
(311, 15, 'OKdXotpPx1w', '😍😍😍', '@phrulisanelangicikiwirr', 1, '2022-06-05 09:24:04', 'Positif', 'Engagement'),
(312, 15, 'OKdXotpPx1w', 'Makasih endurance stream nya kak eci puas banget barusan 30jam nontonnya seru banget', '@syneesaurus', 5, '2022-06-05 09:24:02', 'Positif', 'Feedback'),
(313, 15, 'OKdXotpPx1w', 'Hi Bang', '@haqqij1660', 0, '2022-06-05 09:23:47', 'Netral', 'Engagement'),
(314, 15, 'OKdXotpPx1w', 'Tawanya candu', '@suneater5712', 0, '2022-06-05 09:23:41', 'Positif', 'Feedback'),
(315, 15, 'OKdXotpPx1w', 'Hi', '@deviloni3427', 0, '2022-06-05 09:22:33', 'Negatif', 'Engagement'),
(316, 15, 'OKdXotpPx1w', 'Hi', '@hansz2887', 0, '2022-06-05 09:22:30', 'Negatif', 'Engagement'),
(317, 15, 'OKdXotpPx1w', 'Hi', '@abdilllahramadhani3341', 0, '2022-06-05 09:22:26', 'Negatif', 'Engagement'),
(318, 15, 'OKdXotpPx1w', 'Gabut kah echi', '@iamfatir6897', 0, '2022-06-05 09:22:21', 'Negatif', 'Pertanyaan'),
(319, 15, 'OKdXotpPx1w', 'Hi', '@ghuxlynx5839', 0, '2022-06-05 09:22:21', 'Negatif', 'Engagement'),
(320, 15, 'OKdXotpPx1w', 'Hi jugak', '@ndyyy4324', 0, '2022-06-05 09:21:47', 'Negatif', 'Engagement'),
(321, 15, 'OKdXotpPx1w', 'Hehehe😀😀😀', '@hamzah7431', 0, '2022-06-05 09:21:42', 'Netral', 'Engagement'),
(322, 15, 'OKdXotpPx1w', 'Hehe..', '@hardikusuma383', 0, '2022-06-05 09:21:37', 'Netral', 'Pertanyaan'),
(323, 15, 'OKdXotpPx1w', 'Hi', '@comfuse7658', 0, '2022-06-05 09:21:29', 'Negatif', 'Engagement'),
(324, 15, 'OKdXotpPx1w', 'Malam Elaine', '@sonic5072', 0, '2022-06-05 09:21:21', 'Netral', 'Engagement');

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
(6, 'jUS9sPAL717', 'Yume goes to Bali B)', NULL, 'Yaska', 12, '2023-12-07 09:17:11', 'Instagram'),
(7, 'C-bgFaefdXY', '【Fate/Grand Order】FGO第二部完结纪念 Ordeal Call', '视频包含2.7，街机联动的剧情剧透请注意。以b站的up主精神隶属机的视频【FGO/旧作】FGO第一部完结纪念～云巅之上~Over The Clouds，为参考做的续作，这是本人逛b站几年来刷到过个人最喜欢的作品，up应该是没有做后续的打算了，据本人描述。趁着奏章出来之前想把迦勒底至今为止在众异闻带和新特异点的积累以同样的方式展现出来。本来预计会做两周左右，但是紧赶慢赶也花了3周左右的时间才勉强赶出来。结果不尽人意，认为才达到原作水准的60%。这个作品本就是以细节主打的硬核混剪，每看一次都会有新的发现，但是真当我尝试一帧一帧的解读才发现原来视频包含的细节量远远高出我的认知。很多场景靠我现在的能力还原不出来，只能以自己的理解尝试靠近模仿（投影魔术），最然结果肯定和up的原视频有着相当大的差距，但总归经过三周的洗礼，还是把它发出来吧，喜欢的观众希望三连转发支持一下，而且最好关注给我带来灵感和动机的up精神隶属机（本人宣布不再更新视频，应该是因为b站算法推荐的关系），但是依旧值得观看。', 'Avalon', 335, '2023-06-10 21:45:11', 'Youtube'),
(9, 'C0Yo2TOxXeY', 'Siapa yang ke@motionimefesthari ini???Human Standee aku dan@cecilialieberiadilelang loh sampai jam 19:00 WIB malam ini! 🔥Ayo ke booth@rememories.idsekarang jugaaaaa 🫵🌟', NULL, 'elaine.celestia', 2438, '2023-12-03 01:56:41', 'Instagram'),
(10, 'C0Yo2TOxXeY', 'Siapa yang ke@motionimefesthari ini???Human Standee aku dan@cecilialieberiadilelang loh sampai jam 19:00 WIB malam ini! 🔥Ayo ke booth@rememories.idsekarang jugaaaaa 🫵🌟', NULL, 'elaine.celestia', 2438, '2023-12-19 08:34:13', 'Instagram'),
(11, 'C0Yo2TOxXeY', 'Siapa yang ke@motionimefesthari ini???Human Standee aku dan@cecilialieberiadilelang loh sampai jam 19:00 WIB malam ini! 🔥Ayo ke booth@rememories.idsekarang jugaaaaa 🫵🌟', NULL, 'elaine.celestia', 2439, '2023-12-03 01:56:41', 'Instagram'),
(12, '4TXypBS_IfY', 'Endless Tears - CLIFF EDGE feat. 中村舞子【Kobo Kanaeru ft. Mori Calliope】【歌詞中文翻譯】', '自己最喜歡的歌曲之一 ；；\n題外話：最近YT上傳影片由1分鐘變成15分鐘+了… 不知道是不是個人問題…\n剪輯/字幕：Fir\n歌詞翻譯：小羅 ♪\nhttps://home.gamer.com.tw/creationDetail.php?sn=5066049\n\n原片/ Original：\nhttps://youtu.be/8xF1xccpc98\n\n@KoboKanaeru \n@MoriCalliope \n\n#ホロライブ \n#hololive', 'Fir【音楽の隅・翻訳】', 4263, '2023-10-27 21:51:29', 'Youtube'),
(13, 'C0Yo2TOxXeY', 'Siapa yang ke@motionimefesthari ini???Human Standee aku dan@cecilialieberiadilelang loh sampai jam 19:00 WIB malam ini! 🔥Ayo ke booth@rememories.idsekarang jugaaaaa 🫵🌟', NULL, 'elaine.celestia', 2458, '2023-12-03 01:56:41', 'Instagram'),
(14, 'OKdXotpPx1w', 'Hi', NULL, 'Elaine Celestia Ch.『 Re:Memories 』', 678, '2022-06-05 09:20:15', 'Youtube'),
(15, 'OKdXotpPx1w', 'Hi', NULL, 'Elaine Celestia Ch.『 Re:Memories 』', 678, '2022-06-05 09:20:15', 'Youtube');

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
(6, 'jUS9sPAL717', 6, '2023-12-07 09:34:52'),
(7, 'C-bgFaefdXY', 6, '2023-12-15 01:37:49'),
(9, 'C0Yo2TOxXeY', 3, '2023-12-15 04:03:14'),
(10, 'C0Yo2TOxXeY', 3, '2023-12-15 04:16:03'),
(11, 'C0Yo2TOxXeY', 3, '2023-12-15 04:19:13'),
(12, '4TXypBS_IfY', 6, '2023-12-18 02:08:15'),
(13, 'C0Yo2TOxXeY', 6, '2023-12-18 02:14:27'),
(14, 'OKdXotpPx1w', 6, '2023-12-19 07:48:16'),
(15, 'OKdXotpPx1w', 6, '2023-12-19 07:55:32');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
