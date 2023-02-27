-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2023 at 09:41 PM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keyline2_db_podcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `abp_jwplatform_medias`
--

CREATE TABLE `abp_jwplatform_medias` (
  `media_id` int(20) NOT NULL,
  `show_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `media_code` varchar(256) DEFAULT NULL,
  `media_title` varchar(256) DEFAULT NULL,
  `media_slug` varchar(250) DEFAULT NULL,
  `media_embed_code` varchar(256) DEFAULT NULL,
  `media_description` longtext,
  `media_publish_start_day` enum('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY') NOT NULL,
  `media_publish_start_datetime` datetime DEFAULT NULL,
  `media_publish_end_datetime` varchar(255) DEFAULT NULL,
  `media_publish_utc_datetime` varchar(255) DEFAULT NULL,
  `media_category` varchar(256) DEFAULT NULL,
  `media_placeholder_image_txt` varchar(256) DEFAULT NULL,
  `media_author` varchar(150) DEFAULT NULL,
  `media_permalink` varchar(256) DEFAULT NULL,
  `media_type` varchar(255) DEFAULT NULL COMMENT '''A for Audio'', ''V for video''',
  `media_is_live` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = jw player , 1 = live stream , 2 = promotion ',
  `media_created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media_updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media_is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_jwplatform_medias`
--

INSERT INTO `abp_jwplatform_medias` (`media_id`, `show_id`, `season_id`, `media_code`, `media_title`, `media_slug`, `media_embed_code`, `media_description`, `media_publish_start_day`, `media_publish_start_datetime`, `media_publish_end_datetime`, `media_publish_utc_datetime`, `media_category`, `media_placeholder_image_txt`, `media_author`, `media_permalink`, `media_type`, `media_is_live`, `media_created_datetime`, `media_updated_datetime`, `media_is_active`) VALUES
(1, 2, 1, 'GEcjnvLy', 'Bhoot Kotha Ep-01', 'bhoot-kotha-ep-01', '', '', 'SATURDAY', '2023-02-25 15:30:00', '', '2023-03-19T08:00:00+00:00', '', NULL, 'Aritra', '', 'media', 0, '2023-01-31 22:26:58', '2023-02-25 00:28:16', 1),
(2, 3, 1, 'RDaQqR5y', 'Dear Diary Ep-01', 'dear-diary-ep-01', '', '', 'MONDAY', '2023-02-27 13:00:00', '', '2023-02-27T07:30:00+00:00', '', NULL, 'Ishita', '', 'media', 0, '2023-01-31 22:27:25', '2023-02-19 20:17:25', 1),
(3, 10, 1, 'CG5BBBfo', 'Spy Stories with Srijon', 'spy-stories-with-srijon', '', '', 'SATURDAY', '2023-02-25 23:30:00', '', '2023-02-25T18:00:00+00:00', '', NULL, 'Srijon', '', 'media', 0, '2023-01-31 22:28:24', '2023-02-19 19:50:59', 1),
(4, 1, 1, 'qJhQsobr', 'Tiny Tales with Priyanka', 'tiny-tales-with-priyanka', '', '', 'WEDNESDAY', '2023-02-22 11:30:00', '', '2023-02-24T07:00:00+00:00', '', NULL, 'Priyanka', '', 'media', 0, '2023-01-31 22:29:57', '2023-02-22 04:59:35', 1),
(5, 9, 1, '425tun3W', 'Sherdil with Smriti', 'sherdil-with-smriti', '', '', 'WEDNESDAY', '2023-02-22 11:00:00', '', '2023-02-23T10:30:00+00:00', '', NULL, 'Smriti', '', 'media', 0, '2023-01-31 22:30:47', '2023-02-22 04:59:04', 1),
(6, 8, 1, 'Vfm2y8wd', 'Kuheli Podcast Ep-01 - Aclo Phobia', 'kuheli-podcast-ep-01-aclo-phobia', '', '', 'TUESDAY', '2023-02-21 21:00:00', NULL, '2023-02-21T15:30:00+00:00', NULL, NULL, 'Kuheli', '', 'media', 0, '2023-01-31 22:31:54', '2023-02-23 22:53:01', 1),
(7, 4, 1, 'v9GzK8dO', 'Haar-na-impossible-with-animesh', 'haar-na-impossible-with-animesh', '', '', 'TUESDAY', '2023-02-21 16:00:00', '2023-02-21 16:30:00', '2023-02-21T07:30:00+00:00', '', NULL, 'Animesh', '', 'media', 0, '2023-01-31 22:32:39', '2023-02-20 22:03:35', 3),
(8, 6, 1, 'lLkNML2Z', 'Nostal Jiya with Raja', 'nostal-jiya-with-raja', '', '', 'MONDAY', '2023-02-20 20:00:00', '2023-02-21 15:31:00', '2023-02-20T14:30:00+00:00', '', NULL, 'Raja', '', 'media', 0, '2023-01-31 22:33:51', '2023-02-20 21:59:45', 3),
(12, 11, 1, 'RS001', 'EP 2 | Rock You', 'ep-2-rock-you', 'https://player.restream.io/?token=0b1c7ceacd44469e90737bf16d84af2e&vwrs=1', '<p>This is test</p>\r\n', 'SATURDAY', '2023-02-20 15:12:00', '2023-02-20 15:25:00', '2023-02-18 03:03:00', 'Entertainment', NULL, 'Jimmy Tangri', '', NULL, 1, '2023-02-18 03:27:27', '2023-02-18 03:44:29', 3),
(15, 11, 1, 'RS003', 'Dill Se', 'dill-se', 'https://player.restream.io/?token=0b1c7ceacd44469e90737bf16d84af2e&vwrs=1', '<p>This is test</p>\r\n', 'TUESDAY', '2023-02-21 15:49:00', '2023-02-21 15:55:00', '2023-02-21 21:26:00', 'Entertainment', NULL, 'Jimmy Tangri', '', NULL, 1, '2023-02-20 21:54:16', '2023-02-20 22:16:05', 3),
(16, 11, 1, 'RS004', 'Dill Se', 'dill-se', 'https://player.restream.io/?token=0b1c7ceacd44469e90737bf16d84af2e&vwrs=1', '<p>This is test</p>\r\n', 'THURSDAY', '2023-02-23 13:31:00', '2023-02-23 19:40:00', '2023-02-23 17:03:00', 'Entertainment', NULL, 'Jimmy Tangri', '', NULL, 1, '2023-02-20 22:29:26', '2023-02-23 05:57:32', 3);

-- --------------------------------------------------------

--
-- Table structure for table `abp_quizzes`
--

CREATE TABLE `abp_quizzes` (
  `quiz_id` int(20) NOT NULL,
  `quiz_title` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `quiz_added_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quiz_updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_quizzes`
--

INSERT INTO `abp_quizzes` (`quiz_id`, `quiz_title`, `is_active`, `quiz_added_datetime`, `quiz_updated_datetime`) VALUES
(1, 'Park Street Cemetery', 1, '2023-01-02 07:05:16', '2023-01-02 07:05:16'),
(2, 'Miscellaneous foo', 1, '2023-02-25 05:37:35', '2023-02-25 05:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `abp_quiz_questions`
--

CREATE TABLE `abp_quiz_questions` (
  `question_id` int(20) NOT NULL,
  `question_quiz_id` int(20) NOT NULL,
  `question_type` enum('image','video','text') NOT NULL,
  `quiz_description_txt` varchar(255) DEFAULT NULL,
  `question_attachment_title` varchar(256) DEFAULT NULL,
  `abp_video_link` varchar(255) DEFAULT NULL,
  `abp_video_code` varchar(255) DEFAULT NULL,
  `question_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 is active , 0 is deactive and 3 is delete',
  `question_addded_time` datetime NOT NULL,
  `question_updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_quiz_questions`
--

INSERT INTO `abp_quiz_questions` (`question_id`, `question_quiz_id`, `question_type`, `quiz_description_txt`, `question_attachment_title`, `abp_video_link`, `abp_video_code`, `question_active`, `question_addded_time`, `question_updated_datetime`) VALUES
(1, 1, 'text', '<p>Park Street Cemetery located at - </p>\r\n', NULL, NULL, NULL, 0, '2023-02-11 02:02:58', '2023-02-11 13:16:04'),
(2, 2, 'image', '<p><strong>Who painted the Mona Lisa?</strong></p>\r\n', '1672643416the-mona-lisa.jpg', NULL, NULL, 0, '2023-01-02 12:40:16', '2023-01-18 13:34:50'),
(3, 2, 'text', '<p><strong>which country won the most world cups<em> -</em></strong></p>\r\n', NULL, NULL, NULL, 0, '2023-01-02 12:46:44', '2023-01-18 13:34:48'),
(10, 2, 'video', '<p>Who is the male singer in&nbsp;this song ?</p>\r\n', NULL, 'https://www.youtube.com/watch?v=BddP6PYo2gs&ab_channel=SonyMusicIndia', 'BddP6PYo2gs', 3, '2023-01-02 01:17:49', '2023-01-05 12:41:56'),
(12, 2, 'text', '<p>Test</p>\r\n', NULL, '', NULL, 3, '2023-01-04 01:27:15', '2023-01-04 07:58:01'),
(13, 1, 'text', '<p>Demo</p>\r\n', NULL, '', NULL, 3, '2023-01-12 02:03:02', '2023-01-12 08:33:28'),
(14, 1, 'text', 'Test<script>prompt(document.domain)</script>', NULL, '', NULL, 0, '2023-02-24 12:16:41', '2023-02-24 06:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `abp_quiz_question_choices`
--

CREATE TABLE `abp_quiz_question_choices` (
  `choice_id` int(20) NOT NULL,
  `choice_question_id` int(20) NOT NULL,
  `choice_is_right` enum('0','1') NOT NULL COMMENT '1 is right , 0 is wrong',
  `choice_description` longtext NOT NULL,
  `question_active` tinyint(1) DEFAULT '1',
  `choice_added_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `question_updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_quiz_question_choices`
--

INSERT INTO `abp_quiz_question_choices` (`choice_id`, `choice_question_id`, `choice_is_right`, `choice_description`, `question_active`, `choice_added_datetime`, `question_updated_datetime`) VALUES
(1, 1, '1', 'Kolkata', 1, '2023-01-02 09:20:59', '2023-01-02 09:20:59'),
(2, 1, '0', 'Pune', 1, '2023-01-02 07:06:33', '2023-01-02 07:06:33'),
(3, 1, '0', 'Mumbai', 1, '2023-01-02 07:06:33', '2023-01-02 07:06:33'),
(4, 1, '0', 'Delhi', 1, '2023-01-02 07:06:33', '2023-01-02 07:06:33'),
(5, 2, '1', 'Leonardo da Vinci', 1, '2023-01-02 09:12:10', '2023-01-02 09:12:10'),
(6, 2, '0', 'Raphael', 1, '2023-01-02 07:10:16', '2023-01-02 07:10:16'),
(7, 2, '0', 'Pablo Picasso', 1, '2023-01-02 07:10:16', '2023-01-02 07:10:16'),
(8, 2, '0', 'Michelangelo', 1, '2023-01-02 07:14:29', '2023-01-02 07:14:29'),
(9, 3, '1', 'Brazil', 1, '2023-01-05 12:36:26', '2023-01-05 12:36:26'),
(10, 3, '0', 'Argentina', 1, '2023-01-02 07:16:44', '2023-01-02 07:16:44'),
(11, 3, '0', 'France', 1, '2023-01-02 07:16:44', '2023-01-02 07:16:44'),
(12, 3, '0', 'Spain', 1, '2023-01-02 07:16:44', '2023-01-02 07:16:44'),
(27, 10, '1', 'Arijit Singh', 1, '2023-01-05 12:38:15', '2023-01-05 12:38:15'),
(28, 10, '0', 'Sonu Nigam', 1, '2023-01-02 07:47:49', '2023-01-02 07:47:49'),
(29, 10, '0', 'Shaan', 1, '2023-01-02 07:47:49', '2023-01-02 07:47:49'),
(30, 10, '0', 'Atif Aslam', 1, '2023-01-02 07:47:49', '2023-01-02 07:47:49'),
(36, 12, '1', 'Op1', 1, '2023-01-04 07:57:15', '2023-01-04 07:57:15'),
(37, 12, '0', 'Op2', 1, '2023-01-04 08:49:26', '2023-01-04 08:49:26'),
(38, 12, '0', 'Op3', 1, '2023-01-04 08:49:30', '2023-01-04 08:49:30'),
(39, 12, '0', 'Op4', 1, '2023-01-04 08:49:33', '2023-01-04 08:49:33'),
(40, 13, '1', 'Op1', 1, '2023-01-12 08:33:02', '2023-01-12 08:33:02'),
(41, 13, '0', 'Op2', 1, '2023-01-12 08:33:02', '2023-01-12 08:33:02'),
(42, 14, '1', 'op1', 1, '2023-01-18 06:25:05', '2023-01-18 06:25:05'),
(43, 14, '0', 'op2', 1, '2023-01-18 06:25:05', '2023-01-18 06:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `abp_seasons`
--

CREATE TABLE `abp_seasons` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_seasons`
--

INSERT INTO `abp_seasons` (`id`, `name`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Season 1', 1, '2023-01-11 07:41:20', '2023-01-10 20:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `abp_shows`
--

CREATE TABLE `abp_shows` (
  `id` int(11) NOT NULL,
  `show_title` varchar(250) DEFAULT NULL,
  `show_slug` varchar(255) DEFAULT NULL,
  `show_cover_image` varchar(250) DEFAULT NULL,
  `show_keyword` varchar(255) DEFAULT NULL,
  `show_metatag` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_shows`
--

INSERT INTO `abp_shows` (`id`, `show_title`, `show_slug`, `show_cover_image`, `show_keyword`, `show_metatag`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Tiny Tales with Priyanka', 'tiny-tales-with-priyanka', '1676972067Tiny Tales with Priyanka.jpg', '', '', 1, '2023-01-11 08:12:33', '2023-02-20 21:34:27'),
(2, 'Bhooth Katha with Aritra', 'bhooth-katha-with-aritra', '1676972050Bhooth Katha with Aritra.jpg', '', '', 1, '2023-01-11 08:12:50', '2023-02-20 21:34:10'),
(3, 'Dear Dairy', 'dear-dairy', '1676972121Dear Dairy with Ishita.jpg', '', '', 1, '2023-02-01 10:11:19', '2023-02-20 21:35:21'),
(4, 'Haar Na Impossible with Animesh', 'haar-na-impossible-with-animesh', '1676972138Haar Na Impossible with Animesh.jpg', '', '', 1, '2023-02-01 10:11:47', '2023-02-20 21:35:38'),
(5, 'Kitchen Tales with Arijit', 'kitchen-tales-with-arijit', '1676972159Kitchen Tales with Arijit.jpg', '', '', 1, '2023-02-01 10:12:10', '2023-02-20 21:35:59'),
(6, 'Nostal Jiya with Raja', 'nostal-jiya-with-raja', '1676972179Nostal Jiya with Raja.jpg', '', '', 1, '2023-02-01 10:12:35', '2023-02-20 21:36:19'),
(7, 'Once Upon A Time In Bengal with Hrishik', 'once-upon-a-time-in-bengal-with-hrishik', '1676972426Once Upon A Time In Bengal with Hrishik.jpg', '', '', 1, '2023-02-01 10:13:00', '2023-02-20 21:40:26'),
(8, 'Phobia Factor with Kuheli', 'phobia-factor-with-kuheli', '1676972539Phobia Factor with Kuheli.jpg', '', '', 1, '2023-02-01 10:13:33', '2023-02-20 21:42:19'),
(9, 'Sherdil with Smriti', 'sherdil-with-smriti', '1676972614Sherdil with Smriti.jpg', '', '', 1, '2023-02-01 10:13:53', '2023-02-20 21:43:34'),
(10, 'Spy Stories with Srijon', 'spy-stories-with-srijon', '1676972629Spy Stories with Srijon.jpg', '', '', 1, '2023-02-01 10:14:14', '2023-02-20 21:43:49'),
(11, 'Up Close & Personal with Jimmy', 'up-close-personal-with-jimmy', '1676972640Up Close & Personal with Jimmy.jpg', '', '', 1, '2023-02-01 10:14:46', '2023-02-20 21:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `abp_users`
--

CREATE TABLE `abp_users` (
  `user_id` int(11) NOT NULL,
  `user_oauth_provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_picture` text COLLATE utf8_unicode_ci,
  `user_link` text COLLATE utf8_unicode_ci NOT NULL,
  `user_created` datetime NOT NULL,
  `user_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abp_users`
--

INSERT INTO `abp_users` (`user_id`, `user_oauth_provider`, `user_oauth_uid`, `user_first_name`, `user_last_name`, `user_email`, `user_gender`, `user_locale`, `user_cover`, `user_picture`, `user_link`, `user_created`, `user_modified`) VALUES
(1, 'facebook', '2118759034835723', 'Shuvadeep', 'Chakraborty', 'sv.mascarenhas.borty@gmail.com', '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2118759034835723&height=50&width=50&ext=1679932646&hash=AeRryT4Vc07jGAnIx-o', '', '2023-01-10 16:34:21', '2023-02-25 21:27:27'),
(2, 'Google', '100961193948639364255', 'Shuvadeep', 'Chakraborty', 'shuvadeep@keylines.net', '', '', '', 'https://lh3.googleusercontent.com/a/AEdFTp7rPsav9xc-Aik_m36bHN-0oVAJJUTIlurkBEP2qA=s96-c', '', '2023-01-16 13:14:11', '2023-01-19 20:11:58'),
(3, 'Google', '104354532544019405779', 'Avijit', 'Saha', 'avijit@keylines.net', '', '', '', 'https://lh3.googleusercontent.com/a/AEdFTp52PMKfG_1JQIXDMcRjZgbVkveSXcDpXTHnNMQF=s96-c', '', '2023-01-17 10:41:04', '2023-02-16 15:58:04'),
(4, 'facebook', '117776664530811', 'Linda', 'Putnamberg', 'vwkjxmdbcd_1673342794@tfbnw.net', 'female', '', '', 'https://scontent-bom1-1.xx.fbcdn.net/v/t1.30497-1/84628273_176159830277856_972693363922829312_n.jpg?stp=c15.0.50.50a_cp0_dst-jpg_p50x50&_nc_cat=1&ccb=1-7&_nc_sid=12b3be&_nc_ohc=wWcbLifIRDMAX_6cnkL&_nc_ht=scontent-bom1-1.xx&edm=AP4hL3IEAAAA&oh=00_AfA53SGZ6WGrEWvH8_QKgQd0cHidaIONKmBiQTuSKSLMsA&oe=64215F19', '', '2023-01-17 18:57:05', '2023-02-25 18:35:00'),
(5, 'Google', '100998361840162351593', 'Debojyti', 'Debroy', 'debojyti@keylines.net', '', '', '', 'https://lh3.googleusercontent.com/a/AEdFTp5f80rps3wNFTSS1vYUWScGngolwSb8tOzI7nNR=s96-c', '', '2023-01-19 16:48:16', '2023-01-19 16:50:52'),
(6, 'Google', '112669462106589968441', 'Subrata ', 'Kundu', 'info@keylines.net', '', '', '', 'https://lh3.googleusercontent.com/a/AEdFTp5_x8bo6_jHhWQfzf5xbge2RSQeEjgo8Xkoouvu=s96-c', '', '2023-01-19 21:31:35', '2023-01-19 21:31:35'),
(7, 'Google', '105095300463666802736', 'Subhomoy', 'Samanta', 'subhomoy@keylines.net', '', '', '', 'https://lh3.googleusercontent.com/a/AGNmyxaxf3ZrOFJ8EM0OQ9t4yLF_zn9kcj3GmK1WnKGs=s96-c', '', '2023-02-10 16:26:22', '2023-02-23 11:17:35'),
(8, 'Google', '102698650978130244745', 'Sanjib', 'Chatterjee/IT PROJECTS/CALCUTTA', 'sanjib.chatterjee@abp.in', '', '', '', 'https://lh3.googleusercontent.com/a/AGNmyxZUBl96ePl_GCzbFs7FSy9oY5XDID59GV_Cg65O=s96-c', '', '2023-02-23 09:59:35', '2023-02-23 09:59:35'),
(9, 'Google', '101368997163821805183', 'Debajyoti', 'Das/IT INFRASTRUCTURE & SECURITY SUPPORT/CALCUTTA', 'debajyoti.das@abp.in', '', '', '', 'https://lh3.googleusercontent.com/a/AGNmyxZYA128N4_bsKGTELjQIKbM0khCE57ml34xLltt=s96-c', '', '2023-02-23 17:14:13', '2023-02-23 17:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `abp_user_question_answer`
--

CREATE TABLE `abp_user_question_answer` (
  `answer_id` int(11) NOT NULL,
  `answer_question_id` mediumint(20) NOT NULL,
  `answer_choice_id` mediumint(20) NOT NULL,
  `anwser_choice_is_right` tinyint(1) DEFAULT NULL COMMENT '1 is correct answer , 0 is  wrong answer',
  `user_id` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  `answer_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abp_user_question_answer`
--

INSERT INTO `abp_user_question_answer` (`answer_id`, `answer_question_id`, `answer_choice_id`, `anwser_choice_is_right`, `user_id`, `published`, `answer_datetime`) VALUES
(1, 1, 1, 1, 1, 1, '2023-01-10 00:16:58'),
(4, 2, 5, 1, NULL, 1, '2023-01-16 23:50:59'),
(2, 2, 6, 0, 1, 1, '2023-01-10 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `booking_no` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` varchar(250) DEFAULT NULL,
  `booking_time` varchar(250) DEFAULT NULL,
  `booking_day` varchar(250) DEFAULT '[]',
  `booking_name` longtext,
  `booking_email` longtext,
  `booking_phone` longtext,
  `booking_company` longtext,
  `booking_designation` longtext,
  `qty` int(11) NOT NULL,
  `booking_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `discount_percent` float(10,2) NOT NULL DEFAULT '0.00',
  `discount_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `discounted_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `gst_percent` float(10,2) NOT NULL DEFAULT '0.00',
  `gst_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `grand_total` float(10,2) NOT NULL DEFAULT '0.00',
  `payment_status` tinyint(1) NOT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `txn_id` varchar(250) DEFAULT NULL,
  `payment_date_time` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('08g1jgkov427cn92qlpchl2flkbhtdfu', '103.161.92.188', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039393539313b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('1ao3ia8ueejdrjf23c0gkj4pbfc7gt7k', '193.186.4.142', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039343531383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('1k7k1r0phls652ulqsps8g2325dbj20d', '157.55.39.103', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038373332383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('40o0s1uoo58sshum7oq215fs9i66turc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313131303636383b5f63695f70726576696f75735f75726c7c733a33353a22687474703a2f2f6c6f63616c686f73742f574950532f41646d696e6973747261746f72223b),
('47r6arg3vqltikd296tj62mea84qng33', '66.249.66.198', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039333730323b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('4d5pd52aqeue32o0blk50sog40606d9n', '185.180.143.72', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038353038373b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('4hi0rvase5vjstsqd7u7grmnik7uld24', '35.192.12.177', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038333735383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('5iqoanesu7s5i6gq1udqij7ao15lrgfc', '5.188.62.21', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039343632393b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('6ju9n41538tapo5vce7sr3vho73tttet', '103.161.92.188', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039393631333b5f63695f70726576696f75735f75726c7c733a35323a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f6576656e742f696e666f636f6d2d63616c63757474612d32303232223b),
('776m2o0h1b5np7ik1qafs9iip6afnpkh', '157.55.39.103', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039363631323b5f63695f70726576696f75735f75726c7c733a33313a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f7369676e696e223b),
('95i2gkblsa27jqlo3n39trhnvhng92as', '66.249.66.202', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038323630313b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('a00n85s8qopvdrlpt398mvafrekt21ls', '193.186.4.142', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038313930373b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('b3ahmb2s2k6u9ncgaqgt9sf0odckv0e5', '162.55.232.163', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130323834343b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('bgb5dnni7dnafvvefnl2osbsk119n7u2', '5.188.62.21', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039343632343b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('c3aie0c3jk8dnaj3t79mqj5pq2390qqk', '202.164.208.226', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038343432363b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('c3uhrdtjbtuf2rm9t2jt9ckpv9uui4qi', '59.42.126.146', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039383537333b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('dlvavs8vj74nkgla0pbq81446btufovc', '118.184.177.98', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130323534333b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('do3hv6pa1vtkm56slufk32lndgaf2va0', '66.249.66.202', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039353039393b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('fuml5fns0bmn1ldemmgmth8p9k392r40', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313435303630323b5f63695f70726576696f75735f75726c7c733a34393a22687474703a2f2f6c6f63616c686f73742f574950532f61646d696e2f6d616e6167655f7374617469635f636f6e74656e74223b757365725f69647c733a313a2231223b757365725f747970657c733a323a224d41223b757365726e616d657c733a31313a226d617374657261646d696e223b656d61696c7c733a32303a226465626c696e61406b65796c696e65732e6e6574223b69735f61646d696e5f6c6f67696e7c693a313b),
('hlcv9gj4lpm2ck1os5hggh90se1bu7n5', '45.227.254.5', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039393130333b5f63695f70726576696f75735f75726c7c733a37303a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f3f663d2532464e6d52744a4f556a416475745265516a2532467363526a4b55686c6542707a6d54794f2e747874223b),
('ia4odvbv3cvc535qur475vtkntfsgpkk', '137.226.113.44', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039343730353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('j107k5bbkkelc5grna4ctib3p75otob6', '167.99.41.38', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038353536353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('ja7qs5b99nk06554lerl5ftskeq4ki2r', '61.135.159.177', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039303539303b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('jof0om5g7pa2d6bpedeftkruo7s53364', '157.50.34.241', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039363436303b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('jtimn113loatk90cj6g1hb97ogfr5708', '45.227.254.5', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039393139393b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('jvncj58dahokigmobcbaqvsb7ispmt4t', '156.227.246.63', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039373235323b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('kkr3650mli28j0pgbcicui94ltgdmota', '4.193.112.52', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039323536313b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('km4qpqocpk4fpe1i3ovv6dmvsana53si', '49.45.133.242', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038313539343b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('l8n4v4evvepngm17kra1kihv9jqs3q4v', '66.249.66.202', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039393239383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('mhiqef1tjj23b43phpts9b4lirnmg8up', '66.249.66.202', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130323837353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('mr6cp1ft0t0fmokeoalo1tloe0h9ek69', '157.55.39.28', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038373637313b5f63695f70726576696f75735f75726c7c733a33333a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f737065616b657273223b),
('msv3jgt14dnb3baibnar6qq2i50cve7d', '61.86.157.37', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039323434353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('nai7pi3lsadc4hk6nheenficntgrqd4j', '103.252.167.175', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038343939333b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('nfc553katj4d56btteutrkga81s3nd8f', '166.0.218.12', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130303232393b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('nig1fcsft7ise875og8tlpaja8h4esma', '173.252.107.14', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039363732333b),
('pj7h86bmeopiq7duksjv3ceid9htrven', '122.161.228.73', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130313332353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('q3fdvmjd24ic4aldmo3rqemihcpgb95i', '14.140.201.2', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038373331373b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('r1ttko7t99tlluqf0tlmdmga45rq77dp', '123.125.109.36', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039303735313b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('r5atdluiqgkivlbe3ca5qb9e50djp2ia', '173.252.107.11', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039363732333b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('r8ml95bmcs6ms60h86b81q0gdh9blr9o', '66.249.66.200', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039303132353b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('sb8h01nmnms2l0kfkb7fjmvvq0i45192', '128.14.134.170', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038343235383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('sf38q7mlfinre0gm2p5p46cfhsft4jn8', '106.196.26.75', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130323732393b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('slmnolg8g53jglqn53rckegjkk8b7nvr', '157.55.39.114', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038313234343b5f63695f70726576696f75735f75726c7c733a34303a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f706167652f646973636c61696d6572223b),
('slr4uqcmimt3emqc4vcql88hgc8jj22n', '54.36.149.54', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130323535383b5f63695f70726576696f75735f75726c7c733a32353a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f223b),
('spcbasotu1fvm447ac5f7tua10jadnak', '66.249.66.138', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313039373339303b5f63695f70726576696f75735f75726c7c733a34303a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f706167652f646973636c61696d6572223b),
('t0cjfo2ut5qe03ummo723769i1j6sfud', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313533343336393b5f63695f70726576696f75735f75726c7c733a34323a22687474703a2f2f6c6f63616c686f73742f4142502d504f44434153542f41646d696e6973747261746f72223b),
('tehhkap938qc0j5dfglh5q8phuh21rdp', '66.249.66.140', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038323938373b5f63695f70726576696f75735f75726c7c733a35323a2268747470733a2f2f696e646961696e666f636f6d2e636f6d2f6576656e742f696e666f636f6d2d63616c63757474612d32303232223b),
('una75bo86ngrf2mvi4h1m8shp6tedv6p', '192.3.101.140', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313130333433383b),
('vccp1s6jnuhbjlild9nibmn0dc3pfsnu', '192.3.101.140', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313637313038373632373b);

-- --------------------------------------------------------

--
-- Table structure for table `event_agenda`
--

CREATE TABLE `event_agenda` (
  `agenda_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `agenda_date` date NOT NULL,
  `agenda_day` int(11) DEFAULT NULL,
  `agenda_title` varchar(250) DEFAULT NULL,
  `agenda_venue` varchar(250) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_agenda`
--

INSERT INTO `event_agenda` (`agenda_id`, `event_id`, `agenda_date`, `agenda_day`, `agenda_title`, `agenda_venue`, `rank`, `published`, `created_at`, `updated_at`) VALUES
(3, 1, '2022-12-01', 1, 'Registration and Tea/Coffee', 'ITC Sonar, Calcutta', 1, 1, '0000-00-00', '0000-00-00'),
(4, 1, '2022-12-01', 1, 'PRE-INAUGURATION - PLENARY SESSIONS', 'ITC Sonar, Calcutta', 2, 1, '0000-00-00', '0000-00-00'),
(5, 1, '2022-12-01', 1, 'INAUGURATION OF THE CONFERENCE ', ' ITC Sonar, Calcutta', 3, 1, '0000-00-00', '0000-00-00'),
(6, 1, '2022-12-01', 1, 'STRATEGY & LEADERSHIP FORUM (PALA I, II & III)', 'ITC Sonar, Calcutta', 4, 1, '0000-00-00', '0000-00-00'),
(7, 1, '2022-12-01', 1, 'CIO/CISO CONNECT FORUM (FOYER)', 'ITC Sonar, Calcutta', 5, 1, '0000-00-00', '0000-00-00'),
(8, 1, '2022-12-02', 2, 'TECHNOLOGY FORUM (PALA I, II & III)', 'ITC Sonar, Calcutta', 6, 1, '0000-00-00', '0000-00-00'),
(9, 1, '2022-12-02', 2, 'Technology FORUM (PALA I, II & III)', 'ITC Sonar, Calcutta', 7, 1, '0000-00-00', '0000-00-00'),
(10, 1, '2022-12-02', 2, 'INFOCOM  START-UP FORUM  (FOYER) JOINTLY ORGANISED WITH  NASSCOM', 'ITC Sonar, Calcutta', 8, 1, '0000-00-00', '0000-00-00'),
(11, 1, '2022-12-03', 3, 'GOVT & HR  FORUM (PALA I, II & III)', 'ITC Sonar, Calcutta', 9, 1, '0000-00-00', '0000-00-00'),
(12, 1, '2022-12-03', 3, 'CYBER SECURITY FORUM (FOYER)', 'ITC Sonar, Calcutta', 11, 1, '0000-00-00', '0000-00-00'),
(13, 1, '2022-12-03', 3, 'INDUSTRY FORUM', 'ITC Sonar, Calcutta', 10, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `event_agenda_details`
--

CREATE TABLE `event_agenda_details` (
  `ev_ag_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `agenda_id` int(11) NOT NULL,
  `hall_number` varchar(250) DEFAULT NULL,
  `from_time` varchar(250) DEFAULT NULL,
  `to_time` varchar(250) DEFAULT NULL,
  `is_wishlist` tinyint(1) NOT NULL,
  `subject_line` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_agenda_details`
--

INSERT INTO `event_agenda_details` (`ev_ag_id`, `event_id`, `agenda_id`, `hall_number`, `from_time`, `to_time`, `is_wishlist`, `subject_line`, `created_at`, `updated_at`, `published`) VALUES
(2, 1, 3, '', '08:30', '09:30', 1, 'Registration and Tea/Coffee', '2022-11-07 12:05:40', '2022-11-07 12:05:40', 1),
(3, 1, 4, '', '09:30', '09:45', 1, 'Introductions', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 1),
(4, 1, 4, 'P1&P2', '09:45', '10:45', 1, 'Opening Keynote: Decisive Decade –India 2030\r\n\r\nKeynote Speaker: Padma Shree Kiran Karnik, Ex-President NASSCOM & Ex-Director, Central Board of Directors, RBI & Chairman, Indraprastha Institute of Information Technology\r\n\r\nInteractive Session with: Harish Agarwal, Partner, E&Y                     ', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 1),
(5, 1, 4, 'P3', '10:45', '11:05', 1, 'Theme  Keynote: The Age of Change Makers- Redefining Leadership\r\n\r\nKeynote Speaker:  Amitabh Ray, MD, Ericsson Global Services India', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 1),
(6, 1, 4, 'P4', '11:05', '11:25', 1, 'Leadership Keynote:  Run Digital Transformation at the Core of Your Business\r\n\r\nKeynote Speaker: Sunil Gupta, Co-Founder & CEO, Yotta Infrastructure', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 1),
(7, 1, 4, 'P3', '11:05', '11:25', 1, 'Leadership Keynote:  Run Digital Transformation at the Core of Your Business', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 3),
(8, 1, 4, 'P5', '11:25', '11:45', 1, 'Leadership Keynote: Scaling & Transforming Organizations\r\n\r\nKeynote Speaker: Nikesh Arora, Chairman & CEO, Palo Alto Networks\r\nInteractive Session with: Harish Agarwal, Partner, E&Y ', '2022-11-07 12:29:40', '2022-11-07 12:29:40', 1),
(9, 1, 5, '', '12:30', '12:35', 1, 'Lamp lighting', '2022-11-07 12:33:47', '2022-11-07 12:33:47', 1),
(10, 1, 5, '', '12:35', '12:40', 1, 'Welcome Address : Dhruba Mukherjee, CEO, ABP Pvt Ltd', '2022-11-07 12:33:47', '2022-11-07 12:33:47', 1),
(11, 1, 5, '', '12:40', '13:15', 1, 'Address by Guests of Honour\r\nSunil Gupta, Co-Founder & CEO, Yotta Infrastructure\r\nShailender Kumar, MD-Oracle India Pvt Ltd\r\nSharad Sanghi, MD, NTT Ltd. India & EVP- Global Data Centres & Marine Cable, NTT Ltd.\r\nPadma Shree Kiran Karnik,  Ex-President-NASSCOM , Ex-Director, Central Board of Directors, RBI & Chairman, Indraprastha Institute of Information Technology\r\nArvind Kumar, Director General, STPI', '2022-11-07 12:49:05', '2022-11-07 12:49:05', 1),
(12, 1, 5, '', '13:15', '13:30', 1, 'Address by Chief Guest:  H.E. Dr. C V Ananda Bose, Governor of West Bengal', '2022-11-07 12:49:05', '2022-11-07 12:49:05', 1),
(13, 1, 5, '', '13:30', '14:30', 1, 'Networking Lunch', '2022-11-07 12:49:05', '2022-11-07 12:49:05', 1),
(14, 1, 6, 'A1', '14:30', '15:30', 1, '\r\nSpotlight Session: The untold stories from two legendary cricketers \r\nSpotlight Speaker: Sunil Gavaskar, The Legendary Cricketer in Conversation and Gundappa Viswanath, \'a cricket connoisseur\'s dream to watch\' in conversation with Ambarish Dasgupta, Sr Partner, Intueri Consulting', '2022-11-07 13:06:19', '2022-11-07 13:06:19', 1),
(15, 1, 6, 'A2', '15:30', '16:10', 1, 'Panel Discussion: Efficiency and Sustainability in Data Centre Design or IT Infrastructure\r\n\r\nChairperson & Moderator: Sharad Sanghi, MD, NTT Ltd. India & EVP- Global Data Centres & Marine Cable, NTT Ltd.\r\n\r\nPanelists:\r\nJay Chawda, Head of Engineering, PhonePe\r\nXavier Kurian, Director- Solutions and Alliances, Dell Technologies', '2022-11-07 13:06:19', '2022-11-07 13:06:19', 1),
(16, 1, 6, 'A3', '16:10', '16:30', 1, 'Keynote:  Advancing Digital Innovation for the New India \r\nKeynote Speaker: Shailender Kumar, MD-Oracle India Pvt Ltd', '2022-11-07 13:06:19', '2022-11-07 13:06:19', 1),
(17, 1, 6, 'A4', '16:30', '17:10', 1, 'PANEL DISCUSSION: Aligning the Organization with Customer Centricity\r\n\r\nChairperson & Moderator: Raghavendra Rao, MD, Global Marketing & Communications, Accenture\r\n\r\nPanelists: \r\nVIMAL KAW, Head, Data Centre Business, NTT Ltd\r\nRajesh Ranjan, Head, Business Process Services –Everest Group\r\nNupur Sharma, Director Marketing, CrowdStrike\r\nJimmy Tangri, Head, Friends FM Radio', '2022-11-07 13:06:19', '2022-11-07 13:06:19', 1),
(18, 1, 6, 'A5', '17:10', '17:30', 1, 'Leadership Keynote:   Cyber & The changing Face of Modern Warfare\r\n\r\nKeynote Speaker: Diwakar Dayal, MD, SentinelOne', '2022-11-07 13:06:19', '2022-11-07 13:06:19', 1),
(19, 1, 6, 'A5', '17:30', '18:00', 1, 'TEA & COFFEE', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(20, 1, 6, 'A6', '18:00', '18:20', 1, 'Keynote: Leveraging Digital to grow your business\r\n\r\nKeynote Speaker: Sudipta Sen, President, TCG Digital', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(21, 1, 6, 'A7', '18:20', '19:00', 1, 'PANEL DISCUSSION:  Driving Outcomes in the Global Knowledge Economy \r\n\r\nChairperson & Moderator: Aparup Sengupta, Founder & Chairman, AAJ Global Foundation\r\nPanelists: \r\nAbhijit Guha, President , Data Consultant Corporation, USA\r\nProf (Dr)  Dhrubajyoti Chattopadhyay, Vice Chancellor, Sister Nivedita University\r\nShomik Dasgupta, Partner, PWC', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(22, 1, 6, 'A8', '19:00', '19:45', 1, 'Spotlight Session:  Surviving in the Middle of two worlds\r\nMotivational Speaker: Devdutt Pattanaik,  Mythologist, Author & Illustrator', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(23, 1, 6, 'A8', '19:45', '20:30', 1, 'STPI Award', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(24, 1, 6, 'A8', '20:30', '00:00', 1, 'Inauguration Grand Dinner', '2022-11-07 13:14:13', '2022-11-07 13:14:13', 1),
(25, 1, 7, 'F1&F2', '15:45', '16:30', 1, '\r\nPanel: Innovations in IT Service Delivery-Post Pandemic \r\n\r\nChairperson & Moderator: Samrat Banerjee, SVP & Group CIO, Emami Ltd\r\nPanelists:\r\nAtanu Roy, Group CIO, BIOCON\r\nA Shiju Rawther, CIO& CTO, SBI Mutual Fund\r\nAbhijit Chatterjee, Director-IT, TCG Life Science', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 1),
(26, 1, 7, 'F3', '16:30', '17:10', 1, 'Panel:  Accelerating Digital Transformation\r\nChairperson & Moderator:  Debasis Ghosh, MD&CEO, Data Consultants Corporation\r\n\r\nPanelists: \r\nParna Ghosh, VP & Group CIO, UNO Minda Group\r\nHarsh Jha, EVP and Head - PMO, Edelweiss Financial Services\r\nEkambaram Shanmugam, Senior Vice President,  ITC Infotech', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 1),
(27, 1, 7, 'F4', '17:10', '17:30', 1, 'Keynote:', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 1),
(28, 1, 7, 'F5', '17:30', '18:30', 1, 'CIO  Special Workshop  With High tea\r\nTopic: Defending Against Ransomware \r\n\r\nModerator:  NITIN Varma, MD-India & SAARC, CrowdStrike', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 1),
(29, 1, 7, 'F5', '17:10', '17:30', 1, 'Keynote:   DaaS , The Game Changer Calcutta', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 3),
(30, 1, 7, 'F6', '17:30', '18:30', 1, 'Panel: CIO  Special Workshop With High tea', '2022-11-07 13:23:20', '2022-11-07 13:23:20', 3),
(31, 1, 8, '', '08:30', '09:30', 1, 'Registration (only for delegates who have not registered on Day 1)', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(32, 1, 8, 'A9', '09:45', '10:50', 1, 'Power Panel: Building a Successful Organization - Creating a winning mindset.\r\n\r\nChairperson & Speaker: Bhaskar Pramanik: Ex-Chairman, Microsoft & Director SBI\r\nPanelists: \r\nKulmeet Bawa: President & MD, SAP India Sub Continent \r\nAnil Valluri: MD & Regional Vice President, Palo Alto Networks\r\nVishal Dhupar: MD Asia South, NVIDIA\r\nRajesh Rege: President, Honeywell India\r\nK P Unnikrishnan: VP-Marketing, Asia Pacific & Japan-Palo Alto Networks', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(33, 1, 8, 'A10', '10:50', '11:10', 1, 'Leadership Keynote: Leadership Tenets during Uncertainties-Business, Tech & People \r\nSpeaker: Jagdish Mahapatrta:  VP & MD, CrowdStrike, Asia', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(34, 1, 8, 'A11', '11:10', '11:30', 1, 'Keynote:  Fast Forward Digital Transformation with an Edge-to-Cloud Platform\r\nSpeaker: Ranganath Sadasiva – Chief Technology Officer – Hybrid IT, HPE India', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(35, 1, 8, 'A12', '11:30', '12:10', 1, 'CIO PANEL:  Connecting Automation to Business Challenges\r\n\r\nChairperson & Moderator: Dr Debabrata Das, Director, IIIT Bangalore\r\n	\r\nPanelists: \r\nSarajit Jha, Chief Business Transformation & Digital Solution, Tata Steel\r\nAbir Banerjee, National Business Manager, ARUBA\r\nT G Santosh, Global CDO, Switch Mobility\r\nSanjay Prasad, CIO, RPSG CESC Power Group\r\nBurra Vamsi Rama Mohan, CGM- Telecom, Powergrid Corporation of India', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(36, 1, 8, 'A13', '12:10', '12:30', 1, 'Leadership Keynote: Driving beyond  the bottom line \r\nKeynote Speaker: Prasenjit Roy,  CMO NTT Ltd India, NTT Global Data Centers & Cloud Infrastructure, APAC', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(37, 1, 8, 'A14', '12:30', '12:50', 1, 'Leadership Keynote: Leadership Keynote: The new Age Unicorns, What it takes to build an Unicorn\r\n\r\nSpeaker : Bimal Patwari , MD Pinnacle Infotech and President, Tie Kolkata', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(38, 1, 8, 'A15', '12:50', '13:10', 1, 'Leadership Keynote:  Your Data - Always Safe , Always On\r\n\r\nKeynote Speaker: Bakshish Dutta, Country Manager, India & SAARC, Druva Software', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(39, 1, 8, 'A16', '13:10', '13:30', 1, 'Leadership Keynote:  Your Data - Always Safe , Always On\r\n\r\nKeynote Speaker: Bakshish Dutta, Country Manager, India & SAARC, Druva Software\r\nKeynote:  \'Leading in a Digital First World through Secure Network Transformation\'\r\nSpeaker:  Soubhanick Routh, Regional Head, Tata Communications', '2022-11-08 05:46:54', '2022-11-08 05:46:54', 1),
(40, 1, 9, 'A17', '14:30', '15:15', 1, 'Keynote : Anuvab Pal,  Indian standup comedian, screenwriter, playwright and novelist', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(41, 1, 9, 'A18', '15:15', '15:45', 1, 'Fireside  Chat : Topic: Building Leaders of Tomorrow\r\nSpeakers Sunil Gupta, Co-Founder & CEO, Yotta Infrastructure and Harshvardhan Neotia, Chairman, Ambuja Group in conversation with Jaydeep DuttaGupta, Sr Director, Deloitte', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(42, 1, 9, 'A19', '15:45', '16:05', 1, 'Leadership Keynote:  Emerging Technologies in Public Services\r\nKeynote Speaker: Debashish Sen, IAS, MD-HIDCO & Chairman, Newtown Development Authority', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(43, 1, 9, 'A20', '16:05', '16:45', 1, 'CIO PANEL: Delivering a super customer experience \r\n\r\nChairperson & Moderator:    Harish Agarwal, Partner –EY\r\n\r\nPanelists: \r\nSuresh Vijayaraghavan, CIO, The Hindu Group\r\nSarbani Bhatia, CIO, Jagran Media\r\nAtanu Pramanik, CIO & Joint President, Hindalco\r\nShankarsan Banerjee, CIO, RBL\r\nNihar Chakraborty, EVP & COO-SAARC Region, Sify Technologies Limited', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(44, 1, 9, 'A20', '16:45', '17:15', 1, 'Tea & Coffee', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(45, 1, 9, 'A21', '17:15', '17:35', 1, 'CIO Keynote:  Winning with Data & AI\r\nSpeaker: V V Rajasekhar, Group CIO, ITC Ltd', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(46, 1, 9, 'A22', '17:35', '18:10', 1, 'Power Panel: Eat Clean, Burn it Right-Mantra to Healthy Living\r\nModerator:   Ushoshi Sengupta, Indian Beauty Pageant  Contestant \r\nSpeakers: \r\nRanadeep Moitra, Fitness Expert\r\nBalpreet Singh Chadha, Executive Chef, The Park Hotel', '2022-11-08 06:12:45', '2022-11-08 06:12:45', 1),
(47, 1, 9, 'A23', '18:10', '18:30', 1, 'Fireside Chat  : Building Loyalty with experience\r\n\r\nSpeaker:  Sanjay Purohit, Group CEO-Sapphire Foods Partner  (virtually)in conversation with Sanjay Hiranandani , CEO, DOT1', '2022-11-08 06:15:26', '2022-11-08 06:15:26', 1),
(48, 1, 9, 'A22', '18:30', '19:10', 1, 'Power Panel : :  The Amazon, EdTech, SmartHome  & Agritech –Quadfecta saviours  of Human Life', '2022-11-08 06:15:26', '2022-11-08 06:15:26', 3),
(49, 1, 9, '', '19:10', '20:00', 1, 'CIO Award Evening:  Life Time Achievement Award ', '2022-11-08 06:15:26', '2022-11-08 06:15:26', 3),
(50, 1, 10, 'F6', '15:30', '16:00', 1, 'Start-Up Forum :\r\nKey Note Speaker: Kritika M, Senior Director, 10000 start-ups & Products  , NASSCOM', '2022-11-08 06:36:24', '2022-11-08 06:36:24', 1),
(51, 1, 10, 'F7', '16:00', '16:15', 1, 'Bengal’s Delicacies: Bharat’s Delights\r\nA short video clip (3-4 minutes) on Investors,\r\nStardom, Corporates who have taken interest\r\nin startups of West Bengal in 2022', '2022-11-08 06:36:24', '2022-11-08 06:36:24', 1),
(52, 1, 10, 'F8', '16:15', '17:00', 1, 'Brand Building for Startups\r\nWorkshop: \r\nKaushik Bhattacharya, Ranjhiya Digital and Nirupam Chaudhuri, Director-NASSCOM', '2022-11-08 06:36:24', '2022-11-08 06:36:24', 1),
(53, 1, 10, 'S1', '16:30', '17:30', 1, 'Special CIO Session  with High Tea (Invitation Only) \r\nPost-Pandemic Cyber security \r\nLandscape - What should executives do to prepare', '2022-11-08 06:36:24', '2022-11-08 06:36:24', 1),
(54, 1, 11, '', '08:30', '10:00', 1, 'Registration (only for delegates who have not registered on Day 1 & 2)', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(55, 1, 11, 'A25', '10:00', '10:15', 1, 'Opening Addresses:\r\nRaosaheb Kangane, Sr Vice President-Human Resource, Kotak Mahindra Bank & President –HRFI\r\nSamit Roy : Chancellor, Adamas University', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(56, 1, 11, 'A26', '10:15', '11:00', 1, 'Panel: Innovation through Talent: How does India build the skill base to become Tech Superpower\r\n\r\nChairperson & Moderator: Tanmoy Chakraborty,  Ex-Group Govt Affair Officer-Tata Sons\r\nPanelists: \r\nDr Naveen Das , Vice Chancellor, Adamas University\r\nDr Prasad Meduri, MD, Odgers Berndtson India\r\nS Janardhan, VP & CLO/Global Head – Talent Development ', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(57, 1, 11, 'A27', '11:00', '11:30', 1, 'Keynote Topic : Identifying opportunity in a reshaped market\r\nKeynote Speaker: : Harjit Khanduja, SVP HR, Reliance Jio', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(58, 1, 11, 'A28', '11:30', '23:50', 1, 'Keynote  Topic: Fostering Employee wellbeing  and avoiding burnout\r\nKeynote Speaker: Gautam Ray , ED HR and Admin, Cesc ltd', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(59, 1, 11, 'A29', '23:50', '12:30', 1, 'Panel:  New waves of Attrition: Understanding the employee mindset \r\nChairperson & Moderator: Sahil Nayar, Sr Associate Director, KPMG\r\nPanelists:\r\nRanjan Banerjee, CHRO, Berger Paints\r\nRaminder Labana, Asst. Director HR, EY\r\nAvijit Laha, Head HR Business Unit, TCS', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(60, 1, 11, 'A30', '12:30', '13:30', 1, 'Panel:  Optimizing technology initiatives for Employee Experience\r\nChairperson & Moderator:  \r\nPanelists:\r\nAnkita Rudra, Head HR, Reliance Jio HR Academy\r\nDhrubjyoti Majumdar, Regional HR Head, Larsen & Toubro Ltd\r\nPallab Datta, HR Head, Securens Systems', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(61, 1, 11, '', '13:30', '14:30', 1, 'TOURISM  TRACK', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(62, 1, 11, 'A30', '13:30', '14:30', 1, 'Networking Lunch', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 1),
(63, 1, 11, 'A28', '15:00', '15:30', 1, 'Tourism Showcase:  Govt of Rajasthan\r\n\r\nKeynote Speakers:\r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(64, 1, 11, 'A29', '15:30', '16:00', 1, 'Tourism Showcase:  Govt of  Bihar\r\n\r\nKeynote Speakers:\r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(65, 1, 11, 'A30', '16:00', '16:20', 1, 'Keynote:  Govt Of Chattishgarh\r\n\r\nKeynote Speaker:  \r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(66, 1, 11, 'A31', '16:20', '16:50', 1, 'Keynote: Future of Healthcare- Intervention Through  AI\r\n\r\nKeynote Speaker:\r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(67, 1, 11, '', '16:50', '17:15', 1, 'Tea & Coffee', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(68, 1, 11, 'A32', '17:15', '18:15', 1, 'Spotlight Session: Change your life with Wisdom \r\n\r\nIntroduction by: \r\n\r\nKeynote Speaker:*', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(69, 1, 11, 'A33', '18:15', '19:15', 1, 'Spotlight Session:  From Odishi Dancer to Khandala Girl\r\n\r\nSpotlight Speaker: \r\n\r\nIn Conversation with: \r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(70, 1, 11, 'A34', '19:15', '19:35', 1, 'Valedictory Session: \r\n\r\nKeynote Speaker: \r\n', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(71, 1, 11, '', '19:35', '', 1, 'Cocktails and Gala Dinner', '2022-11-08 06:52:26', '2022-11-08 06:52:26', 3),
(72, 1, 12, '', '08:00', '09:30', 1, 'Registration over Tea & Coffee ', '2022-11-08 06:57:41', '2022-11-08 06:57:41', 1),
(73, 1, 12, 'F10', '10:15', '11:00', 1, 'Panel: Human Factor in Cybersecurity\r\n \r\nChairperson & Moderator: Anant Bhat, Associate Vice President, Cybalt Inc.\r\nPanelists:\r\nDr Ijazul Haque, CTO, Commercial Bank of Cylone\r\nNirupam Sen, Regional Head, BSI\r\nV Sendil, CIO, Shriram Group\r\nKoushik Nath, CISO, ITC Ltd', '2022-11-08 06:57:41', '2022-11-08 06:57:41', 1),
(74, 1, 12, 'F11', '11:00', '11:40', 1, 'Panel: Work from Anywhere- Secure from Anywhere?\r\n \r\nChairperson & Moderator: Harish Menon, CEO, Accops Systems Pvt Ltd\r\nPanelists: \r\nMaya Nair, CISO, CRISIL\r\nAnuj Tewari , CISO, TMF Group\r\nMeetali Sharma, Head - Risk, Compliance & Information Security, SDG Software\r\nGoutam Datta, CIO, Bajaj Alliance', '2022-11-08 06:57:41', '2022-11-08 06:57:41', 1),
(75, 1, 12, 'F12', '11:40', '12:10', 1, 'Keynote Address: Cyber Intelligence:  Driving NexGen Cyber Security Solutions\r\n\r\nKeynote Speaker: Himangshu Dubey, Sr Director, Engineering, Security Labs, Seqrite', '2022-11-08 06:57:41', '2022-11-08 06:57:41', 1),
(76, 1, 12, 'F13', '12:10', '12:30', 1, 'Keynote Address: Empowering the citizens to be safer and more secure online.\r\nKeynote Speaker: Sanjay Kr Das, Joint Secretary, Dept. of IT&E,  Govt. of West Bengal', '2022-11-08 06:57:41', '2022-11-08 06:57:41', 1),
(77, 1, 8, 'A16', '13:30', '14:30', 1, 'Networking Lunch', '2022-11-20 06:17:44', '2022-11-20 06:17:44', 1),
(78, 1, 8, 'A16', '13:30', '13:40', 1, 'Networking Lunch', '2022-11-20 06:17:44', '2022-11-20 06:17:44', 3),
(79, 1, 9, 'A24', '18:30', '20:00', 1, 'CIO Award Evening', '2022-11-20 06:25:31', '2022-11-20 06:25:31', 1),
(80, 1, 13, 'A31', '14:30', '15:00', 1, 'Tourism: Decoding Tourism Futures : Opportunities in Bengal', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(81, 1, 13, 'A32', '15:00', '15:30', 1, 'Keynote:  Reforms in Power Sector \r\n\r\nKeynote Speaker: Aroop Biswas, Ministry of Sports and Youth Affairs, Power & Non-Conventional Energy, Govt of West Bengal', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(82, 1, 13, 'A33', '15:30', '16:00', 1, 'Keynote :Growth of Sector V\r\n\r\nKeynote Speaker: S Radhakrishnan, Executive Director & President , Infinity Group', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(83, 1, 13, 'A34', '16:00', '16:20', 1, 'Keynote: Smart Cities, Bringing Fundamental Improvements \r\n\r\nKeynote Speaker:  Firhad Hakim, Mayor of Kolkata, Ministry of Urban Development and Municipal Affairs and Housing, Govt of West Bengal', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(84, 1, 13, 'A35', '16:20', '16:50', 1, 'Keynote:  Opportunities in Bengal\r\nKeynote Speakers: Babul Supriyo, Ministry of IT & Tourism, Govt of West Bengal', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(85, 1, 13, 'A35', '16:50', '17:30', 1, 'Tea & Coffee', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(86, 1, 13, 'A36', '17:30', '18:30', 1, 'Spotlight Session: Building of A Nation\r\nIntroduction by: \r\n\r\nKeynote Speaker: Sadhguru , Yogi Mystic & Visionary in conversation with Sunil Gupta, Co-Founder & CEO, Yotta Infrastructure\r\nand Ravindra Chamaria , Chairman & MD , Infinity Group\r\n\r\nModerator : Dhruba Mukherjee, CEO, ABP Pvt Ltd', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(87, 1, 13, 'A36', '18:30', '', 1, 'Closing with National Anthem', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(88, 1, 13, 'A36', '19:30', '', 1, 'Cocktails and Gala Dinner', '2022-11-20 06:40:56', '2022-11-20 06:40:56', 3),
(89, 1, 9, 'A24', '20:00', '', 1, 'CIO Dinner', '2022-11-21 06:46:47', '2022-11-21 06:46:47', 1),
(90, 1, 10, 'F9', '17:00', '18:00', 1, 'Panel: Win Customer as a Start-up provider\r\nChairperson: Nirupam Chaudhuri, Director, NASSCOM\r\n \r\nNavaneethan M, Sr VP & CISO, GROWW\r\nDebashish Roy, VP-IT, RPSG Ventures\r\nPartha Pratim Mondal, CIO, Berger Paints\r\nKumar P Saha, Founder, NDHGO', '2022-11-26 07:42:10', '2022-11-26 07:42:10', 1),
(91, 1, 12, 'F14', '12:30', '13:10', 1, 'Panel: : Cyber Immunity- A New Approach to Cyber Security\r\n \r\nChairperson & Moderator: Sushobhan Mukherjee, CEO, Prime Infoserv\r\nPanelists:\r\nPrateek Bhajanka, Technology Strategist, SentinelOne\r\nNavaneethan,  SVP & CISO, Groww\r\nSandeep Sengupta, Founder & Director, ISOAH\r\nDr Mukesh Mehta, Group CTO & CISO, Monarch Network Capital\r\nSomak Shome, General Manager Digital Security, Mindtree', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(92, 1, 12, 'F14', '13:30', '14:30', 1, 'Networking Lunch', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(93, 1, 12, 'F15', '14:30', '15:30', 1, 'Xtreme hacking And exposing Darkweb \r\nModerate:  Sandeep Sengupta, Founder & Director, ISOAH', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(94, 1, 12, 'F16', '15:30', '16:15', 1, 'Panel: The future of Cyber Crime, Privacy, Legal and Forensics\r\n \r\nChairperson & Moderator: Sandeep Sengupta, Founder & Director, ISOAH\r\n\r\nPanelists:\r\nSanjay Kr Das, Joint Secretary, Dept of IT&E,  Govt of West Bengal\r\nH K Kusumakar, IPS , Addl Commissioner of Police (eGov)\r\nTashi Gyanee , Lawyer , Data Protection & Privacy (Khaitan & Co)\r\nAvelo Roy, Founder, Kolkata Ventures', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(95, 1, 12, 'F17', '16:15', '17:00', 1, 'Game - Catch the Hacker \r\nModerate:  Sandeep Sengupta, Founder & Director, ISOAH', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(96, 1, 12, 'F17', '17:00', '17:30', 1, 'Tea & Coffee', '2022-11-26 07:53:11', '2022-11-26 07:53:11', 1),
(97, 1, 13, 'A31', '14:30', '15:00', 1, '', '2022-12-01 15:33:28', '2022-12-01 15:33:28', 1),
(98, 1, 13, 'A32', '15:00', '15:30', 1, 'Keynote:  Reforms in Power Sector \r\n\r\nKeynote Speaker: Aroop Biswas, Ministry of Sports and Youth Affairs, Power & Non-Conventional Energy, Govt of West Bengal', '2022-12-01 15:33:28', '2022-12-01 15:33:28', 1),
(99, 1, 13, 'A33', '15:30', '16:00', 1, 'Keynote :Growth of Sector V\r\n\r\nKeynote Speaker: S Radhakrishnan, Executive Director & President , Infinity Group', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(100, 1, 13, 'A34', '16:00', '16:20', 1, 'Keynote: Smart Cities, Bringing Fundamental Improvements \r\n\r\nKeynote Speaker:  Firhad Hakim, Mayor of Kolkata, Ministry of Urban Development and Municipal Affairs and Housing, Govt of West Bengal', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(101, 1, 13, 'A35', '16:20', '16:50', 1, 'Keynote:  Opportunities in Bengal\r\nKeynote Speakers: Babul Supriyo, Ministry of IT & Tourism, Govt of West Bengal', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(102, 1, 13, 'A35', '16:50', '17:30', 1, 'Tea & Coffee', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(103, 1, 13, 'A36', '17:30', '18:30', 1, 'Spotlight Session: Building of A Nation\r\nIntroduction by: \r\n\r\nKeynote Speaker: Sadhguru , Yogi Mystic & Visionary in conversation with Sunil Gupta, Co-Founder & CEO, Yotta Infrastructure\r\nand Ravindra Chamaria , Chairman & MD , Infinity Group\r\n\r\nModerator : Dhruba Mukherjee, CEO, ABP Pvt Ltd', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(104, 1, 13, 'A36', '18:30', '', 1, 'Closing with National Anthem', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1),
(105, 1, 13, 'A36', '19:30', '', 1, 'Cocktails and Gala Dinner', '2022-12-01 15:38:49', '2022-12-01 15:38:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `published`, `created_at`, `updated_at`) VALUES
(1, 'FLAGSHIP EVENT', 1, '2022-10-10 08:25:55', '2022-10-10 08:25:55'),
(2, 'ROUND TABLE', 1, '2022-10-10 08:26:04', '2022-10-10 08:26:04'),
(3, 'INDUSTRY VIRTUAL SESSIONS', 1, '2022-10-10 08:26:20', '2022-10-09 20:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_image` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_zones`
--

CREATE TABLE `event_zones` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` longtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_zones`
--

INSERT INTO `event_zones` (`id`, `name`, `email`, `phone`, `address`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Zone 1', 'zone1@test.com', '9876543210', 'zone 1 address', 1, '2022-12-19 12:40:00', '2022-12-19 00:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `image_title` varchar(250) DEFAULT NULL,
  `image_file` varchar(250) DEFAULT NULL,
  `image_description` longtext,
  `is_home_page` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `name`, `published`, `created_at`, `updated_at`) VALUES
(1, 'COORDINATOR', 1, '2022-12-19 12:52:07', '2022-12-19 12:52:07'),
(2, 'RFC MEMBER', 1, '2022-12-19 12:52:25', '2022-12-19 12:52:25'),
(3, 'EXECUTIVE COMMITTEE MEMBER', 1, '2022-12-19 12:52:41', '2022-12-19 12:52:41'),
(4, 'LIFE MEMBER', 1, '2022-12-19 12:52:58', '2022-12-19 12:52:58'),
(5, 'RETIRED LIFE MEMBER', 1, '2022-12-19 12:53:18', '2022-12-19 12:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `package_plans`
--

CREATE TABLE `package_plans` (
  `id` int(11) NOT NULL,
  `package_name` varchar(250) DEFAULT NULL,
  `package_price` float(10,2) NOT NULL DEFAULT '0.00',
  `start_date` varchar(250) DEFAULT NULL,
  `end_date` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_plans`
--

INSERT INTO `package_plans` (`id`, `package_name`, `package_price`, `start_date`, `end_date`, `created_at`, `updated_at`, `published`) VALUES
(1, 'DAY 1', 8000.00, '2022-12-01', '2022-12-01', '2022-11-05 13:11:20', '2022-11-05 13:11:20', 1),
(2, 'DAY 2', 8000.00, '2022-12-02', '2022-12-02', '2022-11-05 13:11:41', '2022-11-05 13:11:41', 1),
(3, 'DAY 3', 8000.00, '2022-12-03', '2022-12-03', '2022-11-05 13:11:54', '2022-11-05 13:11:54', 1),
(4, 'ALL THREE DAYS', 18000.00, '2022-12-01', '2022-12-03', '2022-11-05 13:12:14', '2022-11-18 07:37:03', 1),
(5, 'Hackstars', 2000.00, '2022-12-01', '2022-12-03', '2022-11-15 05:23:17', '2022-11-15 05:23:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `slug`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT ABP', 'about-abp', '1667818299event-banner.jpg', 1, '2022-11-05 13:21:15', '2022-11-06 22:51:39'),
(2, 'ABOUT INFOCOM', 'about-infocom', '1667818292event-banner.jpg', 1, '2022-11-05 13:21:24', '2022-11-06 22:51:33'),
(3, 'DISCLAIMER', 'disclaimer', '1667818286event-banner.jpg', 1, '2022-11-05 13:21:34', '2022-11-06 22:51:26'),
(4, 'VIDEO GALLERY', 'video-gallery', '1667896442event-banner.jpg', 1, '2022-11-08 08:34:02', '2022-11-08 08:34:02'),
(5, 'EVENT CATEGORY', 'event-category', '1667896442event-banner.jpg', 1, '2022-11-08 08:34:02', '2022-11-08 08:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `sms_advertisment`
--

CREATE TABLE `sms_advertisment` (
  `id` int(11) NOT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `advertisment_image` varchar(250) DEFAULT NULL,
  `position` enum('Header','Right-side','Body') DEFAULT NULL,
  `orientation` enum('horizontal','vertical') DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_advertisment`
--

INSERT INTO `sms_advertisment` (`id`, `heading`, `advertisment_image`, `position`, `orientation`, `url_link`, `published`, `created_at`, `updated_at`) VALUES
(2, 'ABP', '1676880994300x250.jpg', 'Right-side', 'horizontal', 'https://abp-podcast.keylines.in/', 1, '2023-01-10 05:22:24', '2023-02-19 20:16:34'),
(3, 'ABP', '1676879683300x250.jpg', 'Body', 'horizontal', 'https://abp-podcast.keylines.in/', 1, '2023-01-10 05:22:44', '2023-02-19 19:54:43'),
(4, 'Lloyd', '1673328195vertical-img.png', 'Right-side', 'vertical', 'https://www.mylloyd.com/', 3, '2023-01-10 05:23:15', '2023-02-12 22:52:03'),
(5, 'ABP', '1677306553test.svg', 'Header', 'horizontal', 'https://abp-podcast.keylines.in/<script>alert(0)</script>', 0, '2023-01-18 06:39:32', '2023-02-25 06:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `sms_banners`
--

CREATE TABLE `sms_banners` (
  `id` int(11) NOT NULL,
  `small_text` varchar(250) DEFAULT NULL,
  `big_text` varchar(250) DEFAULT NULL,
  `banner_image` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms_contact_enquiry`
--

CREATE TABLE `sms_contact_enquiry` (
  `id` int(11) NOT NULL,
  `enquiry_type` enum('ENQUIRY','FEEDBACK') NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `organisation` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `contact_person` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `comment` longtext,
  `special_enquiry` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms_email_template`
--

CREATE TABLE `sms_email_template` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `description` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_email_template`
--

INSERT INTO `sms_email_template` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `published`) VALUES
(1, 'Forgot Password', 'forgot-password', '<p>Hi {{username}},</p>\r\n\r\n<p>Please find below the login credentials</p>\r\n\r\n<p>Username : masteradmin</p>\r\n\r\n<p>Password : {{password}}</p>\r\n', '2022-05-20 20:25:00', '2022-05-20 20:25:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_events`
--

CREATE TABLE `sms_events` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `event_date` varchar(250) DEFAULT NULL,
  `event_venue` varchar(250) DEFAULT NULL,
  `event_theme` varchar(250) DEFAULT NULL,
  `overview_description` longtext,
  `conference_desscription` longtext,
  `event_banner` varchar(250) DEFAULT NULL,
  `event_images` longtext,
  `post_by` varchar(250) DEFAULT 'MSK ADMIN',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_events`
--

INSERT INTO `sms_events` (`id`, `category_id`, `title`, `slug`, `event_date`, `event_venue`, `event_theme`, `overview_description`, `conference_desscription`, `event_banner`, `event_images`, `post_by`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'INFOCOM CALCUTTA 2022', 'infocom-calcutta-2022', 'December 1-3, 2022', ' ITC Sonar, Calcutta', 'The Age of Change Makers', '<h3><span style=\"color:#3498db\">INTRODUCTION</span></h3>\n\n<p>INFOCOM is ABP Group&rsquo;s&nbsp;<strong>Business-Technology-Leadership Events</strong>&nbsp;division that hosts world class conferences, exhibitions, workshops, roundtables and awards across the year across various States in India and also in international locations like Bangladesh and other SAARC countries.</p>\n\n<p>INFOCOM was initiated as the group&rsquo;s premier flagship event in 2002 and now after&nbsp;<strong>20 years</strong>, INFOCOM hosts a series of these B2B events for technology leaders, functional professionals, industry specialists, entrepreneurs and strategists in various formats.</p>\n\n<p>Our events stand on the&nbsp;<strong>three unique pillars of Business, Technology and Leadership</strong>&nbsp;which is the magical combo for driving sustainable growth and success in changing times.</p>\n\n<p>The annual flagship event, INFOCOM Calcutta comprises a three-day Conference and hosts one of the largest congregations of technology professionals, buyers-sellers, corporate leaders, academics, visionaries, and policymakers from India and beyond.</p>\n\n<h3><span style=\"color:#3498db\">THEME: THE AGE OF CHANGE MAKERS</span></h3>\n\n<p>We are in an extraordinary time. Over the last two years of uncertainty, businesses had to respond almost instantaneously &mdash; shifting employees to remote work, repairing broken supply chains, and keeping pace with dramatically fluctuating customer demand. Business leaders were forced to adapt to a confluence of multiple disruptions inextricably linked to a longer-term, ongoing digital disruption and innovation.</p>\n\n<p>Given the present background of the world, we have chosen the theme for our event for this year as&nbsp;<strong>&quot;The Age of Change Makers&quot;</strong>&nbsp;where we would bring the spotlight on the leaders, products and solutions breaking new grounds, challenging the status quo, and soaring to new heights in an uncertain and unchartered territory.</p>\n\n<h3><span style=\"color:#3498db\">THE ORGANISER</span></h3>\n\n<p><img alt=\"\" src=\"https://www.indiainfocom.com/material/front/assets/images/abp.jpg\" /></p>\n\n<p>In 1922, Anandabazar Patrika first came out as a four-page evening daily that sold at two paise and had a circulation of about 1,000 copies a day. Hundred years later, Anandabazar Patrika reaches out to more than 10 million readers. Today, the ABP Group has evolved into a media conglomerate that has eight renowned publications, six TV news channels, digital news and current affairs platforms in eight languages, mobile internet and social media platforms, one radio station, a leading book publishing business, an education business and a film production and OTT platform. Started as a regional media house, ABP Group today has established a strong national footprint across the country touching the lives of millions of readers and viewers, daily.</p>\n', '<h3><span style=\"color:#3498db\">HIGHLIGHTS</span></h3>\n\n<ul class=\"conference\">\n	<li>Over&nbsp;<strong>50 sessions</strong>&nbsp;in 3 days of conference</li>\n	<li>Keynote addresses, Plenary sessions, Panel Discussions and Focus Forums on specific areas revolving around the theme: THE AGE OF CHANGE MAKERS</li>\n	<li><strong>Focus Areas:</strong>&nbsp;Strategy &amp; Leadership Forum, Technology Forum, Industry &amp; SME Forum, State &amp; Country Forum, CIO Connect &amp; Security Forum</li>\n	<li>Special&nbsp;<strong>Spotlight Sessions</strong>&nbsp;with celebrity speakers</li>\n	<li><strong>CIO Change Maker Awards 2022</strong></li>\n	<li><strong>INFOCOM State &amp; Country Forum</strong>&nbsp;featuring different States of India and some of the countries and their investment offerings and tourism offerings for the B2B audience</li>\n	<li>Over 1200 delegates from large corporates, SMEs, policymakers, academia and media</li>\n	<li>Participation from over 250 top CIOs/CISOs from across the SAARC nations:\n	<ul class=\"nested-conference\">\n		<li>150 CIOs/CISOs from Calcutta</li>\n		<li>50 CIOs/CISOs from rest of India</li>\n		<li>50 CIOs/CISOs from Bangladesh, Sri Lanka, Bhutan, Nepal</li>\n	</ul>\n	</li>\n	<li>Over 100 speakers from amongst well-known industry leaders, ICT experts and gurus, top corporates, think tanks, entrepreneurs, government officials and academia from across the world</li>\n	<li>Attended by top executives &amp; decision makers of IT and user industry as well as bureaucrats and the academic community</li>\n	<li>A variety of unique networking events including Peer-to-Peer Groups, Networking Lunches/Dinners and Awards on all three days of the Conference</li>\n</ul>\n\n<h3><span style=\"color:#3498db\">FOCUS AREAS OF THE CONFERENCE</span></h3>\n\n<ul class=\"conference\">\n	<li>Strategy &amp; Leadership</li>\n	<li>Digital Transformation</li>\n	<li>AI, IoT and Blockchain</li>\n	<li>Innovation &amp; Technology</li>\n	<li>Cyber Security</li>\n	<li>CXO Success Stories</li>\n	<li>Smart Homes and Digital Health</li>\n	<li>Startup and Entrepreneurship</li>\n	<li>State and Tourism</li>\n</ul>\n\n<h3><span style=\"color:#3498db\">DELEGATE PROFILE (1200 NOS)</span></h3>\n\n<p>Meet the Influencers, Entrepreneurs, and Enthusiasts who will all be there at INFOCOM 2022</p>\n\n<ul class=\"conference\">\n	<li>Business strategists, ICT and ITES professional: CIOs, CFOs, CTOs, CHROs and key decision-makers in any organization</li>\n	<li>Business executives: marketing professionals and those who influence the implementation of enterprise strategies</li>\n	<li>Senior Central and State Government officials including Municipal heads</li>\n	<li>Analysts and consultants: marketing and financial analysts, strategy &amp; technology analysts</li>\n	<li>Venture capitalists/fund managers/investment bankers</li>\n	<li>Software developers and programmers</li>\n	<li>Overseas trade delegations</li>\n	<li>Industry Influencers: IT bodies and Media</li>\n	<li>Academia</li>\n</ul>\n\n<h3><span style=\"color:#3498db\">THE DELEGATE PROFILE (LAST EDITION)</span></h3>\n\n<p><img alt=\"\" src=\"https://www.indiainfocom.com/material/front/assets/images/abp.jpg\" /></p>\n', '1665491636event_banner_632480eb80eb2.png', NULL, 'MSK ADMIN', 1, '2022-10-11 12:33:56', '2022-10-11 00:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `sms_images`
--

CREATE TABLE `sms_images` (
  `id` int(11) NOT NULL,
  `image_file` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_login_log`
--

CREATE TABLE `sms_login_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `last_browser_used` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_notification_list`
--

CREATE TABLE `sms_notification_list` (
  `notification_id` int(11) NOT NULL,
  `notification_access` int(11) NOT NULL COMMENT '1=Admin,2=Provider,3=Customer',
  `user_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `created_at` varchar(250) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms_poll`
--

CREATE TABLE `sms_poll` (
  `id` int(11) NOT NULL,
  `poll_title` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_poll`
--

INSERT INTO `sms_poll` (`id`, `poll_title`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Did You Enjoy Our Previous Content?', 1, '2022-12-26 23:46:31', '2022-12-27 12:36:07'),
(3, 'Who\'s the funniest comedian?', 0, '2022-12-29 03:43:12', '2023-02-23 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `sms_poll_option`
--

CREATE TABLE `sms_poll_option` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `poll_option` varchar(255) NOT NULL,
  `published` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_poll_option`
--

INSERT INTO `sms_poll_option` (`id`, `poll_id`, `poll_option`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yes', 1, '2022-12-27 11:46:31', '2022-12-27 11:46:31'),
(2, 1, 'No', 1, '2022-12-27 11:46:31', '2022-12-27 11:46:31'),
(11, 3, 'Johnny Lever', 1, '2022-12-29 15:43:12', '2022-12-29 15:43:12'),
(12, 3, 'Kapil Sharma', 1, '2022-12-29 15:43:12', '2022-12-29 15:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `sms_poll_tracking`
--

CREATE TABLE `sms_poll_tracking` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `poll_option_id` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_poll_tracking`
--

INSERT INTO `sms_poll_tracking` (`id`, `poll_id`, `poll_option_id`, `userId`, `published`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 5, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(3, 1, 1, 251, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(4, 1, 1, 252, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(5, 3, 12, 252, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(6, 3, 11, 5, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(7, 3, 11, 251, 1, '2022-12-29 11:28:22', '2022-12-29 11:28:22'),
(20, 1, 1, 1, 1, '2023-02-23 06:44:47', '2023-02-23 06:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `sms_site_settings`
--

CREATE TABLE `sms_site_settings` (
  `site_id` int(11) NOT NULL,
  `site_name` longtext NOT NULL,
  `site_description` longtext NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_footer_logo` varchar(250) DEFAULT NULL,
  `site_favicon` varchar(250) NOT NULL,
  `jwplayer_site_id` varchar(250) DEFAULT NULL,
  `jwplayer_player_id` varchar(250) DEFAULT NULL,
  `jwplayer_auth_id` varchar(255) DEFAULT NULL,
  `site_email` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `site_address` text NOT NULL,
  `site_phone` varchar(250) NOT NULL,
  `whatsapp_no` varchar(250) NOT NULL,
  `site_state_code` varchar(250) NOT NULL,
  `site_gstn` varchar(250) NOT NULL,
  `site_pan` varchar(250) NOT NULL,
  `facebook_link` varchar(250) NOT NULL,
  `twitter_link` varchar(250) NOT NULL,
  `linkedin_link` varchar(250) NOT NULL,
  `instagram_link` varchar(250) NOT NULL,
  `youtube_link` varchar(250) NOT NULL,
  `pinterest_link` varchar(250) DEFAULT NULL,
  `establish_year` int(11) NOT NULL,
  `about_us` longtext NOT NULL,
  `payment_gateway_mode` enum('SANDBOX','LIVE') DEFAULT NULL,
  `sandbox_secret_key` varchar(250) DEFAULT NULL,
  `sandbox_publishable_key` varchar(250) DEFAULT NULL,
  `live_secret_key` varchar(250) DEFAULT NULL,
  `live_publishable_key` varchar(250) DEFAULT NULL,
  `authentication_key` varchar(250) DEFAULT NULL,
  `sender_id` varchar(250) DEFAULT NULL,
  `base_url` varchar(250) DEFAULT NULL,
  `from_email` varchar(250) DEFAULT NULL,
  `from_name` varchar(250) DEFAULT NULL,
  `smtp_host` varchar(250) DEFAULT NULL,
  `smtp_username` varchar(250) DEFAULT NULL,
  `smtp_password` varchar(250) DEFAULT NULL,
  `smtp_port` varchar(250) DEFAULT NULL,
  `created` varchar(250) NOT NULL,
  `modified` varchar(250) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `access_app` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_site_settings`
--

INSERT INTO `sms_site_settings` (`site_id`, `site_name`, `site_description`, `site_logo`, `site_footer_logo`, `site_favicon`, `jwplayer_site_id`, `jwplayer_player_id`, `jwplayer_auth_id`, `site_email`, `admin_email`, `site_address`, `site_phone`, `whatsapp_no`, `site_state_code`, `site_gstn`, `site_pan`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `pinterest_link`, `establish_year`, `about_us`, `payment_gateway_mode`, `sandbox_secret_key`, `sandbox_publishable_key`, `live_secret_key`, `live_publishable_key`, `authentication_key`, `sender_id`, `base_url`, `from_email`, `from_name`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `created`, `modified`, `published`, `access_app`) VALUES
(1, 'ABP PODCAST', 'Test', '1672119723WhatsApp Image 2022-12-27 at 11.06.49 AM.jpeg', '1672119723WhatsApp Image 2022-12-27 at 11.06.49 AM.jpeg', '1672119723WhatsApp Image 2022-12-27 at 11.06.49 AM.jpeg', 'HclNGOiH', 'c1QdRr9B', 'HENdGELn2z6fb1gA0gaTMGInYzJrMlNHaEZZbkJxUVVsdFIyVTRkMko0Y1dWNVVWSkIn', 'infocom@abp.in', 'test@gmail.com', 'PODCAST Site - An Initiative By ABP', '9876543210', '9876543210', '19', '', '', '', '', '', '', '', '', 1991, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'SANDBOX', '5gg23523523523', '5gg23523523523', '5gg23523523523', '5gg23523523523', 'fG2Ajd1u8MCPOqiQ', 'ECOEXK', 'http://sms.keylines.net/V2/http-api.php', 'info@indiainfocom.com', 'India Infocom', 'mail.indiainfocom.com', 'info@indiainfocom.com', '123456', '21', '2020-06-08', '2021-02-20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_static_content`
--

CREATE TABLE `sms_static_content` (
  `static_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `description` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_static_content`
--

INSERT INTO `sms_static_content` (`static_id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `published`) VALUES
(1, 'About WIPS', 'about-wips', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2022-12-19 12:58:17', '2022-12-19 00:58:17', 1),
(2, 'About Event', 'about-event', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2022-12-19 12:57:53', '2022-12-19 00:57:53', 1),
(3, 'Disclaimer', 'disclaimer', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2022-12-19 13:00:34', '2022-12-19 01:00:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_users`
--

CREATE TABLE `sms_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_original` varchar(250) NOT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `verify_otp` int(11) DEFAULT NULL,
  `verify_email` int(11) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `last_login` varchar(250) DEFAULT NULL,
  `last_browser_used` varchar(250) DEFAULT NULL,
  `delete_reason` longtext,
  `published` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sms_users`
--

INSERT INTO `sms_users` (`id`, `user_type`, `name`, `lname`, `mobile`, `email`, `username`, `password`, `password_original`, `profile_image`, `verify_otp`, `verify_email`, `ip_address`, `last_login`, `last_browser_used`, `delete_reason`, `published`, `created_at`, `updated_at`) VALUES
(1, 'MA', 'admin', NULL, '', 'subhomoy@keylines.net', 'masteradmin', '26dc318942685872cf79c5eb96c9bb13', 'Admin@12345', NULL, 0, 0, '', '', '', NULL, 1, '2022-10-10 09:54:55', '2022-10-10 09:54:55'),
(5, 'U', 'Subhomoy', 'Samanta', '6289339523', 'subhomoy@keylines.net', 'subhomoy@keylines.net', 'b4f844438f28e1526b1cb00c646847c8', 'Subhomoy@12345', '1672904700face_test.png', 0, 0, '', '', '', NULL, 1, '2022-11-05 13:24:49', '2022-11-07 09:05:56'),
(250, 'U', 'Avijit', 'Saha', '9876543210', 'avijit@keylines.net', 'avijit@keylines.net', 'b4f844438f28e1526b1cb00c646847c8', 'Subhomoy@12345', '1672904711face_test.png', 0, 0, '', '', '', NULL, 1, '2022-11-05 13:24:49', '2022-11-07 09:05:56'),
(251, 'U', 'Rimi ', 'Sengupta', '9632587410', 'rimi@gmail.com', 'rimi@gmail.com', '9918c97e55915dc9c5acba5872a76e3c', 'rimi@12345', '1672904718face_test.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-12-29 11:33:04', '2022-12-29 11:33:04'),
(252, 'U', 'Rohan', 'Das', '9632587410', 'rohan@gmail.com', 'rohan@gmail.com', '9918c97e55915dc9c5acba5872a76e3c', 'rimi@12345', '1672904726face_test.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-12-29 11:33:04', '2022-12-29 11:33:04'),
(253, 'MA', 'VAPT Admin', NULL, '', 'shuvadeep@keylines.net', 'vapt', '8550a36f57f2fe4dda3d05fc82ed81aa', 'Vapt@12345', NULL, 0, 0, '', '', '', NULL, 1, '2022-10-10 09:54:55', '2022-10-10 09:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` int(11) NOT NULL,
  `name` longtext,
  `designation` varchar(250) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `sponsor_type` enum('HOST STATE','GOLD SPONSORS','SPONSORS') DEFAULT NULL,
  `sponsor_name` varchar(250) DEFAULT NULL,
  `sponsor_logo` varchar(250) DEFAULT NULL,
  `website_link` varchar(250) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_list`
--

CREATE TABLE `subscriber_list` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_type` tinyint(1) NOT NULL COMMENT '1 => android, 2 => iOS ',
  `device_token` varchar(250) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `agenda_id` int(11) NOT NULL,
  `ev_ag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `video_title` varchar(250) DEFAULT NULL,
  `video_code` varchar(250) DEFAULT NULL,
  `video_link` varchar(250) DEFAULT NULL,
  `video_description` longtext,
  `is_home_page` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abp_jwplatform_medias`
--
ALTER TABLE `abp_jwplatform_medias`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `MEDIA_CODE` (`media_code`);

--
-- Indexes for table `abp_quizzes`
--
ALTER TABLE `abp_quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `abp_quiz_questions`
--
ALTER TABLE `abp_quiz_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `FK_QUIZ_ID` (`question_quiz_id`);

--
-- Indexes for table `abp_quiz_question_choices`
--
ALTER TABLE `abp_quiz_question_choices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `FK_QUESTION_ID` (`choice_question_id`);

--
-- Indexes for table `abp_seasons`
--
ALTER TABLE `abp_seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abp_shows`
--
ALTER TABLE `abp_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abp_users`
--
ALTER TABLE `abp_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `abp_user_question_answer`
--
ALTER TABLE `abp_user_question_answer`
  ADD PRIMARY KEY (`answer_question_id`,`answer_choice_id`),
  ADD UNIQUE KEY `FK_USER_ID` (`answer_id`),
  ADD KEY `CHOICE_INDEX` (`answer_choice_id`,`answer_question_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `event_agenda`
--
ALTER TABLE `event_agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `event_agenda_details`
--
ALTER TABLE `event_agenda_details`
  ADD PRIMARY KEY (`ev_ag_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_zones`
--
ALTER TABLE `event_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_plans`
--
ALTER TABLE `package_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_advertisment`
--
ALTER TABLE `sms_advertisment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_banners`
--
ALTER TABLE `sms_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_contact_enquiry`
--
ALTER TABLE `sms_contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_email_template`
--
ALTER TABLE `sms_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_events`
--
ALTER TABLE `sms_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_images`
--
ALTER TABLE `sms_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_notification_list`
--
ALTER TABLE `sms_notification_list`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `sms_poll`
--
ALTER TABLE `sms_poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_poll_option`
--
ALTER TABLE `sms_poll_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_poll_tracking`
--
ALTER TABLE `sms_poll_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_site_settings`
--
ALTER TABLE `sms_site_settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `sms_static_content`
--
ALTER TABLE `sms_static_content`
  ADD PRIMARY KEY (`static_id`);

--
-- Indexes for table `sms_users`
--
ALTER TABLE `sms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber_list`
--
ALTER TABLE `subscriber_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abp_jwplatform_medias`
--
ALTER TABLE `abp_jwplatform_medias`
  MODIFY `media_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `abp_quizzes`
--
ALTER TABLE `abp_quizzes`
  MODIFY `quiz_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `abp_quiz_questions`
--
ALTER TABLE `abp_quiz_questions`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `abp_quiz_question_choices`
--
ALTER TABLE `abp_quiz_question_choices`
  MODIFY `choice_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `abp_seasons`
--
ALTER TABLE `abp_seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abp_shows`
--
ALTER TABLE `abp_shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `abp_users`
--
ALTER TABLE `abp_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `abp_user_question_answer`
--
ALTER TABLE `abp_user_question_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_agenda`
--
ALTER TABLE `event_agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_agenda_details`
--
ALTER TABLE `event_agenda_details`
  MODIFY `ev_ag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_zones`
--
ALTER TABLE `event_zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_plans`
--
ALTER TABLE `package_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms_advertisment`
--
ALTER TABLE `sms_advertisment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms_banners`
--
ALTER TABLE `sms_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_contact_enquiry`
--
ALTER TABLE `sms_contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_events`
--
ALTER TABLE `sms_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_images`
--
ALTER TABLE `sms_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_poll`
--
ALTER TABLE `sms_poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_poll_option`
--
ALTER TABLE `sms_poll_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sms_poll_tracking`
--
ALTER TABLE `sms_poll_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sms_site_settings`
--
ALTER TABLE `sms_site_settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_static_content`
--
ALTER TABLE `sms_static_content`
  MODIFY `static_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_users`
--
ALTER TABLE `sms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriber_list`
--
ALTER TABLE `subscriber_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
