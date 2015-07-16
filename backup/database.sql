-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2015 at 03:29 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_tryout`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `created_date`, `updated_date`) VALUES
(1, 'admin', 'admin', '2015-06-17 06:01:06', '2015-06-17 06:01:11'),
(4, 'dhutapratama', '48624862', '2015-06-28 00:47:46', '2015-06-28 00:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('00af1beaa4c4b259baf37b0073d49954', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465', 1434085672, 'a:5:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"7";s:8:"username";s:3:"aaa";s:4:"nama";s:3:"aaa";s:9:"logged_in";b:1;}'),
('022c4efeb3e8234f75c174bb459ddc39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1437015149, ''),
('03444215f996ba7b85d680ac8328aa6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1433518528, ''),
('0d35440bd12f27edd38357dee9f8e4f4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1435509289, 'a:4:{s:9:"user_data";s:0:"";s:8:"username";s:5:"admin";s:7:"id_user";s:1:"1";s:15:"logged_in_admin";b:1;}'),
('25acf221fbef74b62c2e7ad27d973a91', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1434100028, ''),
('380b7e4f18aea9069948ad03e6eff9d3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1434813709, 'a:4:{s:9:"user_data";s:0:"";s:8:"username";s:5:"admin";s:7:"id_user";s:1:"1";s:15:"logged_in_admin";b:1;}'),
('56f0ac45349a8862d815efa75f65719a', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465', 1433407569, ''),
('677aad6b64145037f359ed4aa3f397cd', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465', 1434085671, 'a:5:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"7";s:8:"username";s:3:"aaa";s:4:"nama";s:3:"aaa";s:9:"logged_in";b:1;}'),
('6cf08ae152767a91f88a5323ab4d6280', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1434100028, ''),
('6ef97de03804fb4a2bc17a3962a6b75d', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465', 1434045711, 'a:5:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"7";s:8:"username";s:3:"aaa";s:4:"nama";s:3:"aaa";s:9:"logged_in";b:1;}'),
('b3c0781b290b39628a0b173c987b3ca7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1433407357, ''),
('c1123ca22f55aa1d660a8071a0490476', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1433480672, 'a:5:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"7";s:8:"username";s:3:"aaa";s:4:"nama";s:3:"aaa";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `learning`
--

CREATE TABLE IF NOT EXISTS `learning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `isi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`id`, `id_mapel`, `materi`, `isi`) VALUES
(1, 1, 'Kalkulus', 'materi kalkulus'),
(3, 1, 'Dunia Math', 'Materi Dunia Math');

-- --------------------------------------------------------

--
-- Table structure for table `log_jawaban`
--

CREATE TABLE IF NOT EXISTS `log_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `no_seri` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `log_jawaban`
--

