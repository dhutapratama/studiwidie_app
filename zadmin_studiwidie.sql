-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2015 at 05:43 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_studiwidie`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `created_date`, `updated_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-07-18 08:04:17', '2015-07-21 09:47:25');

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
('0ca9de2c6f9c554082aace74323237fd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', 1439112340, ''),
('3104c4585c1d5c9fbbf8914a072a1438', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', 1439306446, 'a:7:{s:9:"user_data";s:0:"";s:8:"username";b:0;s:8:"password";b:0;s:7:"user_id";s:0:"";s:9:"user_type";s:5:"guess";s:4:"nama";s:0:"";s:9:"logged_in";b:0;}'),
('61f7c5035a596bffa8cd10e764bf588e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', 1439306540, ''),
('72bf39f1457fea61333f526818136852', '127.0.0.1', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile', 1439308178, 'a:7:{s:9:"user_data";s:0:"";s:8:"username";s:0:"";s:8:"password";s:0:"";s:7:"user_id";s:0:"";s:9:"user_type";s:5:"guess";s:4:"nama";s:0:"";s:9:"logged_in";b:0;}'),
('c22c8f456246907bf3c1dfd7b34bbb34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', 1439309270, ''),
('f5d458b30f4ba084e32d1e910a3a4b09', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', 1439309274, 'a:7:{s:9:"user_data";s:0:"";s:8:"username";s:12:"dhutapratama";s:8:"password";s:8:"48624862";s:7:"user_id";s:88:"Lzw5UWx4UFEdSxzVoIRhjF7GZe5KoifL74yOp2qrZ4iKrQcaOfdrEhRt1fJMEKq2QsDnWKVDFytLRS801KuriQ==";s:9:"user_type";s:5:"siswa";s:4:"nama";s:13:"Dhuta Pratama";s:9:"logged_in";b:1;}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`id`, `id_mapel`, `materi`, `isi`) VALUES
(1, 1, 'Logaritma Dasar', '<h3>Logaritma Dasar<br></h3><a href="http://rumusdasarmatematika.blogspot.com/" target="_blank">Operasi logaritma</a> dapat diartikan sebagai operasi kebalikan dari menentukan nilai pemangkatan menjadi menentukan pangkatnya.<br>\r\n<br>\r\n Jika x<span> =\r\n a</span><sup>n<br></sup> Maka silahkan anda lanjutkan ...'),
(2, 1, 'Logaritma Menengah', '<h3>Logaritma Menengah<br></h3><a href="http://rumusdasarmatematika.blogspot.com/" target="_blank">Operasi logaritma</a> dapat diartikan sebagai operasi kebalikan dari menentukan nilai pemangkatan menjadi menentukan pangkatnya.<br>\r\n<br>\r\n Jika x<span > =\r\n a</span><sup >n</sup>');

-- --------------------------------------------------------

--
-- Table structure for table `log_jawaban`
--

CREATE TABLE IF NOT EXISTS `log_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `no_seri` varchar(255) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `hint` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `log_jawaban`
--

INSERT INTO `log_jawaban` (`id`, `id_user`, `id_mapel`, `no_seri`, `id_soal`, `jawaban`, `hint`) VALUES
(96, '2', 1, 'MATH_001', 1, 'a', NULL),
(97, '2', 1, 'MATH_001', 2, 'b', NULL),
(98, '2', 1, 'MATH_001', 3, 'b', NULL),
(99, '2', 1, 'MATH_001', 4, 'b', NULL),
(100, '2', 1, 'MATH_001', 5, 'b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_tryout`
--

CREATE TABLE IF NOT EXISTS `log_tryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `no_seri` varchar(255) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `jawaban_benar` int(11) DEFAULT NULL,
  `jawaban_salah` int(11) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `log_tryout`
--

INSERT INTO `log_tryout` (`id`, `id_user`, `tanggal`, `no_seri`, `id_mapel`, `jawaban_benar`, `jawaban_salah`, `jumlah_soal`, `nilai`) VALUES
(14, 2, '2015-08-09 19:43:04', 'MATH_001', 1, 4, 1, 5, 80);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(255) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `pembahasan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_seri` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `no_seri`, `id_mapel`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `kunci_jawaban`, `hint_1`, `hint_2`, `hint_3`) VALUES
(1, 'MATH_001', 1, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(2, 'MATH_001', 1, '<p>2 + 2 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(3, 'MATH_001', 1, '<p>3 + 3 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(4, 'MATH_001', 1, '<p>4 + 4 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(5, 'MATH_001', 1, '<p>5 + 5 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(23, 'BIND_001', 2, '<p>a</p>', '1', '2', '3', '4', '5', 'a', 'Satu', 'Uno', 'One'),
(24, 'BIND_001', 2, '<p>b</p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(25, 'BIND_001', 2, '<p>c</p>', '1', '2', '3', '4', '5', 'c', 'Satu', 'Uno', 'One'),
(26, 'BIND_001', 2, '<p>d</p>', '1', '2', '3', '4', '5', 'd', 'Satu', 'Uno', 'One'),
(27, 'BIND_001', 2, '<p>e</p>', '1', '2', '3', '4', '5', 'e', 'Satu', 'Uno', 'One'),
(28, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(29, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(30, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(31, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(32, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(33, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(34, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(35, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(36, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(37, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(38, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(39, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(40, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(41, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One'),
(42, 'BIND_002', 2, '<p>1 + 1 = ...<br></p>', '1', '2', '3', '4', '5', 'b', 'Satu', 'Uno', 'One');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`) VALUES
(1, 'siswa', 'bcd724d15cde8c47650fda962968f102', 'Siswa', 'siswa@gmail.com'),
(2, 'dhutapratama', 'ed3287ac14e85917c5d21284a67f87cd', 'Dhuta Pratama', 'me@dhutapratama.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