INSERT INTO `log_jawaban` (`id`, `id_user`, `id_mapel`, `no_seri`, `id_soal`, `jawaban`) VALUES
(103, '2', 1, 1, 1, 'a'),
(104, '2', 1, 1, 2, 'c'),
(105, '2', 1, 1, 3, 'c'),
(106, '2', 1, 1, 4, 'd'),
(107, '2', 1, 1, 5, 'b'),
(108, '2', 1, 1, 6, 'c'),
(109, '2', 1, 1, 7, 'e'),
(110, '5', 1, 2, 8, 'a'),
(111, '5', 1, 2, 9, 'a'),
(112, '5', 1, 2, 10, 'a'),
(113, '5', 1, 1, 1, 'a'),
(114, '5', 1, 1, 2, 'c'),
(115, '5', 1, 1, 3, 'c'),
(116, '5', 1, 1, 4, 'd'),
(117, '5', 1, 1, 5, 'd'),
(118, '5', 1, 1, 6, 'a'),
(119, '5', 1, 1, 7, 'e'),
(120, '2', 1, 2, 8, 'a'),
(121, '2', 1, 2, 9, 'a'),
(122, '2', 1, 2, 10, 'a'),
(123, '8', 1, 2, 8, 'a'),
(124, '8', 1, 2, 9, 'a'),
(125, '8', 1, 2, 10, 'a'),
(126, '8', 1, 1, 1, 'a'),
(127, '8', 1, 1, 2, 'c'),
(128, '8', 1, 1, 3, 'c'),
(129, '8', 1, 1, 4, 'd'),
(130, '8', 1, 1, 5, 'b'),
(131, '8', 1, 1, 6, 'c'),
(132, '8', 1, 1, 7, 'e'),
(133, '1', 1, 2, 8, 'a'),
(134, '7', 1, 2, 8, 'a'),
(135, '7', 1, 2, 9, 'a'),
(136, '7', 1, 2, 10, 'a'),
(137, '7', 1, 1, 1, 'a'),
(138, '7', 1, 1, 2, 'undefined'),
(139, '7', 1, 1, 3, 'undefined'),
(140, '7', 1, 1, 4, 'undefined'),
(141, '7', 1, 1, 5, 'undefined'),
(142, '7', 1, 1, 6, 'undefined'),
(143, '7', 1, 1, 7, 'undefined'),
(144, '1', 1, 2, 9, 'undefined'),
(145, '1', 1, 2, 10, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `log_tryout`
--

CREATE TABLE IF NOT EXISTS `log_tryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `no_seri` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `jawaban_benar` int(11) DEFAULT NULL,
  `jawaban_salah` int(11) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `log_tryout`
--

INSERT INTO `log_tryout` (`id`, `id_user`, `tanggal`, `no_seri`, `id_mapel`, `jawaban_benar`, `jawaban_salah`, `jumlah_soal`, `nilai`) VALUES
(64, 2, '2015-06-04 06:37:25', 1, 1, 7, 0, 7, 100),
(65, 2, '2015-06-04 06:46:11', 0, 0, 0, 0, 0, 0),
(66, 2, '2015-06-04 06:47:25', 2, 1, 3, 0, 3, 100),
(67, 8, '2015-06-04 10:33:33', 2, 1, 3, 0, 3, 100),
(68, 8, '2015-06-04 10:34:05', 1, 1, 7, 0, 7, 100),
(69, 7, '2015-06-04 10:43:12', 2, 1, 3, 0, 3, 100),
(70, 7, '2015-06-17 07:43:45', 1, 1, 1, 6, 7, 14),
(71, 1, '2015-06-17 09:08:51', 2, 1, 1, 2, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mapel`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris'),
(4, 'IPA'),
(5, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `pembahasan`
--

CREATE TABLE IF NOT EXISTS `pembahasan` (
  `id_mapel` int(255) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `pembahasan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembahasan`
--

INSERT INTO `pembahasan` (`id_mapel`, `materi`, `pembahasan`) VALUES
(1, 'Kalkulus', 'lha');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_seri` int(11) DEFAULT NULL,
  `id_mapel` int(255) DEFAULT NULL,
  `soal` text,
  `jawaban_a` varchar(255) DEFAULT NULL,
  `jawaban_b` varchar(255) DEFAULT NULL,
  `jawaban_c` varchar(255) DEFAULT NULL,
  `jawaban_d` varchar(255) DEFAULT NULL,
  `jawaban_e` varchar(255) DEFAULT NULL,
  `kunci_jawaban` varchar(255) DEFAULT NULL,
  `hint_1` varchar(255) DEFAULT NULL,
  `hint_2` varchar(255) DEFAULT NULL,
  `hint_3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `no_seri`, `id_mapel`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `kunci_jawaban`, `hint_1`, `hint_2`, `hint_3`) VALUES
(1, 1, 1, '1 + 1 = ?', '2', '3', '1', '4', '0', 'a', NULL, NULL, NULL),
(2, 1, 1, '2 + 2 = ?', '2', '3', '4', '5', '0', 'c', NULL, NULL, NULL),
(3, 1, 1, '3 + 3 = ?', '15', '2', '6', '7', '8', 'c', NULL, NULL, NULL),
(4, 1, 1, '4 + 4 = ?', '6', '10', '4', '8', '9', 'd', NULL, NULL, NULL),
(5, 1, 1, '5 + 5 = ?', '11', '10', '3', '0', '9', 'b', NULL, NULL, NULL),
(6, 1, 1, '6 + 6 = ?', '21', '11', '12', '13', '10', 'c', NULL, NULL, NULL),
(7, 1, 1, '7 + 7 = ?', '2', '12', '5', '16', '14', 'e', NULL, NULL, NULL),
(8, 2, 1, '2000 - 2000 = ?', '0', '1', '2', '3', '4000', 'a', NULL, NULL, NULL),
(9, 2, 1, '3000 - 3000 = ?', '0', '5', '6', '7', '8', 'a', NULL, NULL, NULL),
(10, 2, 1, '4000 - 4000 = ?', '0', '9', '6', '5', '4', 'a', NULL, NULL, NULL),
(11, 0, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3'),
(12, 333, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3'),
(13, 333, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3'),
(14, 333, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3'),
(15, 333, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3'),
(16, 333, 2, '<p>INCA <strong>asdasda</strong></p>\r\n<p style="text-align: right;"><strong>egerg</strong></p>\r\n<p style="text-align: center;"><strong>regerg</strong></p>\r\n<ol>\r\n<li><strong>Aku Berjanji bahwa titik titik</strong></li>\r\n</ol>', 'jawa', 'jawb', 'jawc', 'jawd', 'jawe', 'c', 'h1', 'h2', 'h3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`) VALUES
(1, 'admin', 'admin', 'Administrator', 'admin@studiwidie.net'),
(6, 'anjung', 'anjung', 'anjung', 'prikitiw@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
